@extends('frontend/layouts.app')
@section('header')
    @include('frontend/inc/header')
    @endsection
@section('section')

    <div class="tab-pane show active" id="tt-tab-06" role="tabpanel">
        <div class="tt-wrapper-inner">
            <div class="tt-categories-list">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <div class="tt-item">
                            <div class="tt-item-header">
                                <ul class="tt-list-badge">
                                    <li>
                                        <a href="{{route('discussion.index')}}?category={{$category->slug}}">
                                        <span class="tt-color01 tt-badge">
                                            {{$category->name}}
                                          </span>
                                        </a>
                                    </li>
                                </ul>
                                <h6 class="tt-title">Discussion -{{$category->discussions->count()}}</h6>
                            </div>
                            <div class="tt-item-layout">
                                <div class="innerwrapper">
                                    {{$category->description}}  </div>
                                <div class="innerwrapper">
                                    <h6 class="tt-title">Similar TAGS</h6>
                                    <ul class="tt-list-badge">
                                        <li><a href="#"><span class="tt-badge">world politics</span></a></li>
                                        <li><a href="#"><span class="tt-badge">human rights</span></a></li>
                                        <li><a href="#"><span class="tt-badge">trump</span></a></li>
                                        <li><a href="#"><span class="tt-badge">climate change</span></a></li>
                                        <li><a href="#"><span class="tt-badge">foreign policy</span></a></li>
                                    </ul>
                                </div>
                                <a href="#" class="tt-btn-icon">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</body>
    @endsection