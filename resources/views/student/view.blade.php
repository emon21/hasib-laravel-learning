@extends('layouts.app')

@section('content')




      <div class="container">
<div class="row justify-content-center">
    {{--  <h2>{{ $studentlist->id }}</h2>  --}}
    {{--  @foreach ($studentlist as $list)
    <div class="col-sm-4">
        <img src="{{ asset('storage/student') }}/{{ $list->student_img }}" alt="Los Angeles" width="750" height="400">
    </div>
    @endforeach  --}}
    @foreach ($studentlist as $list)
    {{--  Student List :{{ $list->studentfiles }}  --}}
        @foreach ($list->studentfiles as $value)

       {{--  Student Value :  {{ $value->student_img }}  --}}

    <div class="col-sm-4 mb-4">
        <div class="card shadow-sm ">
            <img src="{{ asset('storage/student') }}/{{ $value->student_img }}" alt="Los Angeles" width="" height="350">
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
      @endforeach

      @endforeach
</div>
</div>
{{--  {{ $list->student_id }}
<img src="{{ asset('storage/student') }}/{{ $list->student_img }}" alt="Los Angeles" width="1100" height="500">  --}}


@endsection
