@extends('frontend/layouts.app')
@section('header')
    @include('frontend/inc/header')
    @endsection
@section('section')

        <div class="tt-topic-list">

            <div class="tt-list-header">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value hide-mobile">Likes</div>
                <div class="tt-col-value hide-mobile">Views</div>
                <div class="tt-col-value">Activity</div>
                <div class="tt-col-value">Action</div>
            </div>

                 @foreach($questions as $dis)
            <div class="tt-item tt-itemselect">
                <div class="tt-col-avatar">
                    <div style="border: 3px solid green;" class="votes" >
                        <p align="center">Votes</p> <p align="center"><strong style="align: center">{{$dis->votes_count}}</strong></p>
                    </div>

                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="{{$dis->url}}">
                           {{$dis->title}}
                    </a></h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-11">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="#"><span class="tt-color01 tt-badge"> abc</span></a></li>
                                <li>Asked By: <span class="tt-badge"><a href="#">{{$dis->user->name}}</a></span></li>
                            </ul>
                        </div>
                        <div class="col-1 ml-auto show-mobile">
                            <div class="tt-value">1h</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category"><span class="tt-color01 tt-badge">Hello </span></div>
                <div class="tt-col-value hide-mobile"> {{$dis->votes_count}}</div>
                <div class="tt-col-value hide-mobile"> {{$dis->views}}</div>
                <div class="tt-col-value hide-mobile">{{$dis->created_date}}</div>


                <div class="tt-col-value hide-mobile">
                    @if (Auth::check())
                    @if(Auth::user()->can('update',$dis))
                    <a href="{{route('question.edit',$dis->id)}}" class="btn btn-sm btn-outline-warning">Edit</a>
                    <form action="{{route('question.destroy',$dis->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button href="" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                    </form>
                    @endif
                   @endif
                </div>

            </div>

            @endforeach

        </div>
        {{$questions->links()}}

{{--        {{$discussions->appends(['category'=>request()->query('category')])->links()}}--}}
</body>
    @endsection