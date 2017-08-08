@extends('front')



@section('banner')

    <div class="jumbotron">
        <div class="container">
            <h1> Project Dashboard </h1>
            <p> Official Dashboard For BPO Projects </p>
            
            
            <p>
                <a class="btn btn-primary btn-lg"> Visit Website </a>
                <a class="btn btn-primary btn-lg"> Visit Mails </a>
                <a class="btn btn-primary btn-lg"> Visit Customer Portal </a>
                <a class="btn btn-primary btn-lg"> Visit Git </a>
                
            </p>
        
        </div>
    </div>

@endsection

@section('heading',"Threads")
@section('content')

@include('partials.thread-list')

@endsection


