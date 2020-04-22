<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dare;

//Api resource
use App\Http\Resources\dareResource as dareres;

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
        //fetch data (last 10) from darelist model, paginate
        //demo
      $scores = dare::all();
      return dareres::collection($scores);
    }

    public function suggestion(Request $request)
    {
        //save to suggestion model, request fields from front end are username and description
        //return 1 as success
        return 1;
    }
}
