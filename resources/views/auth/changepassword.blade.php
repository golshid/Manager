@extends('layouts.app')

@section('content')
<div class="container col-6">
            <div class="card py-5  card-body text-white wholecard1"
                style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
                <div class="card-body ">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 text-md-center col-form-label">Current Password</label>

                            <div class="col-md-8">
                                <input id="current-password" type="password" class="bg-transparent text-white form-control"
                                    name="current-password" required>

                                @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 text-md-center col-form-label">New Password</label>

                            <div class="col-md-8">
                                <input id="new-password" type="password" class="bg-transparent text-white form-control" name="new-password"
                                    required>

                                @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="new-password-confirm" class="col-md-4 text-md-center col-form-label">Confirm New
                                Password</label>

                            <div class="col-md-8">
                                <input id="new-password-confirm" type="password" class="bg-transparent text-white form-control"
                                    name="new-password_confirmation" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-success">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection