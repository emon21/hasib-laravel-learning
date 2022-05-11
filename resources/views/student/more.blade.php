@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-sm-12 bg-secondary p-2">
                <a href="{{ url('student/view/') }}" class="float-right btn btn-success">Back</a>
            </div> --}}

            @foreach ($student as $list)
                <h4 class="">{{ $list->student_name }}</h4>
                @foreach ($list->studentfiles as $value)
                    <div class="col-sm-4 mb-4 pr-0">
                        <div class="card shadow-sm ">
                            <img src="{{ asset('storage/student/' . $list->student_name) }}/{{ $value->student_img }}"
                                alt="Los Angeles" width="" height="350">
                            {{-- <div class="card-body">
                                <p class="card-text text-danger">{{ $list->student_name }}
                                    {{ $list->studentfiles_count }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                    <a href="{{ url('/student/more', $list->slug) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        See
                                        Here</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            @endforeach


        </div>
    </div>
@endsection
