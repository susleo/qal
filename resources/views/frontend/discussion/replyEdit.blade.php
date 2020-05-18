@extends('frontend/layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endsection
@section('header')
    @include('frontend/inc/header')
@endsection
@section('section')
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
                            <h6 class="pt-title">EDIT Your Reply</h6>
                            <form action="{{route('question.reply.update',[$question->id,$reply->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input id="body" type="hidden" name="body" value="{{$reply->body}}" class="form-control  @error('body') is-invalid @enderror">
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <trix-editor input="body">
                                    </trix-editor>
                                </div>
                                <div class="pt-row">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary btn-width-lg">Update Reply</button>
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