@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
<div class="p-5 mt-3 wholecard container col-5 justify-content-center text-white"
    style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
    <div class="card-header h4 text-center">Create a new Company</div>
    <hr>

    <div class="card-body">
        <form action="{{route('company.store')}}" method="POST">
            {{ csrf_field() }}
            <div class="from-group">
                <input type="text" name="company" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn-success my-3 btn" type="submit">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection