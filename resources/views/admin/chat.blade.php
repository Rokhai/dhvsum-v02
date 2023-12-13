@extends(backpack_view('blank'))

@section('content')
    <div class="container my-5 w-100">
        <div class="row justify-content-center">
            <div class="mb-2 col-lg-12 col-md-9 ">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>
                            <div>
                                <img src="{{ $user->avatar }}" class="rounded-circle me-3" alt="{{ $user->name }}"
                                    style="width: 50px; height: 50px;">
                                {{ $user->name }}
                            </div>
                        </h3>
                    </div>
                    <div id="chatBox" class="card-body scrollable" style="height: 35rem;">
                        <div class="container chats">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($conversationId)
                                        <div class="w-100 py-2">

                                            <div>
                                                @foreach ($messages as $message)
                                                    <p class="text-muted text-center mt-3 mb-4">
                                                        {{ $message->created_at->diffForHumans() }}
                                                    </p>
                                                    @if ($message->sender->id == backpack_user()->id)
                                                        <div class="w-100 d-flex justify-content-end">
                                                            <p
                                                                class="text-end  fs-3  badge rounded-pill p4 text-bg-secondary bg-opacity-50 ">
                                                                {{ $message->body }}
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-start">
                                                            <img src="{{ $user->avatar }}" class="rounded-circle me-2"
                                                                alt="{{ $user->name }}"
                                                                style="width: 25px; height: 25px;">

                                                            <div class="w-100 d-flex justify-content-start">
                                                                <p class="text-start  fs-3 mb-0 badge rounded-pill p4 text-bg-secondary  bg-opacity-75 ">
                                                                    {{ $message->body }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
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
                                    <button type="submit" class="btn btn-outline-primary"><i
                                            class="lar la-paper-plane "></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            var chatBox = document.getElementById('chatBox');
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
@endsection