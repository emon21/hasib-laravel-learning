@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc_file/side_bar')
        <div class="col-md-9">
            {{--  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror  --}}

{{--  @if(session('success'))
{{ $success }}
@endif  --}}

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{--  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif  --}}


{{--  @if($errors->any())
@foreach ($errors->all() as $error)
<div class="text-danger">{{ $error }}</div>
@endforeach
@endif  --}}

{{--  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  --}}
            <div class="card">
                    <div class="card-body">
                        <form action="{{ url('student/update') }}" method="post">
                            @csrf
                            <input type="text" name="student" value="{{ $student->id }}">
                            <div class="form-group mt-2">
                              <label>Student Name:</label>
                              <input type="text" class="form-control mt-1" placeholder="Enter Student Name" name="student_name" value="{{ $student->student_name }}">

                            </div>
                            <div class="form-group  mt-2">
                                <label>Student Email:</label>
                                <input type="text" class="form-control mt-1 @error('student_email') is-invalid @enderror" placeholder="Enter Student Email" name="student_email" value="{{ $student->student_email }}">
                                @error('student_email')
                                    <div class="mt-2 p-2 alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group  mt-2">
                                <label>Student Phone:</label>
                            <input type="text" class="form-control mt-1 @error('student_phone') is-invalid @enderror" placeholder="Enter Student Phone" name="student_phone" value="{{ $student->student_phone }}">
                                @error('student_phone')
                                    <div class="mt-2 p-2 alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            <button type="submit" class="btn btn-success mt-2">Update Student</button>
                          </form>
                    </div>

                </div>
            </div>

    </div>
</div>
@endsection
