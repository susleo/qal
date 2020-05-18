@extends('frontend/layouts.app')
@section('header')
    @include('frontend/inc/header')
@endsection
@section('section')

    <div class="tt-single-topic-list">
        <div class="tt-item">
            <div class="tt-single-topic">
                <div class="tt-item-header">
                    <div class="tt-item-info info-top">
                        <div class="tt-avatar-icon">
                            <img src="{{$question->user->image ?? Gravatar::src($question->user->email)}}" alt="">
                        </div>
                        <div class="tt-avatar-title">
                            <a href="">{{$question->user->name}}</a>
                        </div>
                        <a href="#" class="tt-info-time">
                            {{($question->created_date)}}
                        </a>
                    </div>
                    <h3 class="tt-item-title">
                        {{$question->title}}
                    </h3>
                    <div class="tt-item-tag">
                        <ul class="tt-list-badge">
                            {{--                                    <li><a href="#"><span class="tt-color03 tt-badge">{{$question->category->name}}</span></a></li>--}}

                        </ul>
                    </div>
                </div>
                <div class="tt-item-description">
                    {!! $question->body !!}
                </div>
                <div class="tt-item-info info-bottom">
                    {{--                            <a href="#" class="tt-icon-btn">--}}
                    {{--                                <i class="fas fa-thumbs-up"></i>--}}
                    {{--                                <span class="tt-text">{{$question->like}}</span>--}}
                    {{--                            </a>--}}
                    {{--                            <a href="#" class="tt-icon-btn">--}}

                    {{--                                <i class="fas fa-thumbs-down"></i>--}}
                    {{--                                <span class="tt-text">{{$question->dislike}}</span>--}}
                    {{--                            </a>--}}
                    {{--                            <a href="#" class="tt-icon-btn">--}}
                    {{--                                <i class="fas fa-heart"></i>--}}
                    {{--                                <span class="tt-text">12</span>--}}
                    {{--                            </a>--}}
                    <div class="col-separator"></div>

                </div>
            </div>
        </div>

        <div class="row-object-inline form-default">
            <h2 class="text-capitalize">
                <span class="badge badge-primary">REPLIES </span>
            </h2>
        </div>


        {{--                @if($question->bestReply)--}}
        {{--               <div class="alert alert-success" role="alert">--}}
        {{--                    <span class="badge badge-danger">--}}
        {{--                                    Best Reply--}}
        {{--                        </span>--}}
        {{--                    <div class="tt-single-topic">--}}
        {{--                        <div class="tt-item-header pt-noborder">--}}
        {{--                            <div class="tt-item-info info-top">--}}
        {{--                                <div class="tt-avatar-icon">--}}
        {{--                                    <img src="{{$dicussion->user->image ?? Gravatar::src($question->user->email)}}" alt="">--}}
        {{--                                </div>--}}
        {{--                                <div class="tt-avatar-title">--}}
        {{--                                    <a href="#">{{$question->bestReply->user->name}}</a>--}}
        {{--                                </div>--}}
        {{--                                <span class="tt-info-time">--}}
        {{--                                    {{\Carbon\Carbon::parse($question->bestReply->created_at)->format('d/m/Y')}}--}}
        {{--                                </span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="tt-item-description">--}}
        {{--                            {!! \Illuminate\Support\Str::ucfirst($question->bestReply->contents)!!}--}}
        {{--                        </div>--}}
        {{--                        <div class="tt-item-info info-bottom">--}}
        {{--                            <a href="#" class="tt-icon-btn">--}}
        {{--                                <span class="tt-text">671</span>--}}
        {{--                            </a>--}}
        {{--                            <a href="#" class="tt-icon-btn">--}}
        {{--                                <span class="tt-text">39</span>--}}
        {{--                            </a>--}}
        {{--                            <a href="#" class="tt-icon-btn">--}}
        {{--                                <span class="tt-text">12</span>--}}
        {{--                            </a>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endif--}}

        {{--                @foreach($question->replies()->latest()->paginate(5) as $reply)--}}
        {{--                <div class="tt-item">--}}
        {{--                    <div class="tt-single-topic">--}}
        {{--                        <div class="tt-item-header pt-noborder">--}}
        {{--                            <div class="tt-item-info info-top">--}}
        {{--                                <div class="tt-avatar-icon">--}}
        {{--                                </div>--}}
        {{--                                <div class="tt-avatar-title">--}}
        {{--                                    <a href="#">{{$reply->user->name}}</a>--}}
        {{--                                </div>--}}
        {{--                                <span class="tt-info-time">--}}
        {{--                                    {{\Carbon\Carbon::parse($reply->created_at)->format('d/m/Y')}}--}}
        {{--                                </span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="tt-item-description">--}}
        {{--                            @if (Auth::check())--}}
        {{--                            @if(auth()->user()->id == $question->user_id)--}}
        {{--                                <div class="float-right">--}}
        {{--                                    <form action="{{ route('best.reply',['discussion'=>$question->slug,'reply'=>$reply->id])}}" method="post">--}}
        {{--                                      @csrf--}}
        {{--                                        <div class="pt-row">--}}
        {{--                                            <div class="col-auto">--}}
        {{--                                                <button type="submit" class="btn btn-info">--}}
        {{--                                                    {{($question->reply_id == $reply->id ) ?'Best Repliy':'Marked As Best' }}</button>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </form>--}}
        {{--                                </div>--}}
        {{--                                @endif--}}
        {{--                            @endif--}}
        {{--                           {!! \Illuminate\Support\Str::ucfirst($reply->contents) !!}--}}
        {{--                        </div>--}}
        {{--                        <div class="tt-item-info info-bottom">--}}
        {{--                            <a href="#" class="tt-icon-btn">--}}
        {{--                                <span class="tt-text">671</span>--}}
        {{--                            </a>--}}
        {{--                            <a href="#" class="tt-icon-btn">--}}
        {{--                                <span class="tt-text">39</span>--}}
        {{--                            </a>--}}
        {{--                            <a href="#" class="tt-icon-btn">--}}
        {{--                                <span class="tt-text">12</span>--}}
        {{--                            </a>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endforeach--}}
        <div class="pagination">
            {{--                   {{$question->replies()->paginate(5)->links()}}--}}
        </div>
    </div>
    {{--            @guest--}}
    {{--                    <form action="{{route('login')}}" method="get">--}}
    {{--                        <div class="pt-row">--}}
    {{--                            <div class="col-auto">--}}
    {{--                                <button type="submit" class="btn btn-secondary btn-width-lg">Login To Reply To This Discussion </button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </form>--}}
    {{--                @else--}}
    {{--                    <div class="tt-wrapper-inner">--}}
    {{--                        <div class="pt-editor form-default">--}}
    {{--                            <h6 class="pt-title">Post Your Reply</h6>--}}
    {{--                            <form action="{{route('replies.store',$question->slug)}}" method="post">--}}
    {{--                                @csrf--}}
    {{--                                <div class="form-group">--}}
    {{--                                    <input id="contents" type="hidden" name="contents" value="">--}}
    {{--                                    <trix-editor input="contents" placeholder="Lets get started">--}}
    {{--                                    </trix-editor>--}}
    {{--                                </div>--}}
    {{--                                <div class="pt-row">--}}
    {{--                                    <div class="col-auto">--}}
    {{--                                        <button type="submit" class="btn btn-secondary btn-width-lg">Reply</button>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                            </form>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endguest--}}


@endsection
