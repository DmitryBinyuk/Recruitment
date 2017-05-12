<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Recruiter;

class PositionController extends Controller
{
    /**
     * Display list of positions
     *
     * @return View
     */
    public function getIndex()
    {
	$positions = \DB::table('positions')
		    ->leftJoin('recruiters', 'positions.recruiter_id', '=', 'recruiters.id')
		    ->orderBy('positions.recruiter_id')
		    ->orderBy('positions.job_created')
		    ->select('positions.*', 'recruiters.*')
		    ->get();

	return view('recruitment.positions', compact('positions'));
    }

    /**
     * Ajax handler for status filter
     *
     * @param string $status
     * @return mixed
     */
    public function statusFilter(Request $request)
    {
	$status = $request->input('status');
	$query = \DB::table('positions')
		    ->leftJoin('recruiters', 'positions.recruiter_id', '=', 'recruiters.id')
		    ->orderBy('positions.recruiter_id')
		    ->orderBy('positions.job_created')
		    ->select('positions.*', 'recruiters.*');

	if($status != 'all'){
	    $query->where('status', $status);
	}

	$positions = $query->get();

	$html = \View::make('recruitment.positions_partial', compact('positions'))->render();

	return $html;
    }
}