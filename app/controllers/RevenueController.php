<?php

class RevenueController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$revenues = Revenue::whereUserId($user->id)->get();

		return View::make('revenues.index')
					->with('revenues',$revenues)
					->with('title',"Revenues");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$month = [
			'January'      => 'January',
            'February' => 'February',
            'March'   => 'March',
            'April'   => 'April',
          	'May'      => 'May',
            'June' => 'June',
            'July'   => 'July',
            'August'   => 'August',
            'September'      => 'September',
            'October' => 'October',
            'November'   => 'November',
            'December'   => 'December'
        ];
        $current_year = (int)date('Y');
        $year = '';
        for ($i=0; $i < 5; $i++) { 
       		 $year[$current_year] = $current_year;
       		 $current_year--;
        }
       
		return View::make('revenues.create')->with('month',$month)->with('year',$year)
					->with('title',"Create Revenue");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//return Input::all();
		$user = Auth::user();
		// return $user->id;
		$rules = [
					'revenue' => 'required|numeric',
					'month'  => 'required',
					'year'      => 'required|numeric'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$revenue = new Revenue;

		$revenue->revenue = $data['revenue'];
		$revenue->month = $data['month'];
		$revenue->year = $data['year'];
		$revenue->user_id = $user->id;
		if($revenue->save()){

			return Redirect::route('revenue.index')->with('success','Revenue Created Successfully.');
		}else{
			return Redirect::route('revenue.index')->with('error','Something went wrong.Try Again.');
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
			$revenue = Revenue::findOrFail($id);
			$month = [
			'January'      => 'January',
            'February' => 'February',
            'March'   => 'March',
            'April'   => 'April',
          	'May'      => 'May',
            'June' => 'June',
            'July'   => 'July',
            'August'   => 'August',
            'September'      => 'September',
            'October' => 'October',
            'November'   => 'November',
            'December'   => 'December'
	        ];
	        $current_year = (int)date('Y');
	        $year = '';
	        for ($i=0; $i < 5; $i++) { 
	       		 $year[$current_year] = $current_year;
	       		 $current_year--;
	        }
	        // return json_encode($revenue);
			return View::make('revenues.edit')
						->with('revenue',$revenue)->with('month',$month)->with('year',$year)
						->with('title','Edit Revenue');
		}catch(Exception $ex){
			return Redirect::route('revenue.index')->with('error','Something went wrong.Try Again.');
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
		//return Input::all();
		$rules = [
					'revenue' => 'required|numeric',
					'month'  => 'required',
					'year'      => 'required|numeric'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$revenue = Revenue::find($id);

		$revenue->revenue = $data['revenue'];
		$revenue->month = $data['month'];
		$revenue->year = $data['year'];
		if($revenue->save()){

			return Redirect::route('revenue.index')->with('success','Revenue Updated Successfully.');
		}else{
			return Redirect::route('revenue.index')->with('error','Something went wrong.Try Again.');
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
