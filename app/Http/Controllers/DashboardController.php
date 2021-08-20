<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::count();
        $users = User::count();
        return view('admin.dashboard.index',compact('students','users'));
    }
}
