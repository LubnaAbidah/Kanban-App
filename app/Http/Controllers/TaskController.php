<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    private $tasks;

    public function __construct()
    {
        
    }

    public function index()
    {
        $pageTitle = 'Task List'; // Ditambahkan
        $tasks = Task::all();
        return view('tasks.index', [
            'pageTitle' => $pageTitle, //Ditambahkan
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $pageTitle = 'Create Task'; // Ditambahkan
       
        return view('tasks.add', [
            'pageTitle' => $pageTitle //Ditambahkan
            
        ]);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Task';
        $tasks = Task::find($id);

        return view('tasks.edit', ['pageTitle' => $pageTitle, 'task' => $tasks]);
    }
}
