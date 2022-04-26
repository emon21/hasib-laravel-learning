
@extends('layouts.app')
{{-- Image upload and Preview --}}
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc_file/side_bar')
        <div class="col-md-9">


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


            <div class="card">
                    <div class="card-body">
                        <form action="{{ url('student/insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-2">
                              <label>Student Name:</label>
                              <input type="text" class="form-control mt-1 @error('student_name') is-invalid @enderror" placeholder="Enter Student Name" name="student_name" value="{{ old('student_name') }}">
                                @error('student_name')
                                    <div class="mt-2 p-2 alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="form-group  mt-2">
                                    <label>Student Email:</label>
                                    <input type="text" class="form-control mt-1 @error('student_email') is-invalid @enderror" placeholder="Enter Student Email" name="student_email" value="{{ old('student_email') }}">
                                    @error('student_email')
                                        <div class="mt-2 p-2 alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                <div class="form-group  mt-2">
                                    <label>Student Phone:</label>
                                    <input type="text" class="form-control mt-1 @error('student_phone') is-invalid @enderror" placeholder="Enter Student Phone" name="student_phone" value="{{ old('student_phone') }}">
                                    @error('student_phone')
                                        <div class="mt-2 p-2 alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-4  mt-2">
                                    <label>Student Picture:</label>
                                    <input type="file" class="form-control mt-1 @error('student_picture') is-invalid @enderror dropify" name="student_picture[]" multiple  data-default-file="">
                                </div>
                            <button type="submit" class="btn btn-success mt-2">Add Student</button>
                          </form>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection
{{-- Image upload and Preview --}}
<script  src="{{ asset('backend') }}/https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  src="{{ asset('backend') }}/{{asset('dropify/dist/js/dropify.min.js')}}"></script>

<script>

$(document).ready(function(){
    // Basic

    $('.dropify').dropify({
        messages: {
            'default': 'Add a Picture',
            'replace': 'New picture',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

});
</script>
