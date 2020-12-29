<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function ShowIndex(){
        $project=project::paginate(12);

        return view('frontsite.index')->with('project',$project);

    }

    public function ShowPost(){

        return view('frontsite.post');



    }

    public function ShowContact(){

        return view('frontsite.contact');



    }
    public function ShowAbout(){

        return view('frontsite.about');



    }
}
