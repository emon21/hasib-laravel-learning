@extends('layouts.app')

<!-- Styles -->
{{--  <link href="{{ asset('public\dropify\dist\css\dropify.css') }}" rel="stylesheet">  --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                    <div class="card-body">
                    <h2 class="text-center"><p>Welcome To Admin Dashboard</p>
                        <a href="{{ route('student') }}" class="btn btn-success float-center mt-2">Student Panel</a>
                    </h2>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
{{--  <script  src="{{ asset('backend') }}/{{ asset('public/dropify/dist/js/dropify.js') }}"></script>  --}}

