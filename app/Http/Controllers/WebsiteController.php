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
use Storage;
use Illuminate\Support\Facades\DB;
class WebsiteController extends Controller
{
    //

    public function admin()
    {
        return view('admin.master');
    }
    public function index()
    {

       return view('home_master');
    }

    //Student Crud
    public function studentlist(Student $student)
    {

       //return $student->id;
       // $student = Student::all();
    //    return $student->count();
//    return $categ = DB::table('students')
//  ->select('student_id', 'student_files.id', DB::raw('count(students.id) as total_product'))
//  ->join('student_files', 'studentfiles.student_id', '=', 'students.id')->groupBy('studentfiles.student_id')->get();

  $studentlist = Student::withCount('studentfiles')->get();

//  $categ = DB::table('posts')
//  ->select('categories.id', "categories.name", DB::raw("count(posts.id) as total_product"))
//  ->join('categories, "posts.category_id', '=', 'categories.id')
//  ->groupBy('posts.category_id')
//  ->get();


     // return $studentlist = Student::with('studentfiles')->get();
 // $studentlist = StudentFile::with('student')->get();
  //return $studentlist->count();

        return view('student/index',compact('studentlist'));
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
          $newroad = public_path(). '/storage/student/' .$req->student_name;
          File::makeDirectory($newroad,0775,true);

            foreach($files as $file){

                // $image_name = md5(rand(1000,10000));
                // $ext = strtolower($file->getClientOriginalExtension());
                // $filename =$image_name.'.'.$ext;
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($newroad,$filename);
                // Storage::makeDirectory($newroad,0775,true);

                // $url = uploadImage($req->student_picture, 'student');
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
     // return $student;
    $student = Student::find($student->id)->get();

    //   $comtes = Student::find(24)->studentfiles;
    //    // return $comtes;
    //     foreach($comtes as $value){
    //        echo $value->student_img;
    //     }
  // $studentlist = Student::with('studentfiles')->get();
 // return $studentlist->count();
//   return $studentlist = StudentFile::find($student->id)->;
//  return $post = Student::studentfiles()->where('student_id',$student)->first();

//  $comment = Post::find(1)->comments()
//                     ->where('title', 'foo')
//                     ->first();
   // $studentlist = Student::with('studentfiles')->get();
    //  $student = Student::where('student_id',$student->id)->get();
    $studentfile = StudentFile::where('student_id',$student)->get();

    //   $studentlist = Student::with('studentfiles')->get();

       return view('student/view',compact('student','studentfile'));
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
      return $group = Group::find(1);
        // $studentgroup = StudentGroup::with('group')->get();
        $studentgroup = StudentGroup::all();
       // $user = User::all();
       // return $users;
        return view('group',compact('group','studentgroup'));
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
