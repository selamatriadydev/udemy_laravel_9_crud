<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(){ 
        $student = Student::get();
        return view("crud.student.home", ['data' => $student]);
    }
    public function store(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $photo_name = "";
        if($request->hasFile('photo')){
            $final_name = date('Ymd-His');
            $photo_ext = $request->file('photo')->extension();
            $photo_name = $final_name.".".$photo_ext;
            $request->file('photo')->move(public_path('Uploads'), $photo_name);
        }

        $student = new Student();
        $student->student_name = $request->name;
        $student->student_email = $request->email;
        $student->student_photo = $photo_name;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Data added is succesfully');
    }
    public function show($id){
        $student_single = Student::with('rPhones')->find($id);
        if(!$student_single){
            return redirect()->route('student.index')->with('warning', 'Data deleted is failed. Data is not found!!');
        }
        // dd($student_single);
        return view('crud.student.show', compact('student_single'));
    }
    public function edit($id){
        $student_single = Student::with('rPhones')->find($id);
        return view('crud.student.edit', compact('student_single'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $message = "Data updated is succesfully";
        $student = Student::find($id);
        $student->student_name = $request->name;
        $student->student_email = $request->email;
        if($request->hasFile('photo')){
            $message = "Data and photo updated is succesfully";
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            if($student->student_photo){
                if(File::exists(public_path('Uploads/'.$student->student_photo))){
                    File::delete(public_path('Uploads/'.$student->student_photo));
                }
            }
            $final_name = date('Ymd-His');
            $photo_ext = $request->file('photo')->extension();
            $photo_name = $final_name.".".$photo_ext;
            $request->file('photo')->move(public_path('Uploads'), $photo_name);
            $student->student_photo = $photo_name;
        }
        $student->update();
        return redirect()->route('student.index')->with('success', $message);
    }
    public function delete($id){
        $message = "Data deleted is succesfully";
        $student = Student::with('rPhones')->find($id);
        if(!$student){
            return redirect()->route('student.index')->with('warning', 'Data deleted is failed. Data is not found!!');
        }
        if($student->rPhones){
            Phone::where('student_id', $id)->delete();
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', $message);
    }

    public function trashed(){ 
        $student = Student::onlyTrashed()->get();
        return view("crud.student.trashed", ['data' => $student]);
    }

    public function restore($id){
        $student_single = Student::onlyTrashed()->find($id);
        if(!$student_single){
            return redirect()->route('student.trashed')->with('warning', 'Data restore is failed. Data is not found!!');
        }
        $student_single->restore();
        return redirect()->route('student.trashed')->with('success', 'Data restore is failed.');
    }

    public function showTrashed($id){
        $student_single = Student::onlyTrashed()->find($id);
        if(!$student_single){
            return redirect()->route('student.index')->with('warning', 'Data deleted is failed. Data is not found!!');
        }
        // dd($student_single->rPhones()->onlyTrashed()->get());
        return view('crud.student.trashed_show', compact('student_single'));
    }

    public function forceDelete($id){
        $message = "Data deleted is succesfully";
        $student = Student::onlyTrashed()->find($id);
        if(!$student){
            return redirect()->route('student.trashed')->with('warning', 'Data deleted is failed. Data is not found!!');
        }
        if($student->rPhones){
            Phone::where('student_id', $id)->forceDelete();
        }
        if($student->student_photo){
            if(File::exists(public_path('Uploads/'.$student->student_photo))){
                $message = "Data and photo deleted is succesfully";
                File::delete(public_path('Uploads/'.$student->student_photo));
            }
        }
        $student->forceDelete();
        return redirect()->route('student.index')->with('success', $message);
    }
}
