<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EricSolutionController extends Controller
{
     public function task()
    {
        $response = Http::get('https://dummyjson.com/users');

        if ($response->successful()) {
            $tasks = $response->json()['users'];
        } else {
            $tasks = [];
        }

        return view('ericSolution.tasks', compact('tasks'));
    }
}
