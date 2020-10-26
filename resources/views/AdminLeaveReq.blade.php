@extends('layouts.app')

@section('content')
<div class="container col-6">
    <div class="p-5 mt-3 container justify-content-center text-white"
        style="background-color:##32325b;border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        <form action="">
            <fieldset disabled>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="InputFrom">From</label>
                            <input type="text" name="from" class="form-control bg-transparent text-white" id="InputFrom"
                                value={{$r->user_name}} readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="InputFrom">To</label>
                            <input type="text" name="to" class="form-control bg-transparent text-white" id="InputTo"
                                value={{$admin->name}} readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="startDate">Date From</label>
                            <input type="text" name="DateFrom" class="form-control bg-transparent text-white"
                                value={{$r->date_from}} id="startDate">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="endDate">Date To</label>
                            <input type="text" name="DateTo" class="form-control bg-transparent text-white"
                                value={{$r->date_to}} id="endDate">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputTitle">Title</label>
                    <input type="text" name="title" class="form-control bg-transparent text-white" value="{{$r->reason}}"
                        id="InputTitle">
                </div>
                <div class="form-group">
                    <label for="InputTextarea">Comment</label>
                    <textarea name="content" class="form-control bg-transparent text-white" rows="4"
                        id="InputTextarea">{{$r->comment}}</textarea>
                </div>
                @if ($r->admin_cm != null)
                <div class="form-group">
                    <label for="InputTextarea">Your Response</label>
                    <textarea name="admin_cm" class="form-control bg-transparent text-white" rows="3" id="InputTextarea"
                        disabled>{{$r->admin_cm}}</textarea>
                </div>
                @endif
            </fieldset>
        </form>
        @if ($r->status == 0)
        @if ($r->admin_cm == null)
        <form action="{{route('admin.respondleave',['id'=>$r->id])}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="InputTextarea">Your Response</label>
                <textarea name="admin_cm" class="form-control bg-transparent text-white" rows="3"
                    id="InputTextarea"></textarea>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-block btn-primary">Submit Response</button>
            </div>
        </form>
        @else
        <div class="form-group">
            <label for="InputTextarea">Your Response</label>
            <textarea name="admin_cm" class="form-control" rows="3" id="InputTextarea"
                disabled>{{$r->admin_cm}}</textarea>
        </div>
        @endif
        <div class="d-flex w-100">
            <a href="{{route('leavereq.reject',['id'=>$r->id])}}"
                class="btn p-1 mr-1 mt-1 flex-fill btn-sm btn-danger">Reject</a>
            <a href="{{route('leavereq.accept',['id'=>$r->id])}}"
                class="btn p-1 ml-1 mt-1 flex-fill btn-sm btn-success">Accept</a>
        </div>
        @elseif($r->status == 1)
        <div class="card border-success text-center text-success p-2">
            You approved this request.
        </div>
        @else
        <div class="card border-danger text-center text-danger p-2">
            You rejected this request.
        </div>

        @endif



    </div>
</div>


@endsection