<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }

    public function index()
    {
        $countEmployess = User::whereNotNull('manager_id')->count();
        $countManager = User::whereNull('manager_id')->count();
        $countDepartments = Department::count();

        return view('home', compact('countEmployess' , 'countManager' , 'countDepartments'));
    }
}
