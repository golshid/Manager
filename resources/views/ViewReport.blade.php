@extends('layouts.app')

@section('content')
<div class="p-5 mt-3 container col-6 justify-content-center text-white" style="background-color:##32325b;border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
    <form action="">
        <fieldset disabled>
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="InputFrom">From</label>
                        <input type="text" name="from" class="form-control text-white bg-transparent" id="InputFrom" value={{$r->user_name}} readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="InputFrom">To</label>
                        <input type="text" name="to" class="form-control text-white bg-transparent" id="InputTo" value={{$admin->name}} readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="InputTitle">Title</label>
                <input type="text" name="title" class="form-control text-white bg-transparent" value="{{$r->title}}" id="InputTitle">
            </div>
            <div class="form-group">
                <label for="InputTextarea">Comment</label>
                <textarea name="content" class="form-control text-white bg-transparent" rows="4" id="InputTextarea">{{$r->content}}</textarea>
            </div>
        </fieldset>
    </form>
    <div class="card text-white wholecard2">
        <div class="card-header">
            Attachments
        </div>
        <div class="card-body row">
            @foreach ($files as $file)
            <div class="col m-1">
                <a href="{{route('download',['file'=>$file->file_name])}}" class="btn btn-block btn-light" download><i class="mr-1 fas fa-cloud-download-alt" style="color: dodgerblue;"></i> {{$file->file_name}}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection 