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
use App\Http\Resources\userResource as userres;

use JD\Cloudder\Facades\Cloudder;

class dareController extends Controller
{



    public function dares()
    {
        //fetch data (last 15) from dares model. (Done! was blocking pro)
         $dares = dare::orderby('id','desc')
         ->select('id','dare_name','username','url','poster','dare_slug','duration','views')->paginate(15);
         return dareres::collection($dares);
    }


    public function trending_dares()
    {
        //fetch data (last 15) from dares model. (Done! was blocking pro)
         $dares = dare::orderby('views','desc')
         ->select('id','dare_name','username','poster','dare_slug','duration','views')->paginate(20);
         return dareres::collection($dares);
    }



    public function single_dare_video($slug, $id)
    {
        $data = dare::findorfail($id);
         $data->views = $data->views + 1;
         $data->save();
         return new dareres($data);
    }






    public function search($data)
    {

        if(is_numeric($data)){
        //data is user_id
        $res = dare::orderby('id','desc')->where('user_id','=',$data)
        ->select('id','dare_name','username','url','poster','dare_slug','created_at','views')->paginate(15);
        return dareres::collection($res);
        }
      

        //data is dare_name
         $res = dare::orderby('id','desc')->where('dare_slug','=',$data)
        ->select('id','dare_name','username','url','poster','dare_slug','created_at','views')->paginate(15);
        return dareres::collection($res);
    }




    public function scores()
    {
         $scores= User::orderby('points','desc')
        ->select('username','points')->get()
        ->take(10);
        return dareres::collection($scores);
    }

   




    public function dare_list()
    {
      $scores = darelist::orderby('play_count','desc')->select('dare_name','points','play_count')->paginate(10);
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

                //check expiration
                $checkEx = mydare::where('user_id','=',$request->input('userid'))
                ->where('dare_name','=',$request->input('darename'))
                ->whereDate('expire','<=', \carbon\carbon::now())->first();
                if($checkEx){
                    //it has expired
                    return 4;
                }

                //check if completed
                $checkStat = mydare::where('user_id','=',$request->input('userid'))
                ->where('dare_name','=',$request->input('darename'))->pluck('status')->first();
                if($checkStat == 3){
                    return 5;
                }

                //dare was added before
                return 3;
            }else{
              //ok, proceed
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





    public function dropdown_dare_name()
    {
    //  $data = dare::orderby('id','desc')->select('dare_name','dare_slug')->get();
     // return darelistres::collection($data);
      return $data= \DB::table('dares')->orderby('id','desc')
      ->select('dare_name','dare_slug', \DB::raw('count(dare_name) as play_count'))
      ->groupBy('dare_name','dare_slug')->get();
      
    }





    public function username_dropdown()
    {
      $data = User::orderby('id','desc')->where('points','>',1)->select('username','id')->get();
      return userres::collection($data);
    }





    public function suggestion(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'description' => 'required|string',
        ]);

        $save = new suggestion();
        $save->username = $request->input('username');
        $save->dare = $request->input('description');
        $save->save();
        return 1;
    }





    public function create_darelist(Request $request)
    {
        $this->validate($request, [
            'dare_name' => 'required|string|unique:darelists',
            'points' => 'required',
        ]);

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
        //check and expire - start
        $ex_data = mydare::orderby('status',1)->where('user_id','=',$userid)
        ->whereDate('expire','<=', \carbon\carbon::now())
        ->select('id','status')->get();

       if($ex_data){
        foreach($ex_data as $d){
            $d->status = 0;
            $d->save();
        }
       }
       //check and expire - end
     
          $ex_data = mydare::orderby('id','desc')->where('user_id','=',$userid)
        ->whereDate('expire','>=', \carbon\carbon::now())->where('status','=',1)
        ->select('id','dare_name')->get();

      return darelistres::collection($ex_data);
    }





    public function upload_dare(Request $request)
    {
        $this->validate($request,[
            'video'=>'required|mimes:mp4,3gp|between:1, 33000',
        ]);

        //push to cloud
        $video = $request->file('video')->getRealPath();
        
        try{
        $cloundary_upload = \Cloudinary\Uploader::upload_large($video, 
            array("resource_type" => "video",
            "chunk_size" => 6000000,
            "timeout" => 18000
        ));
        }
        catch(\Exception $e){
            return 0;
         } 
      /*  
        Cloudder::uploadVideo($video, null);
        $cloundary_upload = Cloudder::getResult();
        }
        catch(\Exception $e){
            return 0;
         } */

        //change dare status to 3, meaning done!
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
       
        //convert duration from sec to min
       $seconds =  $cloundary_upload['duration'];
            $start_seconds = round($seconds);
            if($start_seconds < 60)
            {
                $minutes ="";
                $seconds = $start_seconds;
            }
            else
            {
        
                $minutes = floor($start_seconds/60);
                $seconds = $start_seconds - $minutes*60;
        
                $minutes = "$minutes"."m";
                $seconds = $seconds."s";
            }
           if($minutes){
            $time = "$minutes $seconds";
           }else{
            $time = "$minutes $seconds".'s';
           }
        // vs_40,dl_200,h_200,e_loop,f_gif
        $save = new dare();
        $save->user_id = $request->input('userid');
        $save->url = str_ireplace("upload/","upload/q_auto:low/",$cloundary_upload['url']);
        $save->poster = str_ireplace("upload/","upload/so_3,f_gif/",$cloundary_upload['url']);
        $save->dare_name = $dare->dare_name;
        $save->dare_slug = str_slug($dare->dare_name, '-');
        $save->duration = $time;
        $save->username = $user->username;
        $save->point = $point;
        $save->save();

        return 1;
    }

}
