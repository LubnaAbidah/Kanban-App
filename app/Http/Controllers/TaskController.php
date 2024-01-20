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

    // Tambahkan method store()
    public function store(Request $request)
    {
        // Code untuk proses validasi
        $request->validate(
            [
                'name' => 'required',
                'due_date' => 'required',
                'status' => 'required',
            ],
            $request->all()
        );

        Task::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Task';
        $tasks = Task::find($id);

        return view('tasks.edit', ['pageTitle' => $pageTitle, 'task' => $tasks]);
    }
    public function update(Request $request, $id)
    {
         
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index');
    }
    public function delete($id)
    {
        $pageTitle = 'Delete';
        $tasks = Task::find($id);

        return view('tasks.delete', ['pageTitle' => $pageTitle, 'task' => $tasks]);

    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);// Memperoleh task tertentu menggunakan $id
        $task->delete();
        // Melakukan redirect menuju tasks.index
        return redirect()->route('tasks.index');
    }
    public function progress()
    {
        $title = 'Task Progress';

        $tasks = Task::all();
        $filteredTasks = $tasks->groupBy('status');
        
         
        $tasks = [
            'not_started' => $filteredTasks->get(('not_started') , []),
            'in_progress' => $filteredTasks->get(('in_progress'), []),
            'completed' => $filteredTasks->get(('completed'), []),
            'in_review' => $filteredTasks->get(('in_review'), []),
        ];
        
    
         return view('tasks.progress', [
            'pageTitle' => $title,
            'tasks' => $tasks,
        ]);
    }
    public function move(int $id, Request $request)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.progress');
    }
    public function completed(int $id, Request $request)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index');
    }
}
