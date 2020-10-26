@extends('layouts.app')

@section('content')

<div class=" container col-6 justify-content-center text-black">
    @if (Auth::user()->admin == 1)
        @if ($reports->isEmpty())
            <div class="text-center card card-body wholecard1 text-white" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
                <h4>There is no report to show at this time.</h4>
            </div>
        @else
        <div class="card wholecard1 text-white shadow-lg card-body">
            @foreach ($reports as $r)
                <div class="card wholecard2 text-white mt-2">
                    <div class="card-body d-flex flex-row">
                        <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$r->user->avatar}}" alt=""
                            width="30px" height="30px">&nbsp;&nbsp;
                        <div class=" ml-2">
                            <div class="d-flex flex-column">
                                <a class="mt-2" style="text-decoration:none;" href="{{route('report.show',['id'=>$r->id])}}">

                                    <h5>{{$r->title}}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>Report submitted on {{$r->created_at->toDateString()}} by {{$r->user_name}}</span>    
                    </div>
                </div>
            @endforeach
            <div class="text-center row  justify-content-center my-5">
                {{$reports->links()}}
            </div>
        </div>
        @endif
    @else
    
        @if ($reports->isEmpty())
        <div class="text-center card card-body wholecard1 text-white" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
            <h4>There is no report to show at this time.</h4>
        </div>
        @else
        <div class="card wholecard1 text-white card-body" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
        @foreach ($reports as $r)
        <div class="card wholecard2 text-white">
            <div class="card-body d-flex flex-row">
                <img style="border-radius:50px; img-thumbnail" src="storage/avatars/{{$r->user->avatar}}" alt=""
                    width="30px" height="30px">&nbsp;&nbsp;
                <div class="ml-2">
                    <div class="d-flex flex-column">
                        <a class="mt-2" style="text-decoration:none;" href="{{route('report.show',['id'=>$r->id])}}">
                            
                            <h5>{{$r->title}}</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span>Report submitted on {{$r->created_at->toDateString()}}</span>
            </div>
        </div>
        <br>
    @endforeach
    @endif
    
    <div class="text-center row  justify-content-center my-5">
        {{$reports->links()}}
    </div>
    </div>
    @endif

</div>



@endsection 