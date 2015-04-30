<?php

class AdvertisementTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('advertisementtypes.index')
					->with('types',AdvertisementType::all())
					->with('title',"Types Of Advertisement");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('advertisementtypes.create')
					->with('title',"Create New Advertisement Type");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//return Input::all();
		$rules = [
					
					'name'      => 'required|unique:advertisement_types'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$type = new AdvertisementType;

		$type->name = $data['name'];
	

		if($type->save()){
			return Redirect::route('advtype.index')->with('success','Type Created Successfully.');
		}else{
			return Redirect::route('advtype.index')->with('error','Something went wrong.Try Again.');
		}
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$type = AdvertisementType::findOrFail($id);
			return View::make('advertisementtypes.edit')
						->with('type',$type)
						->with('title','Edit Type');
		}catch(Exception $ex){
			return Redirect::route('advtype.index')->with('error','Something went wrong.Try Again.');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [

					'name' => 'required|unique:advertisement_types'
					
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$type = AdvertisementType::find($id);

		$type->name = $data['name'];
	

		if($type->save()){
			return Redirect::route('advtype.index')->with('success','Type Updated Successfully.');
		}else{
			return Redirect::route('advtype.index')->with('error','Something went wrong.Try Again.');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
