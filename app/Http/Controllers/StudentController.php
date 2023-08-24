<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();
        return view('students.view', ['students' => $students]);
    }

    public function create()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(User $user)
    {
        return view('profile.edit')->with([
            'user'  => $user
        ]);
    }

   
    public function update(Request $request)
    {
       
        $input = $request->all();

        $request->validate([
            'name' => 'required',            
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',           
        ]);

        if(!empty($request->id)){
            $student = Student::where('id', $request->id)->first();  
            $student->fill($input);    
            $student->update();

        } else {
            $student = Student::create($input);
        }
       

        return redirect()->route('student.index')->with('success', 'Student has been saved successfully');

    }


    /**
     * Delete the user's account.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student has been Deleted');
    }
}
