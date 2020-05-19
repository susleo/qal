<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestion;
use App\Question;
use App\Reply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
         $this->middleware('auth',['except'=>['index','show']]);
    }

    public function index()
    {
        //
        $questions = Question::latest()->paginate(15);
        return view('frontend.index')
            ->with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestion $request)
    {
        //
        $request->user()->questions()->create(
            $request->only('title','body')
        );
        Toastr::success('Quesetion Created Sucess');
        return redirect(route('question.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
          $question->increment('views');
        return view('frontend.discussion.show')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
          $this->authorize('update',$question);
        return view('frontend.discussion.create')
            ->with('question',$question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestion $request, Question $question)
    {
        //
        $question->update(
            $request->only('title','body')
        );
        Toastr::success('Quesetion Updated Sucess');
        return redirect(route('question.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        $this->authorize('delete',$question);
        $question->delete();

        Toastr::success('Quesetion Deleted Sucess');
        return redirect(route('question.index'));
    }

    public function bestReply(Question $question ,Reply $reply){
        $question->reply_id = $reply->id;
        $question->update();
       return back();
    }

    public function favourite(Question $question){
        $question->favourites()->attach(auth()->id());
        return back();
    }


    public function unfavourite(Question $question){
        $question->favourites()->detach(auth()->id());
        return back();
    }



    public function voteCont(Question $question){
        $vote = (int) \request()->vote;

        auth()->user()->voteTheQuestion($question,$vote);

        return back();
    }

}
