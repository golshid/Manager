@extends('layouts.app2')

@section('content')

<div class="container col-6">
    <div class="card card-body text-white wholecard1" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        <p>Congratulations! You just registered as an employee.
        Your username is {{$username}} <p>
        Your password is {{$password}} <p>
@endsection