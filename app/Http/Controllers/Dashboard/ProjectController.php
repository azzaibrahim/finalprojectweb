<?php

namespace App\Http\Controllers\Dashboard;

use App\contact;
use App\Http\Controllers\Controller;
use App\project;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $project = project::all();
        return view('Dashboard.project')->with('project', $project);
    }


    public function contacttome(Request $request){


        $message =new contact();

        $message->name=$request->name;
        $message->email=$request->email;
        $message->Subject=$request->Subject;
        $message->save();






    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project=project::all();

        return view('Dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $image = $request->file('image');
            $UploadImage  = time() .'.'. $image->getClientOriginalExtension();
            $image->move("image/",$UploadImage);
            $imageUp = "image/" . $UploadImage;
        }
        $request->validate([

            'title'=>'required|max:10',
            'Describe'=>'required',
            




        ]);
        $project=new project();
        $project->title=$request->title;

        $project->Describe=$request->Describe;
        $project->image=$imageUp;
        $project->save();

        return redirect()->back()->with('success','post create successed');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project=project::find($id);
//        return view('dashboard.layouts.edit',compact('photo'));
        return view('Dashboard.edite')->with('project',$project);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $project=project::find($id);
        $project->title=$request->title;
        $project->Describe=$request->Describe;


        $project->update();

    $project=project::all();

        return  view('Dashboard.index' ,compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = project::find($id);
        $project->delete();
//        $project=$project::all();
        return  redirect()->back();
    }
}
