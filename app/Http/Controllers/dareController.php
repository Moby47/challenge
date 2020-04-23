<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dare;
use App\mydare;
use App\darelist;
use App\suggestion;

//Api resource
use App\Http\Resources\dareResource as dareres;
use App\Http\Resources\darelistResource as darelistres;
use App\Http\Resources\suggestionResource as suggestionres;

class dareController extends Controller
{
    public function dares()
    {
        //fetch data (last 15) from dares model. (method needs work)
         //demo. delete the belows lines of code.
         $scores = dare::all();
         return dareres::collection($scores);
    }

    public function search()
    {
        //search by dare name from dare model (method needs work)
            //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function filter_dare()
    {
        //search by username from dare model (method needs work)
             //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function scores()
    {
        //fetch data (last 10) from dares model, order from highest likes. (method needs work)
        //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function count_dares()
    {
        //count and return the dares in the darelist model. (method needs work)
        //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function count_mydares($userid)
    {
        //count and return the value for dares in the mydare model based on the recived userid (method needs work)
        //demo. delete the belows lines of code.
      $scores = dare::all();
      return dareres::collection($scores);
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

        //fetch
      $data = mydare::orderby('status',1)->where('user_id','=',$userid)
      ->select('dare_name','expire','status')->get();
      return darelistres::collection($data);
    }

}
