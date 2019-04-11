<?php

namespace App\Http\Controllers\Admin;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $q = Input::get ( 'q' );
       if($q != ""){
       $students = Student::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'phoneNumber', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
       $pagination = $students->appends ( array (
          'q' => Input::get ( 'q' )
        ) );
       if (count ( $students ) > 0)
        return view('admin.students.index',compact('students'))->withDetails ( $students )->withQuery ( $q );
       }
       else{
         $field = $request->get('field') != '' ? $request->get('field') : 'name';
         $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
         $students =new Student();
         $students = $students->orderBy($field, $sort)->paginate(5);
         return view('admin.students.index',compact('students'));
       }



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Student::create($request->all());
      return redirect()->route('admin.students.index');
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
      return view('admin.students.edit',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('admin.students.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index');
    }
}
