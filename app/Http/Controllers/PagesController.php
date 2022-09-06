<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function dashboard()
    {
        $tasks = Task::all();
        $users = User::all();
        // dd($users);
        // $querys = DB::table('task_user as tu')
        //         ->select([
        //             DB::raw('COUNT(user_id) as user_count'),
        //             DB::raw('COUNT(t.id) as task_count'),
        //             ' user_id',
        //             'u.name as name',
        //             'u.email as email',
        //             'u.user_type as user_type',
        //             //  'task_id',
        //         ])
        //         ->join('users as u', 'u.id', 'tu.user_id')
        //         ->join('tasks as t', 't.id', 'tu.task_id');
        //         $querys->groupBy('tu.user_id')
        //         ->get();
                // dd($querys);
        return view('dashboard', ['tasks' => $tasks, 'users' => $users]);
    }
    public function activities()
    {
        return view('activities');
    }
    public function chat()
    {
        return view ('chat');
    }
    public function login()
    {
        return view ('login');
    }
    public function register()
    {
        return view ('register');
    }
    public function viewUser(User $user)
    { 
        return view('view_user',['user' => $user]);
    }
}
