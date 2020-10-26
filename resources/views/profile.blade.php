
@extends('layouts.app')

@section('content')

<div class="container col-6">
    <div class="card py-5  card-body text-white wholecard1" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">

        <div class="card-body border p-5 border-dark">
        <div class="row justify-content-center">
            <img class="rounded-circle img-thumbnail" width="200px" height="200px"
                src="/storage/avatars/{{$userinfo->user->avatar}}" />
        </div>
        <h4 class="m-2 text-center text-white"><span>{{$userinfo->first_name}} {{$userinfo->last_name}}</span></h4>
        @if ($userinfo->user_id == Auth::user()->id)
        <form method="post" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="custom-file form-group p-2 col-md-4">
                    <input type="file" name="filename" class="form-control p-2 custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file...</label>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 mt-2">
                    <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
                </div>
            </div>
        </form>
        </div>
        @endif
    <form method="post" action="{{route('store.info',['id'=>$thisid])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (Auth::user()->admin == 1 && $userinfo->user_id != Auth::user()->id )
                <fieldset disabled>
            @endif
            <div class="row ml-1 mt-5">
                <h4>Basic Information</h4> 
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="{{Auth::user()->name}}"
                            class="form-control text-white lighttrans" id="username">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Password</label>
                        <a href="/changepassword" class="btn btn-outline-success btn-block">Change Password</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                    <input type="text" name="first_name" value="{{$userinfo->first_name != null ? $userinfo->first_name : '' }}" class="form-control text-white lighttrans" id="firstname">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="last_name" value="{{$userinfo->last_name != null ? $userinfo->last_name : '' }}" class="form-control text-white lighttrans" id="lastname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control text-white lighttrans">
                            <option>-- Select --</option>
                            <option value="Female" @if($userinfo->gender == 'Female') selected @endif>Female</option>
                            <option value="Male" @if($userinfo->gender == 'Male') selected @endif>Male</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" name="birthdate" value="{{$userinfo->birthdate != null ? $userinfo->birthdate  : '' }}" class="form-control text-white lighttrans" id="birthdate">
                    </div>
                </div>
            </div>
            <br>
            <div class="row ml-1 mt-3">
                <h4>Address</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" name="street" value="{{$userinfo->street != null ? $userinfo->street : '' }}" class="form-control text-white lighttrans" id="street">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" value="{{$userinfo->city != null ? $userinfo->city : '' }}" class="form-control text-white lighttrans" id="city">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" name="province" value="{{$userinfo->province != null ? $userinfo->province : '' }}" class="form-control text-white lighttrans" id="province">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" name="postal_code" value="{{$userinfo->postal_code != null ? $userinfo->postal_code : '' }}" class="form-control text-white lighttrans" id="zipcode">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="country-select">Country</label>
                    <select id="country-select" name="country" value="{{$userinfo->country != null ? $userinfo->country : '' }}" class="form-control text-white lighttrans bfh-countries" data-country="{{$userinfo->country}}"
                            data-flags="true">
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row ml-1 mt-3">
                <h4>Contact</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="work_phone"><i class="fas mr-1 fa-building"></i>Work Phone</label>
                        <input type="text" name="work_phone" value="{{$userinfo->work_phone != null ? $userinfo->work_phone : '' }}" class="form-control text-white lighttrans" id="work_phone">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="mobile"><i class="fas mr-1 fa-mobile-alt"></i>Mobile Phone</label>
                        <input type="text" name="mobile" value="{{$userinfo->mobile != null ? $userinfo->mobile : '' }}" class="form-control text-white lighttrans" id="mobile">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="home_phone"><i class="fas mr-1 fa-home"></i>Home Phone</label>
                        <input type="text" name="home_phone" value="{{$userinfo->home_phone != null ? $userinfo->home_phone : '' }}" class="form-control text-white lighttrans" id="home_phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="primary_email"><i class="fas mr-1 fa-envelope"></i>Primary Email</label>
                        <input type="text" name="primary_email" value="{{$userinfo->primary_email != null ? $userinfo->primary_email : '' }}" class="form-control text-white lighttrans" id="primary_email">
                    </div>
                </div>
            </div>
            @if (Auth::user()->admin == 1 && $userinfo->user_id != Auth::user()->id)
                </fieldset>
            @endif
            <br>
            <div class="row ml-1 mt-3">
                <h4>Job Information</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name="job_title" value="{{$userinfo->job_title != null ? $userinfo->job_title : '' }}" class="form-control text-white lighttrans" id="job_title">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="reports_to">Reports To</label>
                        <input type="text" name="reports_to" value="{{$userinfo->reports_to != null ? $userinfo->reports_to : '' }}" class="form-control text-white lighttrans" id="reports_to">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="employment_status">Employment Status</label>
                        <input type="text" name="employment_status" value="{{$userinfo->employment_status != null ? $userinfo->employment_status : '' }}" class="form-control text-white lighttrans" id="employment_status">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hire_date">Hire Date</label>
                        <input type="date" name="hire_date" value="{{$userinfo->hire_date != null ? $userinfo->hire_date : '' }}" class="form-control lighttrans text-white" id="hire_date">
                    </div>
                </div>
            </div>
            <br>
            <div class="row ml-1 mt-3">
                <h4>Compensation</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pay_rate">Pay Rate</label>
                        <input type="text" name="pay_rate" value="{{$userinfo->pay_rate != null ? $userinfo->pay_rate : '' }}" class="form-control text-white lighttrans" id="pay_rate">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="currency-select">Currency</label>
                        <select id="currency-select" name="currency" value="{{$userinfo->currency != null ? $userinfo->currency : '' }}" class="form-control bfh-currencies text-white lighttrans" data-currency="{{$userinfo->currency}}" data-flags="true">
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="per">per</label>
                        <select id="per" name="per" class="form-control text-white lighttrans">
                            <option selected>-- select --</option>
                            <option @if($userinfo->per == 'Hour') selected @endif>Hour</option>
                            <option @if($userinfo->per == 'Day') selected @endif>Day</option>
                            <option @if($userinfo->per == 'Week') selected @endif>Week</option>
                            <option @if($userinfo->per == 'Month') selected @endif>Month</option>
                            <option @if($userinfo->per == 'Quarter') selected @endif>Quarter</option>
                            <option @if($userinfo->per == 'Year') selected @endif>Year</option>   
                            <option @if($userinfo->per == 'Pay Period') selected @endif>Pay Period</option>
                            <option @if($userinfo->per == 'Piece') selected @endif>Piece</option>                        
                        </select>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pay_type">Pay Type</label>
                        <select id="pay_type" name="pay_type" class="form-control text-white lighttrans">
                            <option>-- select --</option>
                            <option value="Salary" @if($userinfo->pay_type == 'Salary') selected @endif>Salary</option>
                            <option value="Hourly" @if($userinfo->pay_type == 'Hourly') selected @endif>Hourly</option>
                            <option value="Contract" @if($userinfo->pay_type == 'Contract') selected @endif>Contract</option>
                            <option value="Commision" @if($userinfo->pay_type == 'Commision') selected @endif>Commission</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-lg pr-5 pl-5 btn-outline-success">Save</button>
            </div>


            

    </div>
</div>

<script>
$('.custom-file-input').on('change', function() {
let fileName = $(this).val().split('\\').pop();
$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

</script>


@endsection