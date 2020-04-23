<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dare;
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
        //fetch data (last 15) from dares model. 
         //demo
         $scores = dare::all();
         return dareres::collection($scores);
    }

    public function search()
    {
        //search username from dare model 
            //demo
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function filter_dare()
    {
        //search username from dare model 
             //demo
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function scores()
    {
        //fetch data (last 10) from dares model, order from highest likes. 
        //demo
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function dare_list()
    {
      $scores = darelist::orderby('id','desc')->select('dare_name','points','play_count')->paginate(10);
      return darelistres::collection($scores);
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
}
