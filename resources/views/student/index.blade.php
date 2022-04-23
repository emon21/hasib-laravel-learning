@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('inc_file/side_bar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-3">Student All Information</h3>
                        <a href="{{ url('student/create') }}" class="btn btn-outline-warning float-right mt-1"
                            style="margin-top:-42px;font-size:16px;">Add Student +</a>
                    </div>
                    <div class="card-body">
                        <h2>Student List :) {{ $student->count() }}</h2>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Student Name</th>
                                    <th>Slug</th>
                                    <th>Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Student Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $list)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $list->student_name }}</td>
                                        <td>{{ $list->slug }}</td>
                                        <td>{{ $list->student_email }}</td>
                                        <td>{{ $list->student_phone }}</td>
                                        <td>
                                            <img src="{{ asset('storage/student') }}/{{ $list->student_picture }}"
                                                alt="" width="120" height="90">
                                        </td>
                                        <td>
                                            <a href="{{ url('/student/edit', $list->slug) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('student/delete', $list->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are You Sure You Want To Delete This Item Y/N ?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
