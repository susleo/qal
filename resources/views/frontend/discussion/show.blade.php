@extends('frontend/layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endsection
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
                                    <img src="{{$discussion->user->image ?? Gravatar::src($discussion->user->email)}}" alt="">
                                </div>
                                <div class="tt-avatar-title">
                                    <a href="">{{$discussion->user->name}}</a>
                                </div>
                                <a href="#" class="tt-info-time">
                                 {{\Carbon\Carbon::parse($discussion->created_at)->format('d/m/Y')}}
                                </a>
                            </div>
                            <h3 class="tt-item-title">
                               {{$discussion->title}}
                            </h3>
                            <div class="tt-item-tag">
                                <ul class="tt-list-badge">
                                    <li><a href="#"><span class="tt-color03 tt-badge">{{$discussion->category->name}}</span></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            {!! $discussion->contents !!}
                        </div>
                        <div class="tt-item-info info-bottom">
                            <a href="#" class="tt-icon-btn">
                                <i class="fas fa-thumbs-up"></i>
                                <span class="tt-text">{{$discussion->like}}</span>
                            </a>
                            <a href="#" class="tt-icon-btn">

                                <i class="fas fa-thumbs-down"></i>
                                <span class="tt-text">{{$discussion->dislike}}</span>
                            </a>
                            <a href="#" class="tt-icon-btn">
                                <i class="fas fa-heart"></i>
                                <span class="tt-text">12</span>
                            </a>
                            <div class="col-separator"></div>

                        </div>
                    </div>
                </div>

                <div class="row-object-inline form-default">
                    <h2 class="text-capitalize">
                    <span class="badge badge-primary">REPLIES </span>
                    </h2>
                </div>


                @if($discussion->bestReply)
               <div class="alert alert-success" role="alert">
                    <span class="badge badge-danger">
                                    Best Reply
                        </span>
                    <div class="tt-single-topic">
                        <div class="tt-item-header pt-noborder">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-icon">
                                    <img src="{{$dicussion->user->image ?? Gravatar::src($discussion->user->email)}}" alt="">
                                </div>
                                <div class="tt-avatar-title">
                                    <a href="#">{{$discussion->bestReply->user->name}}</a>
                                </div>
                                <span class="tt-info-time">
                                    {{\Carbon\Carbon::parse($discussion->bestReply->created_at)->format('d/m/Y')}}
                                </span>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            {!! \Illuminate\Support\Str::ucfirst($discussion->bestReply->contents)!!}
                        </div>
                        <div class="tt-item-info info-bottom">
                            <a href="#" class="tt-icon-btn">
                                <span class="tt-text">671</span>
                            </a>
                            <a href="#" class="tt-icon-btn">
                                <span class="tt-text">39</span>
                            </a>
                            <a href="#" class="tt-icon-btn">
                                <span class="tt-text">12</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

                @foreach($discussion->replies()->latest()->paginate(5) as $reply)
                <div class="tt-item">
                    <div class="tt-single-topic">
                        <div class="tt-item-header pt-noborder">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-icon">
                                </div>
                                <div class="tt-avatar-title">
                                    <a href="#">{{$reply->user->name}}</a>
                                </div>
                                <span class="tt-info-time">
                                    {{\Carbon\Carbon::parse($reply->created_at)->format('d/m/Y')}}
                                </span>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            @if (Auth::check())
                            @if(auth()->user()->id == $discussion->user_id)
                                <div class="float-right">
                                    <form action="{{ route('best.reply',['discussion'=>$discussion->slug,'reply'=>$reply->id])}}" method="post">
                                      @csrf
                                        <div class="pt-row">
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-info">
                                                    {{($discussion->reply_id == $reply->id ) ?'Best Repliy':'Marked As Best' }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endif
                           {!! \Illuminate\Support\Str::ucfirst($reply->contents) !!}
                        </div>
                        <div class="tt-item-info info-bottom">
                            <a href="#" class="tt-icon-btn">
                                <span class="tt-text">671</span>
                            </a>
                            <a href="#" class="tt-icon-btn">
                                <span class="tt-text">39</span>
                            </a>
                            <a href="#" class="tt-icon-btn">
                                <span class="tt-text">12</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="pagination">
                   {{$discussion->replies()->paginate(5)->links()}}
                </div>
            </div>
            @guest
                    <form action="{{route('login')}}" method="get">
                        <div class="pt-row">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-secondary btn-width-lg">Login To Reply To This Discussion </button>
                            </div>
                        </div>

                    </form>
                @else
                    <div class="tt-wrapper-inner">
                        <div class="pt-editor form-default">
                            <h6 class="pt-title">Post Your Reply</h6>
                            <form action="{{route('replies.store',$discussion->slug)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input id="contents" type="hidden" name="contents" value="">
                                    <trix-editor input="contents" placeholder="Lets get started">
                                    </trix-editor>
                                </div>
                                <div class="pt-row">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary btn-width-lg">Reply</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                @endguest



    @endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
<script>

</script>