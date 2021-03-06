@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="text-center pb-2">Total Picture : {{ $studentfiles->count() }}</h4>
        <div class="row justify-content-center">
            {{-- <h2>{{ $studentlist->id }}</h2> --}}
            {{-- @foreach ($studentlist as $list)
    <div class="col-sm-4">
        <img  src="{{ asset('backend') }}/{{ asset('storage/student') }}/{{ $list->student_img }}" alt="Los Angeles" width="750" height="400">
    </div>
    @endforeach --}}

            {{-- {{ $student->student_name }} --}}
            {{-- Student List :{{ $list->student_img }} --}}

            @foreach ($student as $list)
                <div class="col-sm-4 mb-4">
                    <div class="card shadow-sm ">
                        {{-- <img src="{{ asset('backend') }}/{{ asset('storage/student/' . $list->student_img) }}/{{ $list->student_img }}"
                            alt="Los Angeles" width="" height="350"> --}}
                        <div class="card-body text-center">
                            <p class="card-text">{{ $list->student_name }} of Picture :
                                {{ $list->studentfiles_count }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ url('/student/more', $list->slug) }}"
                                    class="btn btn-sm btn-success d-block mx-auto">
                                    See Here</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @foreach ($list->studentfiles as $value) --}}
                {{-- @foreach ($list->studentfiles as $value)
                        <div class="col-sm-4 mb-4">
                            <div class="card shadow-sm ">
                                <img  src="{{ asset('backend') }}/{{ asset('storage/student/'.$list->student_name) }}/{{ $value->student_img }}" alt="Los Angeles" width="" height="350">
                                <div class="card-body">
                                    <p class="card-text">{{ $list->student_name }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach --}}
                {{-- @endforeach --}}
            @endforeach
        </div>
    </div>
    {{-- {{ $list->student_id }}
<img  src="{{ asset('backend') }}/{{ asset('storage/student') }}/{{ $list->student_img }}" alt="Los Angeles" width="1100" height="500"> --}}
@endsection
