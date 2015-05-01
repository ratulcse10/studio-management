<?php

class StudioClassController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Convert TimeStamp To AM/PM Format
		$classes = StudioClass::all();
		foreach ($classes as $class) {
			$class->start_time = date('h:i A',strtotime($class->start_time)); 
		}
		// ENd Converting





		return View::make('studioClasses.index')
					->with('classes',$classes)
					->with('title',"Classes");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 $day = [
		            'Saturday'      => 'Saturday',
		            'Sunday' => 'Sunday',
		            'Monday'   => 'Monday',
		            'Tuesday'   => 'Tuesday',
		            'Wednesday'   => 'Wednesday',
		            'Thursday'   => 'Thursday',
		            'Friday'   => 'Friday'
		                  
		    ];
	    $status = [
            'Open' => 'Open',
            'Closed'   => 'Closed',
            'Pending'   => 'Pending'
    	];
		return View::make('studioClasses.create')->with('day', $day)->with('status', $status)
					->with('title',"Create Class");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// return Input::all();
		$rules = [
					'name' => 'required',
					'start_time'  => 'required',
					'room'    => 'required',
					'day'       => 'required',
					'instructor'      => 'required',
					'status'    => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$studioclass = new StudioClass;

		$studioclass->name = $data['name'];
		$studioclass->start_time = $data['start_time'];
		$studioclass->room = $data['room'];
		$studioclass->day = $data['day'];
		$studioclass->instructor = $data['instructor'];
		$studioclass->status = $data['status'];
		
		if($studioclass->save()){
			return Redirect::route('studioclass.index')->with('success','Class Created Successfully.');
		}else{
			return Redirect::route('studioclass.index')->with('error','Something went wrong.Try Again.');
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
			$class = StudioClass::findOrFail($id);
			 $day = [
		            'Saturday'      => 'Saturday',
		            'Sunday' => 'Sunday',
		            'Monday'   => 'Monday',
		            'Tuesday'   => 'Tuesday',
		            'Wednesday'   => 'Wednesday',
		            'Thursday'   => 'Thursday',
		            'Friday'   => 'Friday'
		                  
		    ];
		    $status = [
	            'Open' => 'Open',
	            'Closed'   => 'Closed',
	            'Pending'   => 'Pending'
	    	];
			return View::make('studioClasses.edit')
						->with('class',$class)->with('day', $day)->with('status', $status)
						->with('title','Edit Class');
		}catch(Exception $ex){
			return Redirect::route('studioclass.index')->with('error','Something went wrong.Try Again.');
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
					'name' => 'required',
					'start_time'  => 'required',
					'room'    => 'required',
					'day'       => 'required',
					'instructor'      => 'required',
					'status'    => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$studioclass = StudioClass::find($id);

		$studioclass->name = $data['name'];
		$studioclass->start_time = $data['start_time'];
		$studioclass->room = $data['room'];
		$studioclass->day = $data['day'];
		$studioclass->instructor = $data['instructor'];
		$studioclass->status = $data['status'];
		
		if($studioclass->save()){
			return Redirect::route('studioclass.index')->with('success','Class Updated Successfully.');
		}else{
			return Redirect::route('studioclass.index')->with('error','Something went wrong.Try Again.');
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
