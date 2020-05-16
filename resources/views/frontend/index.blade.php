@extends('frontend/layouts.app')
@section('header')
{{--    @include('frontend/inc/header')--}}
    @endsection
@section('section')

        <div class="tt-topic-list">

            <div class="tt-list-header">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value hide-mobile">Likes</div>
                <div class="tt-col-value hide-mobile">Views</div>
                <div class="tt-col-value">Activity</div>
            </div>

                 @foreach($questions as $dis)
            <div class="tt-item tt-itemselect">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                      Image
                    </svg>
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
                <div class="tt-col-value hide-mobile"> {{$dis->votes}}</div>
                <div class="tt-col-value hide-mobile"> {{$dis->views}}</div>
                <div class="tt-col-value hide-mobile">{{$dis->created_date}}</div>
            </div>

            @endforeach

        </div>
        {{$questions->links()}}

{{--        {{$discussions->appends(['category'=>request()->query('category')])->links()}}--}}
</body>
    @endsection