<?php

class PermissionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /permissions
	 *
	 * @return Response
	 */
	public function index()
	{
		$permission = Permission::all();
		return View::make('permissions.index')
					->with('permissions',$permission)
					->with('title',"Permissions");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /permissions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('permissions.create')
					->with('title',"Create Permission");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /permissions
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name' => 'required|unique:permissions',
					'display_name' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$permission = new Permission();

		$permission->name = $data['name'];
		$permission->display_name = $data['display_name'];
		if($permission->save()){

			return Redirect::route('permission.index')->with('success','Permission Created Successfully.');
		}else{
			return Redirect::route('permission.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /permissions/{id}
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
	 * GET /permissions/{id}/edit
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
	 * PUT /permissions/{id}
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
	 * DELETE /permissions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}