@extends('front')

@section('heading')

<a class="btn btn-primary pull-right" href="{{route('thread.create')}}">Create Thread</a> <br>

@endsection

@section('content')



@include('partials.thread-list')

@endsection