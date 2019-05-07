@extends('layouts.master')

 @section('Container')
    <div class="user-main">
        <div class="vh-card-4 vh-round vh-padding vh-margin-top">
            <!-- User post -->
            <div class="vh-row">
                <div class="vh-col l1 m3 s3">
                    <a href="{{ url('Customer',[$topic->customer->id]) }}">
                        <img class="vh-circle" src="{{ asset($topic->customer->image) }}" width="40px">
                    </a>
                </div>
                <div class="vh-col l11 m10 s10">
                    <a href="{{ url('Customer',[$topic->customer->id]) }}"><strong>{{ $topic->customer->name }}</strong></a>
                    <a class="vh-small vh-text-gray" href="{{ url('Topic',[$topic->id]) }}"><div>{{ $topic->created_at }}</div></a>
                </div>
            </div>
            <!-- Caption -->
            <div class="vh-margin-top">
                @php
                    $caption=$topic->caption; 
                    echo str_replace("\n","<br/>",$caption);
                @endphp
            </div>
            <!-- Image -->
            @if(isset($topic->image))
            <img src="{{ asset($topic->image) }}" width="100%"/>
            @endif
            <!-- Comments -->
            <div class="vh-padding">
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{url(Session::get('account')->customer->image)}}" width="40px"></div>
                    <div class="vh-col l11 m10 s10">
                        <textarea id="txt_{{$topic->id}}" onfocus="this.attributes['rows'].value = 3" onblur="this.attributes['rows'].value = 1" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=1 onkeydown="keydown_Comment('{{ $topic->id }}',false,event)"></textarea>
                    </div>
                </div>
                @foreach($topic->comment->where('status', 2) as $key=>$comment)
                <!-- 1 Comment -->
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l1 m2 s2">
                        <a href="{{ url('Customer',[$comment->customer->id]) }}">
                            <img class="vh-circle" src="{{asset($comment->customer->image)}}" width="40px">
                        </a>
                    </div>
                    <div class="vh-col l11 m10 s10">
                        <a href="{{ url('Customer',[$comment->customer->id]) }}"><strong>{{ $comment->customer->name }}</strong></a> 
                        @php
                            $caption=$comment->caption; 
                            echo str_replace("\n","<br/>",$caption);
                        @endphp
                        <div class="vh-small vh-text-gray">{{ $comment->updated_at }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection 