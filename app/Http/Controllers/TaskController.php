<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $tasks;

    public function __construct()
    {
        $this->tasks = [
            (object) [
                'id' => 1,
                'name' => 'Develop Final Project',
                'detail' => 'Kanban project using PHP and Laravel',
                'due_date' => '2023-04-30',
                'status' => 'not_started',
            ],
            (object) [
                'id' => 2,
                'name' => 'Lunch with Guru Domba',
                'detail' => 'Have Nasi Padang with Guru Domba',
                'due_date' => '2023-04-10',
                'status' => 'not_started',
            ],
            (object) [
                'id' => 3,
                'name' => 'Learn Blade Templating',
                'detail' => 'Complete Blade Templating material on Progate',
                'due_date' => '2023-04-05',
                'status' => 'in_progress',
            ],
            (object) [
                'id' => 4,
                'name' => 'Decide Plans for Lebaran holidays',
                'detail' => 'Trip with family?',
                'due_date' => '2023-04-21',
                'status' => 'in_progress',
            ],
            (object) [
                'id' => 5,
                'name' => 'Develop a Laravel Project',
                'detail' => 'Develop a Kanban app and ask Guru Domba\'s review',
                'due_date' => '2023-04-30',
                'status' => 'in_review',
            ],
            (object) [
                'id' => 6,
                'name' => 'Learn PHP Basics',
                'detail' => 'Complete PHP materials on Frontend Course',
                'due_date' => '2023-04-30',
                'status' => 'completed',
            ],
        ];
    }

    public function index()
    {
        $pageTitle = 'Task List'; // Ditambahkan
        $tasks = $this->tasks;
        return view('tasks.index', [
            'pageTitle' => $pageTitle, //Ditambahkan
            'tasks' => $tasks,
        ]);
    }
}
