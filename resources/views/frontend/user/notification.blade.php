@extends('frontend/layouts.app')
@section('header')
    @include('frontend/inc/header')
    @endsection
@section('section')



    @foreach($notifications as $notification)
{{--        @if($notification->type == 'App\Notifications\NewReplyAdded')--}}
      @php  $newReplyAdded = $notification->type == 'App\Notifications\NewReplyAdded';
            $markedAsBest = $notification->type == 'App\Notifications\markAsBestReply';
      @endphp
            <div class="tt-wrapper-section">
                <div class="container">
                    <div class="tt-user-header">
                        <div class="tt-col-avatar">
                            <div class="tt-icon">
                            </div>
                        </div>
                        <div class="tt-col-title">
                            <ul class="tt-list-badge">
                                <li>
                                    @if($newReplyAdded)
                                    <span class="tt-color14 tt-badge">
                                        {{'New Reply Added'}}
                                     </span>
                                    @endif

                                   @if($markedAsBest)
                                       <span class="badge badge-success">
                                          {{'Marked As Best Reply'}}
                                        </span>
                                        @endif
                                </li>
                            </ul>

                            <div class="tt-title">
                                @if($newReplyAdded)
                                on this disscussion =>
                              <strong>
                                  {{\Illuminate\Support\Str::ucfirst($notification->data['discussion']['title'])}}
                              </strong>

                                </div>
                               @endif

                            @if($markedAsBest)
                                on this discussion =>
                                <strong>
                                    {{\Illuminate\Support\Str::ucfirst($notification->data['discussion']['title'])}}
                                </strong>

                        @endif
                        </div>
                        <div class="tt-col-btn" id="js-settings-btn">
                            <div class="tt-list-btn">
                                <a href="#" class="tt-btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-settings_fill"></use>
                                    </svg>
                                </a>
                                <a href="{{route('discussion.show',$notification->first()->data['discussion']['slug'])}}" class="btn btn-secondary">View Discussion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--        @endif--}}
        @endforeach
   <div>
   {{$notifications->links()}}
   </div>

</body>
    @endsection