<?php

class StudentGraphController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /studentgraph
	 *
	 * @return Response
	 */
	public function index()
	{
		$students = Student::all();


		//Student Age Graph Sub-Module

		return View::make('graph.student')
					->with('students',$students)
					->with('title',"Students Graph");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /studentgraph/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /studentgraph
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /studentgraph/{id}
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
	 * GET /studentgraph/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /studentgraph/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /studentgraph/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}