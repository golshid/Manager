@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    {!!Session::get('Error')!!}
    <div class="p-5 mt-3 wholecard container col-5 justify-content-center text-white"
        style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        <div class="card-header h4 text-center">Join Company</div>
        <hr>

        <div class="card-body">
            <form action="{{route('company.join')}}" method="POST">
                {{ csrf_field() }}
                <div class="from-group">
                    <input type="text" name="company" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn-success my-3 pr-3 pl-3 btn" type="submit">
                            Join
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
