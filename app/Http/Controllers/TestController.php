<?php

namespace App\Http\Controllers;

use App\Question;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        // drg >> get user's specification
        $duration = $request->duration;
        $count = $request->question_count;
        $result_id = md5(str_random() . date('YmdHis'));
        // drg >> register result
        $result = new Result();
        $result->result_id = $result_id;
        $result->name = Auth::user()->name;
        $result->duration = $duration;
        $result->question_count = $count;
        $result->started_at = Carbon::now();
        $result->save();
        // drg >> set test data
        $data['duration'] = $duration;
        $data['result_id'] = $result_id;
        $data['question_count'] = $count;
        $data['questions'] = Question::inRandomOrder()->limit($count)->get();

        return view('questions',$data);
    }
}
