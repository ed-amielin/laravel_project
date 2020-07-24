<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Task;
use Auth;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newProject()
    {
        return view('newProject');
    }

    public function createProject(ProjectRequest $req)
    {
    	$project = new Project;

    	$project->name = $req->input('name');
    	$project->description = $req->input('description');
    	$project->user_id = Auth::user()->id;
		    	
    	$project->save();
    	$id = $project->id;

    	return redirect()->route('project', $id)->with('success', "New project was successfully created");
    }

    public function showProject($id) {
    	$project = Project::find($id);
    	$tasks = Task::where('project_id', '=', $id)->get();
    	return view('project', ['project' => $project, 'tasks' => $tasks]);
    }

    public function editProject($id) {
    	$project = Project::find($id);
    	return view('editProject', ['project' => $project]);
    }

    public function saveProject($id, ProjectRequest $req)
    {
    	$project = Project::find($id);

    	$project->name = $req->input('name');
    	$project->description = $req->input('description');
		    	
    	$project->save();

    	return redirect()->route('project', $id)->with('success', "Project was successfully saved");
    }

    public function deleteProject($id) {
    	$project = Project::find($id);
    	return view('deleteProject', ['project' => $project]);
    }

    public function confirmDeleteProject($id)
    {
    	$project = Project::find($id);
    	$tasks = Task::where('project_id', '=', $id)->get();
			foreach ($tasks as $task) {
				if ($task->file_name) {
		    		Storage::disk('public')->delete('uploads/'.$task->file_name);
		    	}
			}
    	Project::find($id)->delete();

    	return redirect()->route('home')->with('success', "Project $project->name was successfully deleted");
    }
}
