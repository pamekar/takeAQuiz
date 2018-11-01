<?php

namespace App\Http\Controllers;

use App\Question;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //
    public function startTest(Request $request)
    {
        // drg >> get user's specification
        $duration = $request->duration;
        $count = $request->count;
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

        return view('questions', $data);
    }

    public function submitTest(Request $request)
    {
        $questions = $request->all();
        $score = 0;
        $data = [];
        // drg >> check if result_id is valid
        $isValid = Result::where('result_id', $request->rid)->first();

        if ($isValid) {
            $score = Question::where(function ($query) use ($questions) {
                foreach ($questions as $question => $answer) {
                    $query->orWhere([
                        ['question_id', $question],
                        ['answer', $answer]
                    ]);
                }
            })->count();

            $result = Result::find($isValid->id);
            $result->score = $score;

                $result->save();

                /*Mail::to(Auth::user()->email)
                    ->send(new \App\Mail\FinishedTest($result->id));*/

                $data['score'] = $score;
                $data['percent'] = ($score /$result->question_count) * 100;

        } else {
            $data['error'] = "Oops! This is not a valid test";
        }
        if ($request->ajax()) {
            return $request->json($data);
        }

        $data['title'] = 'Submited';
        return view('submitted', $data);

    }
}
