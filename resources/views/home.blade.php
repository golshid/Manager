@extends('layouts.app')

@section('content')
@if (Session::has('success'))
<div class="p-5 mt-3 wholecard container col-6 justify-content-center text-white"
    style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
</div>
@endif
{{-- <div class="p-5 container col-6" style="background-color:#ededef;border-radius: 5px; box-shadow: 2px 2px 20px 5px #efdae3;">
    <div class="row">
        <div class="col-sm p-2">
            <a href="{{route('request.submit')}}" style="background-color:#efdae3; color:#60565a;" class="p-5 btn btn-outline-light btn-lg btn-block">Requests</a>
        </div>
        <div class="col-sm p-2">
            <a style="background-color:#dae3ef; color:#60565a;" class="p-5 btn btn-outline-light btn-lg btn-block">Time Off</a>
        </div>
        <div class="col-sm p-2">
            <a style="background-color:#e3efda; color:#60565a;" class="p-5 btn btn-outline-light btn-lg btn-block">Clock In/Out</a>
        </div>
        <div class="w-100"></div>
        <div class="col-sm p-2">
            <a href="{{route('reports.inbox')}}" style="background-color:#efdaee; color:#60565a;" class="p-5 btn btn-outline-light btn-lg btn-block">Reports</a>
        </div>
        <div class="col-sm p-2">
            <a href="{{route('requests.inbox')}}" style="background-color:#e7e7ee; color:#60565a;" class="p-5 btn btn-outline-light btn-lg btn-block">Inbox</a>
        </div>
        <div class="col-sm p-2">
            <a style="background-color:#daefe6; color:#60565a;" class="p-5 btn btn-outline-light btn-lg btn-block">Setting</a>
        </div>
    </div>
</div> --}}
@endsection
