<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dare;
use App\mydare;
use App\darelist;
use App\suggestion;
use App\User;
use DB;

//Api resource
use App\Http\Resources\dareResource as dareres;
use App\Http\Resources\darelistResource as darelistres;
use App\Http\Resources\suggestionResource as suggestionres;

use JD\Cloudder\Facades\Cloudder;

class dareController extends Controller
{
    public function dares()
    {
        //fetch data (last 15) from dares model. (Done! was blocking pro)
         $scores = dare::orderby('id','desc')
         ->select('id','url','dare_name','username','likes','shares','views')->paginate(15);
         return dareres::collection($scores);
    }

    public function search()
    {
        //search by dare name from dare model ...........................(method needs work)
            //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function filter_dare()
    {
        //search by username from dare model ............................(method needs work)
             //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function scores()
    {
        //fetch data (last 10) from dare model, order from highest points. (Done! was blocking pro)
        return $scores= \DB::table('dares')
        ->select('username','likes','views','point', \DB::raw('sum(point) as point'))
        ->groupBy('username','likes','views','point')->paginate(10);
    }

    public function count_dare_vids()
    {
        //count and return the dares in the darelist model. (Done! was blocking pro)
     return $count = dare::select('id')->count();
    }

    public function count_dares()
    {
        //count and return the dares in the darelist model. (Done! was blocking pro)
     return $count = darelist::select('id')->count();
    }

    public function count_mydares($userid)
    {
        //count and return the value for dares in the mydare model based on the recived userid (Done! was blocking pro)
        return $count = mydare::where('user_id','=',$userid)->select('id')->count();
    }


    public function dare_list()
    {
      $scores = darelist::orderby('id','desc')->select('dare_name','points','play_count')->paginate(10);
      return darelistres::collection($scores);
    }

    public function add_mydare(Request $request)
    {
        //check that > 5 dares are not selected
        $check = mydare::where('user_id','=',$request->input('userid'))->where('status','=',1)->count();

        if($check < 5){
            //prevent duplicate selection
            $check2 = mydare::where('user_id','=',$request->input('userid'))
            ->where('dare_name','=',$request->input('darename'))->first();
           
            if($check2){
                return 3;
            }else{
              
                $save = new mydare();
                $save->dare_name = $request->input('darename');
                $save->user_id = $request->input('userid');
                $save->darelist_id = darelist::where('dare_name','=',$request->input('darename'))->pluck('id')->first();
                $save->expire = \carbon\carbon::now()->addDays(6);
                $save->save();
                return 1;
            }
        }else{
            return 2;
        }

      
    }

    public function dropdown_dare_list()
    {
      $data = darelist::orderby('id','desc')->select('dare_name','points','id')->get();
      return darelistres::collection($data);
    }

    public function suggestion(Request $request)
    {
        $save = new suggestion();
        $save->username = $request->input('username');
        $save->dare = $request->input('description');
        $save->save();
        return 1;
    }

    public function create_darelist(Request $request)
    {
        $save = new darelist();
        $save->dare_name = $request->input('dare_name');
        $save->points = $request->input('points');
        $save->save();
        return 1;
    }

    public function suggestions()
    {
        $data = suggestion::orderby('id','desc')->select('username','dare','created_at')->paginate(15);
        return suggestionres::collection($data);
    }

    public function pending_dares($userid)
    {
        //check and expire
          $ex_data = mydare::orderby('status',1)->where('user_id','=',$userid)
        ->whereDate('expire','<=', \carbon\carbon::now())
        ->select('id','status')->get();

       if($ex_data){
        foreach($ex_data as $d){
            $d->status = 0;
            $d->save();
        }
       }
       //check and expire

        //fetch
      $data = mydare::orderby('status',1)->where('user_id','=',$userid)
      ->select('dare_name','expire','status')->get();
      return darelistres::collection($data);
    }


    public function upload_dare_list($userid)
    {
        //check and expire
        $ex_data = mydare::orderby('status',1)->where('user_id','=',$userid)
        ->whereDate('expire','<=', \carbon\carbon::now())
        ->select('id','status')->get();

       if($ex_data){
        foreach($ex_data as $d){
            $d->status = 0;
            $d->save();
        }
       }
       //check and expire
     
          $ex_data = mydare::orderby('id','desc')->where('user_id','=',$userid)
        ->whereDate('expire','>=', \carbon\carbon::now())->where('status','=',1)
        ->select('id','dare_name')->get();

      return darelistres::collection($ex_data);
    }


    public function upload_dare(Request $request)
    {
        $this->validate($request,[
            'video'=>'required|mimes:mp4,3gp|between:1, 50000',
        ]);

        //push to cloud
        $video = $request->file('video')->getRealPath();;
        Cloudder::uploadVideo($video, null);
                    //return Cloudder::getResult();
        
        //change daree status to 3, meaning done!
        $dare = mydare::findorfail($request->input('selected'));
        $dare->status = 3;
        $dare->save();

        //update user point
          $darelistID = $dare->darelist_id;
          $darelistContent = darelist::findorfail($darelistID);
          $point = $darelistContent->points;

          $user = user::findorfail($request->input('userid'));
          $user->points = $user->points + $point;
          $user->save();

          //update count for user played on darelist
          $darelistContent->play_count = $darelistContent->play_count + 1;
          $darelistContent->save();

        //save required intel
        $cloundary_upload = Cloudder::getResult();

        $save = new dare();
        $save->user_id = $request->input('userid');
        $save->url = $cloundary_upload['url'];
        $save->dare_name = $dare->dare_name;
        $save->username = $user->username;
        $save->point = $point;
        $save->save();

        return 1;
    }

}
