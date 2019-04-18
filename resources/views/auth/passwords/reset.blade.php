@extends('layouts.app')

@section('content')
<form method="post" action="email">
    @csrf
    @if(session('error'))
        <div>
        {{session('error')}}
        </div>
    @endif
    @if(session('success'))
        <div>
        {{session('success')}}
        </div>
    @endif
    <input type="email" id="email" name="email">
    <input type="submit">
</form>
@endsection
