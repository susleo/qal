<?php

namespace App\Http\Controllers;

use App\Policies\QuestionPolicy;
use App\Question;
use App\Reply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Question $question)
    {
        //
        $request->validate([
            'body'=>'required',
        ]);

        $question->replies()->create([
                'body' => $request->body,
                'user_id'=>Auth::id(),
            ]);

        Toastr::success('Reply Has Been Addedd');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Reply $reply)
    {
        //
        return view('frontend.discussion.replyEdit')
            ->with('question',$question)
            ->with('reply',$reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Reply $reply)
    {
        //
        $request->validate(['body'=>'required']);
          $reply->update([
            'body'=>$request->body,
        ]);
          Toastr::success('Updates Sucess');
          return redirect(route('question.show',$question->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question ,Reply $reply)
    {
        //
        $reply->delete();
        return back();
    }

    public function voteCont(Reply $reply){
        $vote = (int) \request()->vote;

        auth()->user()->voteTheReply($reply,$vote);

        return back();
    }

}
