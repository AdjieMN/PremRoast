@extends('master.dashboard')
@section('content')
   
            <h1>Silahkan Login</h1>
            <hr>
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <form action="{{ url('/loginPost') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password"></input>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Login</button>
                    <a href="{{url('register')}}" class="btn btn-md btn-warning">Register</a>
                </div>
            </form>

@endsection