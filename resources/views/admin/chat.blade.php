@extends(backpack_view('blank'))
@php
    //    $conversationId = Chat::conversations()->getById($conversation->id);
    $conversationId = $conversation->id;
@endphp

@php
    $messages = Chat::conversations()->getById($conversationId)->messages;
@endphp

@section('content')
    <div class="container my-5 w-100">
        <div class="row justify-content-center">
            <div class="mb-2 col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>
                            {{ $user->name }}

                        </h3>
                    </div>
                    <div id="chatBox" class="card-body scrollable" style="height: 35rem;">
                        {{-- <h4>{{  }}</h4> --}}
                        {{-- <hr /> --}}
                        <div class="container chats">



                            <div class="row">
                                <div class="col-md-12">
                                    @if ($conversationId)
                                        <div class="w-100 py-2">

                                            <div>
                                                @foreach ($messages as $message)
                                                    {{-- {{$message->body}} --}}
                                                    <p class="text-muted text-center">

                                                        {{ $message->created_at->diffForHumans() }}
                                                    </p>
                                                    {{-- {{ $message->sender->id }} --}}
                                                    @if ($message->sender->id == backpack_user()->id)
                                                        <p class="text-end fs-3 ">

                                                            {{ $message->body }}
                                                        </p>
                                                    @else
                                                        <p class="text-start fs-3">

                                                            {{ $message->body }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        {{-- <div class="w-100">
                                            <chat-form :conversation="{{ $conversationId }}"
                                                :user="{{ auth()->user() }}"></chat-form>
                                        </div> --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ backpack_url('chat/reply') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="input-group input-group-flat">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="text" name="message" class="form-control" autocomplete="off"
                                    placeholder="Type message">
                                <span class="input-group-text">
                                    {{-- <input type="submit" value=""> --}}
                                    <button type="submit" class="btn btn-outline-primary"><i class="lar la-paper-plane "></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of your code... -->
    <script>
        window.onload = function() {
            var chatBox = document.getElementById('chatBox');
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
@endsection


{{-- <a href="">
                                        <span></span>
                                    </a> --}}
{{-- <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Clear search" data-bs-original-title="Clear search"> <!-- Download SVG icon from http://tabler-icons.io/i/mood-smile -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 10l.01 0"></path><path d="M15 10l.01 0"></path><path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path></svg>
                                </a>
                                <a href="#" class="link-secondary ms-2" data-bs-toggle="tooltip" aria-label="Add notification" data-bs-original-title="Add notification"> <!-- Download SVG icon from http://tabler-icons.io/i/paperclip -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5"></path></svg>
                                </a> --}}
