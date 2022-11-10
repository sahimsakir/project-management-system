<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $projects = Project::join('workshops','workshops.id','=','projects.workshop_id')
        ->join('statuses','statuses.id','=','projects.status_id')
        ->join('accesses','projects.id', '=','accesses.project_id')
        ->join('users','users.id','=','accesses.user_id')
        ->where('accesses.user_id','=', $user_id)
        ->get(['projects.id','projects.project_name','workshops.workshop_name','statuses.status_name', 'users.username']);
        return view('project.index',['projects'=>$projects]);
    }
    /**
     * Display the new creation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $workshops = Workshop::all();
        $statuses = Status::all();
        return view('project.create',['workshops'=>$workshops,'statuses'=>$statuses,'users'=>$users]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'project_name' => 'required|min:4',
        ]);

        $project = new Project;

        $project->project_name = $request->project_name;
        $project->workshop_id = $request->workshop;
        $project->status_id = $request->status;
        $project->save();

        $project_id = $project->id;

        


        for ($i=0 ; $i<count($request->user_id); $i++){
            $access = new Access;
            $access->project_id = $project_id;
            $access->user_id = $request->user_id[$i];
            $access->save();
        }        
        $user_id = auth()->user()->id;
        $projects = Project::join('workshops','workshops.id','=','projects.workshop_id')
        ->join('statuses','statuses.id','=','projects.status_id')
        ->join('accesses','projects.id', '=','accesses.project_id')
        ->join('users','users.id','=','accesses.user_id')
        ->where('accesses.user_id','=', $user_id)
        ->get(['projects.id','projects.project_name','workshops.workshop_name','statuses.status_name', 'users.username']);
        return view('project.index',['projects'=>$projects]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
