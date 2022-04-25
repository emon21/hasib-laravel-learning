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


<div class="container">
    <h2>Group</h2>
    <p>Al Data</p>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th># Sl</th>
          <th>Group Name</th>
           <th>Student Name</th>
          <th>Phone No</th>
        </tr>
      </thead>
      <tbody>
        {{--  @foreach($group as $data)
            <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $data->student_name }}</td>
            <td>{{ $data->group->group_name }}</td>
            </tr>
        @endforeach  --}}
        @foreach($group as $data)
            <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $data->group_name }}</td>
            <td>{{ $data->studentGroup->student_name }}</td>
            <td>{{ $data->studentGroup->student_phone }}</td>


            </tr>
        @endforeach
      </tbody>
    </table>

    <hr>

    <h2>Student Info</h2>
    <p>Al Data</p>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th># Sl</th>
          <th>Student Name</th>
          <th>Phone No</th>
          <th>Group Name</th>
        </tr>
      </thead>
      <tbody>
        {{--  @foreach($group as $data)
            <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $data->student_name }}</td>
            <td>{{ $data->group->group_name }}</td>
            </tr>
        @endforeach  --}}
        @foreach($studentgroup as $data)
            <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $data->student_name }}</td>
            <td>{{ $data->student_phone }}</td>
            <td>{{ $data->group->group_name }}</td>
            >


            </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
