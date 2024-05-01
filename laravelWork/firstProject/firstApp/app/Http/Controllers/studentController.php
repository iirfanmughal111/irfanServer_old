<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    public function index(){
        $student = student::all();
        return view('student.index',compact('student'));
    }
    public function create(){
        return view('student.create ');
    }
    public function store(request $req){
        $students = new student;
        $students->name = $req->input('name');
        $students->email = $req->input('email');
        $students->course = $req->input('course');
        if ($req->hasfile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().".".$ext;
            $file->move('images/',$filename);
            $students->image = $filename;
        }
        $students->save();
        return redirect()->back()->with('status','Student  Added successfully');
    }
    public function edit($id){
        $student=student::find($id);
        return view('student.edit',compact('student'));
    }
    public function update(Request $req,$id){
        $students=student::find($id);
         
        $students->name = $req->input('name');
        $students->email = $req->input('email');
        $students->course = $req->input('course');
        if ($req->hasfile('image')){
            $dest = 'images/'.$students->image;
            if (File::exists($dest)){
                File::delete($dest);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().".".$ext;
            $file->move('images/',$filename);
            $students->image = $filename;
        }
        $students->update();
        return redirect()->back()->with('status','Student  Updated successfully');
    }
    public function destroy($id){
        $students = student::find($id);
        $dest = 'images/'.$students->imgae;
        // if (File::exists($dest)){
        //     File::delete($dest);
        // }
        $students->delete();
        return redirect()->back()->with('status','Student  Deleted successfully');
    }
}
