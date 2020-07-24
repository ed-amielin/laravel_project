<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TaskRequest;
use App\Project;
use App\Task;

class TaskController extends Controller
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

    public function newTask($id)
    {
    	$project = Project::find($id);
        return view('newTask', ['project' => $project]);
    }

    public function createTask($projectId, TaskRequest $req)
    {
    	$task = new Task;

    	$task->name = $req->input('name');
    	$task->description = $req->input('description');
    	$task->project_id = $projectId;

    	if ($req->file()) {
    		$task->file_name = time().'_'.$req->file->getClientOriginalName();
    		$req->file('file')->storeAs('uploads', $task->file_name, 'public');
    	}
		    	
    	$task->save();
    	$id = $task->id;

    	return redirect()->route('project', $projectId)->with('success', "New task was successfully created");
    }

    public function showTask($id) {
    	$task = Task::find($id);
    	return view('task', ['task' => $task]);
    }

    public function editTask($id) {
    	$task = Task::find($id);
    	return view('editTask', ['task' => $task]);
    }

    public function saveTask($id, TaskRequest $req)
    {
    	$task = Task::find($id);

    	$task->name = $req->input('name');
    	$task->description = $req->input('description');
    	$task->status = $req->input('status');
		
		$task->save();

    	return redirect()->route('task', $id)->with('success', "Task was successfully saved");
    }

    public function deleteTask($id) {
    	$task = Task::find($id);
    	return view('deleteTask', ['task' => $task]);
    }

    public function confirmDeleteTask($id)
    {
    	$task = Task::find($id);
    	$name = $task->name;
    	$project_id = $task->project_id;
    	if ($task->file_name) {
    		Storage::disk('public')->delete('uploads/'.$task->file_name);
    	}
    	Task::find($id)->delete();

    	return redirect()->route('project', $project_id)->with('success', "Task $name was successfully deleted");
    }

    public function downloadFile($id) {
    	$task = Task::find($id);
    	if ($task->file_name) {
    		return response()->download(storage_path("app/public/uploads/{$task->file_name}"));
    	} else {
    		return back()->withErrors(['error', 'Error - there is no file in this task']);
    	}
    }
}
