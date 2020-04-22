<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Api resource
use App\Http\Resources\dareResource as dareres;

class dareController extends Controller
{
    public function dares()
    {
        //fetch data (last 15) from dares model. 
        return null;
    }

    public function search()
    {
        //search username from dare model 
        return null;
    }

    public function filter_dare()
    {
        //search username from dare model 
        return null;
    }

    public function scores()
    {
        //fetch data (last 10) from dares model, order from highest likes. 
        return null;
    }

    public function dare_list()
    {
        //fetch data (last 10) from darelist model, paginate
        return null;
    }

    public function suggestion(Request $request)
    {
        //save to suggestion model, request fields from front end are username and description
        return null;
    }
}
