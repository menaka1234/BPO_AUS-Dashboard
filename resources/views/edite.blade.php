@extends('front')

@section('heading', "Create Thread")

@section('content')

@include('partials.error')

@include('partials.success')

<div class="row">
    <div class="well">
        <form class="form-vertical" action="{{route('thread.update', $thread->id)}}" method="post" role="form" id="create-thread-form">
        {{csrf_field()}}
        {{method_field('put')}}
        
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="" placeholder="Input.." value="{{$thread->subject}}">
            </div>
            
             <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" id="" placeholder="Input.." value="{{$thread->type}}">
            </div>
            
             <div class="form-group">
                <label for="subject">Thread</label>
                <input type="text" class="form-control" name="thread" id="" placeholder="Input.." value="{{$thread->thread}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>
</div>



@endsection