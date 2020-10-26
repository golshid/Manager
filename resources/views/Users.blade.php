@extends('layouts.app')

@section('content')

<div class="container col-6">
    <div class="card card-body text-white wholecard1" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        <h2 class="text-center">{{Auth::user()->company}}'s Employees</h2>
        <hr>
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <form action="{{ route('process') }}" method="post">
            {{ csrf_field() }}
                    <div class="card card-body text-white wholecard2">
                        <div class="row">
                            <div class="col-10">
                                <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter employee's email to invite.">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Invite</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
        @foreach ($userslist as $userlist)
        <div class="card card-body text-white wholecard2 mt-2">
            <div class="row">
                <div class="col-1">
                    <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$userlist->avatar}}" alt="" width="30px" height="30px">
                </div>
                <div class="col">
                    <a style="text-decoration:none;" href="{{route('profile.find',['id'=>$userlist->id])}}">{{$userlist->name}}</a>
                </div>
                <div class="col">
                    {{$userlist->email}}
                </div>
            </div>
        </div>
        @endforeach
        <div class="text-center row  justify-content-center my-5">
                        {{$userslist->links()}}
                    </div>
        
    </div>
</div>

@endsection