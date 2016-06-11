<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\User;
use App\SchoolYear;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ScheduleController extends Controller
{
	public function createSchoolYear () {
		$user = \Auth::user();
		$schoolYear = new SchoolYear();
		$schoolYear->owner = $user->id;
		$schoolYear->name = Input::get('name');
		$schoolYear->start_date = Input::get('startDate');
		$schoolYear->end_date = Input::get('endDate');

		$compare = SchoolYear::where('name',$schoolYear->name)->where('owner',$user->id)->first();
        if($compare){
            $scheduleFeedback = 'school_year_already_exists';
            return view('Schedule',compact('scheduleFeedback'));
        }
		
        if(strtotime($schoolYear->start_date) >= strtotime($schoolYear->end_date)){
        	$scheduleFeedback = 'school_term_date_error';
            return view('Schedule',compact('scheduleFeedback'));
        }
		
        $schoolYear->save();
		return redirect(url('/schedule'));
	}

	public function createSchoolTerm ($yearID) {
		$user = \Auth::user();
		$schoolTerm = new SchoolTerm();
		$schoolTerm->year = $yearID;
		$schoolTerm->name = Input::get('name');
		$schoolTerm->startDate = Input::get('startDate');
		$schoolTerm->endDate = Input::get('endDate');

		$compare = SchoolTerm::where('name',$schoolTerm->name)->where('year', $schoolTerm->year)->first();
        if($compare){
            $scheduleFeedback = 'school_term_already_exists';
            return view('Schedule',compact('scheduleFeedback'));
        }

        if(strtotime($schoolTerm->startDate) >= strtotime($schoolTerm->endDate)){
        	$scheduleFeedback = 'school_term_date_error';
            return view('Schedule',compact('scheduleFeedback'));
        }

        $schoolTerm->save();
		return redirect(url('/schedule'));
	}
}