@extends('layouts.app')

@section('content')

@if (Auth::user()->admin == 1)
<div class="container col-6">

    <div class="btn-group-lg d-flex" role="group">
        <button type="radio" style="background-color:rgba(52,138,167,0.4);" id="button1"
            class="btn m-1 flex-fill btn-secondary" data-toggle="collapse" data-target="#collapseExample1"
            aria-expanded="true" aria-controls="collapseExample1">Pending</button>
        <button type="radio" style="background-color:rgba(93,211,158,0.4);" id="button2"
            class="btn m-1 flex-fill btn-secondary" data-toggle="collapse" data-target="#collapseExample2"
            aria-expanded="false" aria-controls="collapseExample2">Approved</button>
        <button type="radio" style="background-color:rgba(188,231,132,0.4);" id="button3"
            class="btn m-1 flex-fill btn-secondary" data-toggle="collapse" data-target="#collapseExample3"
            aria-expanded="false" aria-controls="collapseExample3">Rejected</button>
    </div>
    <div class="collapse show mt-3" id="collapseExample1">
        <div class="card wholecard1 text-white card-body"
            style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
            @if ($pendingrequests->isEmpty())
            <h5>There is no request to show at this time.</h5>
            @else
            @foreach ($pendingrequests as $r)
            <div class="container">
                <div class="card mt-2 wholecard2">
                    <div class="card-body d-flex flex-row">
                        <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$r->user->avatar}}" alt=""
                            width="30px" height="30px">&nbsp;&nbsp;
                        <div class=" ml-2">

                            <div class="d-flex flex-column">

                                <a class="mt-2" style="text-decoration:none;"
                                    href="{{route('leavereq.showAdmin',['id'=>$r->id])}}">
                                    <h5>{{$r->reason}}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>Requested on {{$r->created_at->toDateString()}} by <a
                                href="{{route('profile.find',['id'=>$r->user_id])}}"> {{$r->user_name}}</a></span>
                        <a href="{{route('leavereq.reject',['id'=>$r->id])}}"
                            class="btn btn-sm float-right btn-danger">Reject</a>
                        <a href="{{route('leavereq.accept',['id'=>$r->id])}}"
                            class="btn btn-sm mr-2 float-right btn-success">Accept</a>

                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center row  justify-content-center my-5">
                {{$pendingrequests->links()}}
            </div>
            @endif
        </div>
    </div>

    <div class="collapse mt-3" id="collapseExample2">
        <div class="card text-white wholecard1 card-body"
            style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
            @if ($approvedrequests->isEmpty())
            <h5>You haven't approved any requests yet.</h5>
            @else
            @foreach ($approvedrequests as $r)
            <div class="container">
                <div class="card mt-2 text-white wholecard2">
                    <div class="card-body d-flex flex-row">
                        <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$r->user->avatar}}" alt=""
                            width="30px" height="30px">&nbsp;&nbsp;
                        <div class="ml-2">
                            <div class="d-flex flex-column">
                                <a class="mt-2" style="text-decoration:none;"
                                    href="{{route('leavereq.showAdmin',['id'=>$r->id])}}">
                                    <h5>{{ $r->reason}}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>Requested on {{$r->created_at->toDateString()}} by <a
                                href="{{route('profile.find',['id'=>$r->user_id])}}"> {{$r->user_name}}</a></span>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="text-center row  justify-content-center my-5">
                {{$approvedrequests->links()}}
            </div>
            @endif
        </div>
    </div>

    <div class="collapse mt-3" id="collapseExample3">
        <div class="card text-white wholecard1 card-body"
            style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
            @if ($rejectedrequests->isEmpty())
            <h5>You haven't rejected any requests yet.</h5>
            @else
            @foreach ($rejectedrequests as $r)
            <div class="container">
                <div class="card wholecard2 mt-2 text-white">
                    <div class="card-body d-flex flex-row">
                        <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$r->user->avatar}}" alt=""
                            width="30px" height="30px">&nbsp;&nbsp;
                        <div class="ml-2">
                            <div class="d-flex flex-column">
                                <a class="mt-2" style="text-decoration:none;"
                                    href="{{route('leavereq.showAdmin',['id'=>$r->id])}}">
                                    <h5>{{ $r->reason}}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>Requested on {{$r->created_at->toDateString()}} by <a
                                href="{{route('profile.find',['id'=>$r->user_id])}}"> {{$r->user_name}}</a></span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center row  justify-content-center">
                {{$rejectedrequests->links()}}
            </div>
            @endif
        </div>
    </div>
</div>

@else
<div class="container col-6">
    @if ($requests->isEmpty())
    <div class="text-center card card-body wholecard1 text-white"
        style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        <h4>There is no request to show at this time.</h4>
    </div>
    @else
    <div class="card wholecard1 text-white card-body" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        @foreach ($requests as $r)
        <div class="card mt-3 wholecard2">
            <div class="card-body  text-white d-flex flex-row">
                <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$r->user->avatar}}" alt=""
                    width="30px" height="30px">&nbsp;&nbsp;
                <div class="ml-2">
                    <div class="d-flex flex-column">
                        <a class="mt-2" style="text-decoration:none;"
                            href="{{route('leavereq.showUser',['id'=>$r->id])}}">
                            <h5>{{$r->reason}}</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span class="text-white">Requested on {{$r->created_at->toDateString()}}</span>
                @if ($r->status == 0)
                <a class="btn disabled float-right btn-info">Pending</a>
                @elseif($r->status == 1)
                <a class="btn disabled float-right btn-success">Approved</a>
                @else
                <a class="btn disabled float-right btn-danger">Rejected</a>

                @endif
            </div>
        </div>

        @endforeach
        <div class="text-center row mt-4 justify-content-center">
            {{$requests->links()}}
        </div>
        @endif
    </div>
</div>
@endif




<script>
    $("#button1").click(function(){
        $("#collapseExample1").collapse('show');
        $("#collapseExample2").collapse('hide');
        $("#collapseExample3").collapse('hide'); });

    $("#button2").click(function(){
        $("#collapseExample1").collapse('hide');
        $("#collapseExample2").collapse('show');
        $("#collapseExample3").collapse('hide'); });
    
    $("#button3").click(function(){
        $("#collapseExample1").collapse('hide');
        $("#collapseExample2").collapse('hide');
        $("#collapseExample3").collapse('show'); });
</script>



@endsection