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
use App\Models\StudentDetail;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();
        return view('students.view', ['students' => $students]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
       
        $input = $request->all();

        $request->validate([
            'name' => 'required',            
            'email' => 'required|email:rfc,dns|unique:students,email',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',           
        ]);
       
      
        $student = Student::create($input);    
        $data = $request->collect('student_details');
        foreach($data as $record){
            StudentDetail::create([
                'student_id' => $student->id,
                'subject' => $record['subject'],
                'marks' => $record['marks'],
                'grade' => $record['grade'],
            ]);
            
        }   

       

        return redirect()->route('students.index')->with('success', 'Student has been saved successfully');

    }

    public function edit(Student $user)
    {
        return view('students.edit');

        return view('students.edit')->with([
            'student'  => $student
        ]);
    }   
   
    public function update(Request $request, Student $student)
    {
       
        $input = $request->all();

        $request->validate([
            'name' => 'required',            
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',           
        ]);

       
        $student->fill($input);    
        $student->update();        

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
