<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Degrees;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;

// AUTH
Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('auth/login',[LoginController::class,'login'])->name('loginAuth');
Route::post('auth/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('usuarios',[UserController::class,'index'])->name('users');
    Route::get('profesores',[TeacherController::class,'index'])->name('teacher');

    Route::get('profesores/records',function(){
        // $all = User::whereType('profesor')
        //         ->select('id','username','name','telephone','type')
        //         ->with(['section_user:id,degree_id'])
        //         ->get();
        // $all = Degrees::select('id','name')->with('sections:id,name,degree_id')->get();
        $all = Student::where('section_id',1)->with('assistance_student')->get() ;
        return response()->json($all);
    });
        
    Route::get('/aula/{grade}/{section}/alumnos',function($gradeId,$sectionId){
        return view('admin.sections.students',compact('gradeId','sectionId'));
    });
    
    Route::get('/aula/{grade}/{section}/profesores',function($gradeId,$sectionId){
        return view('admin.sections.teachers',compact('gradeId','sectionId'));
    });
    

});

Route::get('/grados',function(){
    dd(Degrees::with('sections')->get()->toArray());
});

