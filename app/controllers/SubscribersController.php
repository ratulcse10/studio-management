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

		//get all the payment type for Dropdown
		$paymentType = Config::get('customConfig.paymentType');

		//get all the payment Cycle for Dropdown
		$paymentCycle = Config::get('customConfig.paymentCycle');



		//get all permissions for permission CheckBox
		$permissions = Permission::all()->lists('display_name','id');


		 //Get All the role for dropdown list then remove the admin role from array for security
		$roles = Role::all()->lists('name','id');
		unset($roles[1]);

		//create gender array for gender dropdown
		$gender = [
					''      => '--select--',
					'male' => 'Male',
					'female'   => 'Female',
					'other'   => 'Other'
		];
		return View::make('subscribers.create')
					->with('gender',$gender)
					->with('roles',$roles)
					->with('permissions',$permissions)
					->with('paymentType',$paymentType)
					->with('paymentCycle',$paymentCycle)
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
					'social_security'=>'required|numeric|digits:9',
					'gender'     => 'required',
					'payment_type'     => 'required',
					'payment_amount'     => 'numeric',
					'role_id'     => 'required'
		];



		$data = Input::all();

		if($data['payment_type'] === Config::get('customConfig.paymentType.custom')){
			$data['payment_amount'] = null;
			$data['payment_cycle'] = null;
		}elseif($data['payment_type'] === Config::get('customConfig.paymentType.hourly')){
			$data['payment_cycle'] = null;
		}

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();

		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);

		if($user->save() and CustomHelper::assignRole($user,$data['role_id']) and CustomHelper::assignUserPermission($user,$data['permissions'])){
			$subscriber = new Subscriber();
			$subscriber->user_id = $user->id;
			$subscriber->first_name = $data['first_name'];
			$subscriber->last_name = $data['last_name'];
			$subscriber->address = $data['address'];
			$subscriber->phone = $data['phone'];
			$subscriber->gender = $data['gender'];
			$subscriber->social_security = $data['social_security'];
			$subscriber->payment_type = $data['payment_type'];
			$subscriber->payment_amount = $data['payment_amount'];
			$subscriber->payment_cycle = $data['payment_cycle'];

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