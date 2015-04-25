<?php

class StudentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('students.index')
					->with('students',Student::all())
					->with('title',"Students");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /students/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('students.create')
					->with('title',"Create Student");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /students
	 *
	 * @return Response
	 */
	public function store()
	{
		//return Input::all();
		$rules = [
					'first_name' => 'required',
					'last_name'  => 'required',
					'email'      => 'required|email|unique:students',
					'address'    => 'required',
					'city'       => 'required',
					'state'      => 'required',
					'zipcode'    => 'required',
					'phone'      => 'required',
					'dob'        => 'required',
					'gender'     => 'required'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$student = new Student;

		$student->first_name = $data['first_name'];
		$student->last_name = $data['last_name'];
		$student->email = $data['email'];
		$student->address = $data['address'];
		$student->city = $data['city'];
		$student->state = $data['state'];
		$student->zipcode = $data['zipcode'];
		$student->phone = $data['phone'];
		$student->dob = $data['dob'];
		$student->gender = $data['gender'];

		if($student->save()){
			return Redirect::route('student.index')->with('success','Student Created Successfully.');
		}else{
			return Redirect::route('student.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /students/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$student = Student::findOrFail($id);
			return View::make('students.edit')
						->with('student',$student)
						->with('title','Edit Student');
		}catch(Exception $ex){
			return Redirect::route('student.index')->with('error','Something went wrong.Try Again.');
		}

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [

					'first_name' => 'required',
					'last_name'  => 'required',
					'address'    => 'required',
					'city'       => 'required',
					'state'      => 'required',
					'zipcode'    => 'required',
					'phone'      => 'required',
					'dob'        => 'required',
					'gender'     => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$student = Student::find($id);

		$student->first_name = $data['first_name'];
		$student->last_name = $data['last_name'];
		$student->address = $data['address'];
		$student->city = $data['city'];
		$student->state = $data['state'];
		$student->zipcode = $data['zipcode'];
		$student->phone = $data['phone'];
		$student->dob = $data['dob'];
		$student->gender = $data['gender'];

		if($student->save()){
			return Redirect::route('student.index')->with('success','Student Updated Successfully.');
		}else{
			return Redirect::route('student.index')->with('error','Something went wrong.Try Again.');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}