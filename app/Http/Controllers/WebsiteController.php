<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Str;
use File;
class WebsiteController extends Controller
{
    //
    public function index()
    {
       return view('home_master');
    }

    //Student Crud
    public function studentlist()
    {
        $student = Student::all();
        return view('student/index',compact('student'));
    }
    public function studentcreate()
    {
        return view('student/create');
    }
    public function studentinsert(Request $req)
    {
        $req->validate([
            'student_name' => 'required',
            'student_email' => 'required|email',
            'student_phone' => 'required',
            'student_picture' => 'required',
        ]);
        if($req->hasFile('student_picture')){

            $img = $req->file('student_picture');
            $extension = $img->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $img->move('storage/student',$filename);
            Student::create([
                'student_name' => $req->student_name,
               // 'slug' => Str::slug($req->student_name),
                'slug' => Str::slug($req->student_name),
                'student_email' => $req->student_email,
                'student_phone' => $req->student_phone,
                'student_picture' => $filename,
            ]);
        }

        // if ($request->file('login_page_image')) {
        //     deleteImage($cms->login_page_image);
        //     $url = uploadImage($request->login_page_image, 'login');
        //     $cms->login_page_image = $url;
        //     $cms->login_page_title = $request->login_page_title;
        // } else {

        //     $cms->login_page_title = $request->login_page_title;
        // }

        // Student::create([
        //     'student_name' => $req->student_name,
        //    // 'slug' => Str::slug($req->student_name),
        //     'slug' => Str::slug($req->student_name),
        //     'student_email' => $req->student_email,
        //     'student_phone' => $req->student_phone,
        // ]);
        return back()->with('success','Data Insert');

    }

    public function studentedit(Student $student)
    {
      // return $student;
      //  $studentlist = Student::find($student);

        // return [
        //     'model_binding' => $student,
        //     'without_model_binding' => $studentlist
        // ];
        //  $data = Student::find($student);
        // // return view('student/edit',compact('data'));
       // return $student;
        // return view('student/edit',compact('data'));
       // $editdata = Student::where('id',$id)->get();
        return view('student/edit',compact('student'));


    }

    public function studentupdate(Request $req,Student $student)
    {
       // return $req->student;
       // $student = new Student();
       // $student = Student::where('id',$req->student)->update([
           //     'id' => $req->student,
           //     'student_name' => $req->student_name,

           // ]);
           // $student = $req->student;
           // $student->slug = $req->student;
           // $student->id = $req->student;

        $student =  Student::find($req->student);
        $student->student_name = $req->student_name;
        $student->slug = Str::slug($req->student_name);
        $student->student_email = $req->student_email;
        $student->student_phone = $req->student_phone;
        $student->save();
        return redirect('student')->with('success','Data Update');

    }

    //Student Delete
    public function studentdelete(Student $student)
    {
        $student = Student::find($student);
        //$student->delete();
        Student::destroy($student);

        // Student::delete($student);
         return redirect('student')->with('success','Data Delete');
    }

}
