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

                    <div class="row">
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

                        <div class="tt-item-info info-bottom ">
                            <form action="{{route('votes',$question->id)}}" method="POST">
                                @csrf
                          <button>
                                <i class="fa fa-arrow-up fa-4x" aria-hidden="true"></i>
                              <input type="hidden" name="vote" value="1">
                                <span class="tt-text">{{$question->up}}</span>
                          </button>
                            </form>

                            <form action="{{route('votes',$question->id)}}" method="POST">
                                @csrf
                            <button>
                                <i class="fa fa-arrow-down fa-4x" aria-hidden="true"></i>
                                <input type="hidden" name="vote" value="-1">
                                <span class="tt-text">{{$question->down}}</span>

                            </button>
                            </form>
                            <form action="{{($question->favourited)?route('unfav',$question->id):route('fav',$question->id)}}" method="POST">
                                @csrf
                                @if($question->favourited)
                                    @method("DELETE")
                                    @csrf
                                    @endif
                             <button>
                                <i class="fa fa-heart fa-4x" aria-hidden="true"></i>
                                 <span class="tt-text">{{$question->favourites()->count()}}</span>
                             </button>
                            </form>
                            <div class="col-separator"></div>

                        </div>
                    </div>
                </div>
            </div>
                <div class="row-object-inline form-default">
                    <h2 class="text-capitalize">
                    <span class="badge badge-primary">{{$question->replies->count()}} REPLIES </span>
                    </h2>
                </div>


                @foreach($question->replies()->latest()->paginate(8) as $reply)
                <div class="tt-item">
                    <div class="tt-single-topic">
                        <div class="tt-item-header pt-noborder">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-icon">
                                </div>
                                <div class="tt-avatar-title">
{{--                                    <a href="#">{{$reply->user->name}}</a>--}}
                                    <div class="tt-item-info info-top">
                                        <div class="tt-avatar-icon">
                                            <img src="{{$question->user->image ?? Gravatar::src($reply->user->email)}}" alt="">
                                        </div>
                                        <div class="tt-avatar-title">
                                            <a href="">{{$reply->user->name}}</a>
                                        </div>

                                    </div>
                                </div>
                                <span class="tt-info-time">
                                       {{($reply->created_date)}}
                                </span>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            @if (Auth::check())
                            @if(auth()->user()->id == $question->user_id)
                                <div class="float-right">
                                    <form action="{{ route('bestReply',['question'=>$question->id,'reply'=>$reply->id])}}" method="post">
                                      @csrf
                                        <div class="pt-row">
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-info">
                                                    {{($question->reply_id == $reply->id ) ?'Best Repliy':'Marked As Best' }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endif
                           {!! \Illuminate\Support\Str::ucfirst($reply->body) !!}
                        </div>
                        <div class="tt-item-info info-bottom">
                            <form action="{{route('voteReply',$reply->id)}}" method="POST">
                                @csrf
                            <button>
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                <input type="hidden" name="vote" value="1">
                                <span class="tt-text">{{$reply->up}}</span>
                            </button>
                            </form>

                            <form action="{{route('voteReply',$reply->id)}}" method="POST">
                                @csrf
                                <button>
                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    <span class="tt-text">{{$reply->down}}</span>
                                    <input type="hidden" name="vote" value="-1">
                                </button>
                            </form>

                        </div>
                        <div class="float-right">
                            @if (Auth::check())
                                @if(Auth::id() == $reply->user_id)
                                    <form action="{{route('question.reply.destroy',[$question->id,$reply->id])}}" method="post">
                                        <a href="{{route('question.reply.edit',[$question->id,$reply->id])}}" class="btn btn-sm btn-outline-warning">Edit</a>
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="pagination">
                   {{$question->replies()->paginate(8)->links()}}
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
                            <form action="{{route('question.reply.store',$question->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input id="body" type="hidden" name="body" value="" class="form-control  @error('body') is-invalid @enderror">
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <trix-editor input="body" placeholder="Lets get started">
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
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script>
        $('trix-editor').css("min-height", "350px");
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#inputTopicTags').select2();

        });
    </script>
@endsection