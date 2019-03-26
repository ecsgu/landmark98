
@extends('layouts.master')

@section('Container')
    <div class="vh-row-padding">
        <!-- Quảng cáo bên trái -->
        <div class="vh-col l2 m12 s12">
            
            <div class="">
                <h4 class="vh-center"> Thông báo </h4>
            </div>
        </div>
        <!-- Bài post -->
        <div class="vh-col l8 m12 s12">
        @foreach($Topic as $topic)
            
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{$topic->image}}" width="40px"> </div>
                    <div class="vh-col l11 m11 s11">
                        <a href="#">{{ $topic->customer->name }}</a>
                        <div class="vh-small vh-text-gray">{{ $topic->created_at }}</div>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">
                    {{ $topic->caption }}
                </div>
                <!-- Image -->
                @if(isset($topic_image))
                <img class="vh-image" src=\"{{ $topic_image }}\" />
                @endif
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <input class="vh-input" type="text" />
                        </div>
                    </div>
                    @foreach($topic->comment as $comment)
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ $comment->customer->image }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <a href="#">{{ $comment->customer->name }}</a> 
                            {{ $comment->caption }}
                            <div class="vh-small vh-text-gray">{{ $comment->updated_at }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="#">Xem thêm</a>
            </div>
            @endforeach
            <!-- Quảng cáo bên trái -->
            <div class="vh-col l2 m12 s12">
            
            </div>
        </div>
    </div>
@endsection