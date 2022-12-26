<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'phone' => 'required',
        ]);
        $student = new Phone();
        $student->student_id = $id;
        $student->phone = $request->phone;
        $student->save();
        return redirect()->route('student.show', $id);
    }
    public function delete($id){
        $phone = Phone::find($id);
        if(!$phone){
            return redirect()->route('student.index')->with('warning', 'Data deleted is failed. Data is not found!!');
        }
        $student_id = $phone->student_id;
        $phone->delete();
        return redirect()->route('student.show', $student_id)->with('success', 'Data deleted is succesfully');
    }
    public function restore($id){
        $phone = Phone::onlyTrashed()->find($id);
        if(!$phone){
            return redirect()->route('student.trashed')->with('warning', 'Data restore is failed. Data is not found!!');
        }
        $student_id = $phone->student_id;
        $phone->restore();
        return redirect()->route('student.show-trashed', $student_id)->with('success', 'Data restore is failed.');
    }

    public function forceDelete($id){
        $phone = Phone::onlyTrashed()->find($id);
        if(!$phone){
            return redirect()->route('student.trashed')->with('warning', 'Data deleted is failed. Data is not found!!');
        }
        $student_id = $phone->student_id;
        $phone->forceDelete();
        return redirect()->route('student.show-trashed', $student_id)->with('success', 'Data deleted is succesfully');
    }

}
