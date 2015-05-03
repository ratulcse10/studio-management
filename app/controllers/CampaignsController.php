<?php

class CampaignsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /campaigns
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('campaigns.index')
					->with('campaigns',Campaign::all())
					->with('title',"Campaign");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /campaigns/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('campaigns.create')
					->with('ad_types',AdvertisementType::lists('name','id'))
					->with('title',"Create Campaign");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /campaigns
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name'         => 'required',
					'from'         => 'required',
					'to'           => 'required',
					'ad_type'      => 'required',
					'total_copies' => 'required|integer',
					'cost'         => 'required|numeric'

		];

		$messages = array(
					'name.required' => 'Campaign Name is Required.',
					'from.required' => 'Launch Date Required.',
					'to.required' => 'End Date Required.',
					'total_copies.required' => 'Total copy is Required.',
		);

		$data = Input::all();

		$validator = Validator::make($data,$rules,$messages);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$campaign = new Campaign();

		$campaign->name = $data['name'];
		$campaign->from = $data['from'];
		$campaign->to = $data['to'];
		$campaign->ad_type = $data['ad_type'];
		$campaign->total_copies = $data['total_copies'];
		$campaign->cost = $data['cost'];
		$campaign->created_by = Auth::user()->id;


		if($campaign->save()){
			return Redirect::route('campaign.index')->with('success','Campaign Created Successfully.');
		}else{
			return Redirect::route('campaign.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /campaigns/{id}
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
	 * GET /campaigns/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$campaign = Campaign::findOrFail($id);
			return View::make('campaigns.edit')
						->with('campaign',$campaign)
						->with('ad_types',AdvertisementType::lists('name','id'))
						->with('title','Edit Campaign');
		}catch(Exception $ex){
			return Redirect::route('campaign.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /campaigns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'name'         => 'required',
					'from'         => 'required',
					'to'           => 'required',
					'ad_type'      => 'required',
					'total_copies' => 'required|integer',
					'cost'         => 'required|numeric'

		];

		$messages = array(
					'name.required' => 'Campaign Name is Required.',
					'from.required' => 'Launch Date Required.',
					'to.required' => 'End Date Required.',
					'total_copies.required' => 'Total copy is Required.',
		);

		$data = Input::all();

		$validator = Validator::make($data,$rules,$messages);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$campaign = Campaign::find($id);

		$campaign->name = $data['name'];
		$campaign->from = $data['from'];
		$campaign->to = $data['to'];
		$campaign->ad_type = $data['ad_type'];
		$campaign->total_copies = $data['total_copies'];
		$campaign->cost = $data['cost'];

		if($campaign->save()){
			return Redirect::route('campaign.index')->with('success','Campaign Updated Successfully.');
		}else{
			return Redirect::route('campaign.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /campaigns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}