@extends('layouts.app2')

@section('content')
        <div class="mt-5 row justify-content-center ">
            <div class="col-sm-3">
                <div class="mine card  ml-5 h-100" style="border-radius: 5px; box-shadow: 1px 1px 10px 3px #9e9d9e;">
                    <img class="card-img-top img-fluid" src="images/create.jpg" alt="Card image cap">
                    <div class="card-body text-center p-5">
                        <h3 class="card-title font-weight-bold text-center">Do you own a business?</h3>
                        <br>
                        <a href="/createcompany" class="btn btn-outline-success">Register your business</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mine card mr-5 h-100" style="border-radius: 5px; box-shadow: 1px 1px 10px 3px #9e9d9e;">
                    <img class="card-img-top img-fluid" src="images/join.jpg" alt="Card image cap">
                    <div class="card-body text-center p-5">
                        <h3 class="card-title font-weight-bold text-center">Is your team already using our site?</h3>
                        <br>
                        <a href="/joincompany" class="btn btn-outline-success">Join your team</a>
                    </div>
                </div>
            </div>
        </div>
@endsection

