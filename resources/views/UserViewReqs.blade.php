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
                            <input type="text" name="from" class="form-control text-white bg-transparent" id="InputFrom"
                                value={{$r->user_name}} readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="InputFrom">To</label>
                            <input type="text" name="to" class="form-control text-white bg-transparent" id="InputTo" value={{$admin->name}}
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="startDate">Date From</label>
                            <input type="text" name="DateFrom" class="form-control text-white bg-transparent" value={{$r->date_from}}
                                id="startDate">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="endDate">Date To</label>
                            <input type="text" name="DateTo" class="form-control text-white bg-transparent" value={{$r->date_to}} id="endDate">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputTitle">Title</label>
                    <input type="text" name="title" class="form-control text-white bg-transparent" value="{{$r->title}}" id="InputTitle">
                </div>
                <div class="form-group">
                    <label for="InputTextarea">Your Comment</label>
                    <textarea name="content" class="form-control text-white bg-transparent" rows="4" id="InputTextarea">{{$r->content}}</textarea>
                </div>
            </fieldset>
        </form>
        @if ($r->admin_cm != null)
        <div class="form-group ">
            <label for="InputTextarea">Admin's Response</label>
            <textarea name="admin_cm" class="form-control bg-transparent text-white" rows="3" id="InputTextarea"
                disabled>{{$r->admin_cm}}</textarea>
        </div>
        @endif
        @if ($r->status == 0)
        <div class="card border-info text-center text-info bg-transparent p-2">
                    Pending
                </div>
        @elseif($r->status == 1)
        <div class="card border-success text-center bg-transparent text-success p-2">
            Approved
        </div>
        @else
        <div class="card border-danger text-center bg-transparent text-danger p-2">
            Rejected
        </div>

        @endif

    </div>
</div>


@endsection