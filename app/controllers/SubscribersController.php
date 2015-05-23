<?php

class SubscribersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /subscribers
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('subscribers.index')
					->with('subscribers',Subscriber::all())
					->with('title',"Users");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subscribers/create
	 *
	 * @return Response
	 */
	public function create()
	{

		$permissions = Permission::all()->lists('display_name','id');
		$gender = [
					''      => '--select--',
					'male' => 'Male',
					'female'   => 'Female',
					'other'   => 'Other'
		];
		return View::make('subscribers.create')
					->with('gender',$gender)
					->with('permissions',$permissions)
					->with('title','Create User');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subscribers
	 *
	 * @return Response
	 */
	public function store()
	{

		//return Input::get('permissions');


		$rules = [

					'first_name' => 'required',
					'last_name'  => 'required',
					'email'      => 'required|email|unique:users',
					'password'   => 'required',
					'address'    => 'required',
					'phone'      => 'required',
					'gender'     => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();

		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);

		if($user->save() and CustomHelper::assignUserRole($user) and CustomHelper::assignUserPermission($user,$data['permissions'])){
			$subscriber = new Subscriber();
			$subscriber->user_id = $user->id;
			$subscriber->first_name = $data['first_name'];
			$subscriber->last_name = $data['last_name'];
			$subscriber->address = $data['address'];
			$subscriber->phone = $data['phone'];
			$subscriber->gender = $data['gender'];

			if($subscriber->save()){
				return Redirect::route('subscriber.index')->with('success',"User Created Successfully");
			}else{
				return Redirect::route('subscriber.index')->with('error',"Something went wrong.Try again");
			}

		}else{
			return Redirect::route('subscriber.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /subscribers/{id}
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
	 * GET /subscribers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$getUserId = Subscriber::find($id)->user->id;

		$permissions = Permission::all()->lists('display_name','id');

		$selectedPermissions = CustomHelper::getUserPermissions($getUserId);

		$gender = [
					''      => '--select--',
					'male' => 'Male',
					'female'   => 'Female',
					'other'   => 'Other'
		];
		try{
			$subscriber = Subscriber::findOrFail($id);
			return View::make('subscribers.edit')
						->with('subscriber',$subscriber)
						->with('gender',$gender)
						->with('permissions',$permissions)
						->with('selectedPermissions',$selectedPermissions)
						->with('title','Edit Student');
		}catch(Exception $ex){
			return Redirect::route('subscriber.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subscribers/{id}
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
					'phone'      => 'required',
					'gender'     => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$subscriber = Subscriber::find($id);

		$subscriber->first_name = $data['first_name'];
		$subscriber->last_name = $data['last_name'];
		$subscriber->address = $data['address'];
		$subscriber->phone = $data['phone'];
		$subscriber->gender = $data['gender'];
		$user  = User::find($subscriber->user_id);
		if($subscriber->save() and CustomHelper::assignUserPermission($user,$data['permissions'])){
			return Redirect::route('subscriber.index')->with('success','User Updated Successfully.');
		}else{
			return Redirect::route('subscriber.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /subscribers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}