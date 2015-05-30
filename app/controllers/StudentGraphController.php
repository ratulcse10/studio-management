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
					->with('title',"Students Graph");
					
	}

	public function cityData(){
		$data = DB::table('students')
					->select( DB::raw("city as city"), DB::raw('count(*) as value'))
					->groupBy('city')
					->orderBy('value', 'DESC')
					->orderBy('city', 'ASC')
					->get();

		return $data;
	}

	public function ageData(){
		$students = Student::get();
		$list = $students->lists('age');
		$list_count = array_count_values($list);
		ksort($list_count);

		$process = [];

		foreach($list_count as $key=> $value){
			$obj = new stdClass();
			$obj->value = $value;
			$obj->age = $key;
			array_push($process,$obj);
		}

		return Response::json($process);
	}

	public function enrollData($year){
		return DB::table('students')
					->select( [
								DB::raw("Month(created_at) as month"),
								DB::raw('count(*) as value'),
					])
					->where(DB::raw('YEAR(created_at)'), '=', $year)
					->groupBy('month')
					->get();
	}

}