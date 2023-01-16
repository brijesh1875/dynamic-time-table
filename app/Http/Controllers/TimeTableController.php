<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectHourRequest;
use App\Http\Requests\TimeStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimeTableController extends Controller
{
    public function store(TimeStoreRequest $request)
    {
        Session::put($request->only('working_days', 'sub_per_day', 'subject', 'total_hours'));

        return redirect()->route('setDetail');
    }

    public function setDetail()
    {
        return view('subject-detail');
    }

    public function generateTimeTable(SubjectHourRequest $request)
    {
        $total_subject = Session::get('subject');
        $total_hours = Session::get('total_hours');

        $subject_hours = [];

        for ($i=0; $i<$total_subject; $i++)
        {
            $subject_hours[$request->name[$i]] = $request->hours[$i];
        }

        $total_rows = Session::get('sub_per_day');
        $total_column = Session::get('working_days');
        $time_table = [];

        for($i=0; $i<$total_rows; $i++)
        {
            for($j=0; $j<$total_column; $j++)
            {
                $key = key($subject_hours);
                $time_table[$i][$j] = $key;
                $subject_hours[$key]--;
                arsort($subject_hours);
            }
        }

        return view('time-table', compact('time_table'));
    }
}
