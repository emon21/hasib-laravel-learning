<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentFile;
use Illuminate\Support\Str;
use App\Models\Group;
use App\Models\StudentGroup;
use App\Models\User;
use App\Models\Phone;
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
        // $req->validate([
        //     'student_name' => 'required',
        //     'student_email' => 'required|email',
        //     'student_phone' => 'required',
        //     'student_picture' => 'required',
        // ]);



        // if($req->hasFile('student_picture')){

        //     $img = $req->file('student_picture');
        //     $extension = $img->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $img->move('storage/student',$filename);
        //     $student = Student::create([
        //         'student_name' => $req->student_name,
        //        // 'slug' => Str::slug($req->student_name),
        //         'slug' => Str::slug($req->student_name),
        //         'student_email' => $req->student_email,
        //         'student_phone' => $req->student_phone,
        //         // 'student_picture' => $filename,
        //     ]);

        // }

        $student = Student::create([
            'student_name' => $req->student_name,
           // 'slug' => Str::slug($req->student_name),
            'slug' => Str::slug($req->student_name),
            'student_email' => $req->student_email,
            'student_phone' => $req->student_phone,
            // 'student_picture' => $filename,
        ]);

        //multiple image upload into database

        // $img = $req->file('student_picture');
        //     $extension = $img->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $img->move('storage/student',$filename);
        $files = $req->file('student_picture');
          //  $count = 1;
            foreach($files as $file){

                // $image_name = md5(rand(1000,10000));
                // $ext = strtolower($file->getClientOriginalExtension());
                // $filename =$image_name.'.'.$ext;
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('storage/student',$filename);
               // $count++;
                StudentFile::create([
                    'student_id' => $student->id,
                    'student_img' => $filename,
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

    public function studentview(Student $student)
    {
      //return $student;
      // $studentlist = StudentFile::all();

    //   $comtes = Student::find(24)->studentfiles;
    //    // return $comtes;
    //     foreach($comtes as $value){
    //        echo $value->student_img;
    //     }
 // return $studentlist = Student::with('studentfiles')->get();
  //return $studentlist = StudentFile::find($student)->get();
 return $post = Student::studentfiles()->where('student_id',$student)->first();

//  $comment = Post::find(1)->comments()
//                     ->where('title', 'foo')
//                     ->first();
    //  return $studentlist = Student::with('studentfiles')->where(StudentFile::find('student_id',$student)->get());
    //   $studentlist = Student::with('studentfiles')->get();

       return view('student/view',compact('studentlist'));
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

    public function group()
    {
        //Group Relation
       // $group = Group::find(2)->studentGroup;
       // return $group;
        //Student Group Relation
      // $student = StudentGroup::find(2)->group;
       // return $student;
       // $group = Group::all();
       $group = Group::all();
        // $studentgroup = StudentGroup::with('group')->get();
        $studentgroup = StudentGroup::all();
       // $user = User::all();
       // return $users;
        return view('home_master',compact('group','studentgroup'));
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
