@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">

                    <div class="card-body">
                    <h2 class="text-center"><p>Welcome To Admin Dashboard</p>
                        <a href="{{ url('student') }}" class="btn btn-success float-center mt-2">Student Panel</a>
                    </h2>

                    </div>

                </div>
            </div>

    </div>
</div>
@endsection
