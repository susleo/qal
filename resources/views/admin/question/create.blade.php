@extends('frontend/layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endsection
@section('header')
    @include('frontend/inc/header')
@endsection
@section('section')


    <div class="tt-wrapper-inner">
        <h1 class="tt-title-border">
            Create New Question
        </h1>
        <form action="{{route('question.store')}}" class="form-default form-create-topic" method="post">
            @csrf
            <div class="form-group">
                <label for="inputTopicTitle">Question Title</label>
                <div class="tt-value-wrapper">
                    <input type="text" value="{{old('title'),isset($question)?$question->title:''}}" name="title" class="form-control  @error('title') is-invalid @enderror" id="inputTopicTitle" placeholder="Subject of your topic">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="tt-value-input">99</span>
                </div>
                <div class="tt-note">Describe your topic well, while keeping the subject as short as possible.</div>
            </div>

            <div class="pt-editor">
                <h6 class="pt-title">Question Body</h6>
                <div class="form-group">
                    <input id="contents" type="hidden" class="form-control  @error('body') is-invalid @enderror" name="body" value="{{old('body'),isset($question)?$question->body:''}}">
                    <trix-editor input="contents"  placeholder="Lets get started">
                    </trix-editor>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                {{--                        <div class="row">--}}
                {{--                            <div class="col-md-4">--}}
                {{--                                <div class="form-group">--}}
                {{--                                    <label for="inputTopicTitle">Category</label>--}}
                {{--                                    <select class="form-control" name="category_id">--}}
                {{--                                        @foreach($categories as $cat)--}}
                {{--                                            <option value="{{$cat->id}}"--}}
                {{--                                            @if(isset($discussion))--}}
                {{--                                                 @if($discusssion->categoyr_id == $cat->id)--}}
                {{--                                                     selected--}}
                {{--                                                     @endif--}}
                {{--                                                @endif--}}
                {{--                                            >{{$cat->name}}</option>--}}
                {{--                                            @endforeach--}}
                {{--                                    </select>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <div class="col-md-8">--}}
                {{--                                <div class="form-group">--}}
                {{--                                    <label for="inputTopicTags">Tags</label>--}}
                {{--                                    <select class="js-states form-control" id="inputTopicTags" name="tags[]" multiple="multiple" id="inputTopicTags" >--}}
                {{--                                        @foreach($tags as $t)--}}
                {{--                                        <option value="{{$t->id}}" >{{$t->name}}</option>--}}
                {{--                                        @endforeach--}}
                {{--                                    </select>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
            </div>
            <div class="row">
                <div class="col-auto ml-md-auto">
                    <button type="submit" class="btn btn-secondary btn-width-lg">Create Question</button>
                </div>
            </div>
    </div>
    </form>
    </div>



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