@extends('layout')
@section('content')

<h3> Students List </h3>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a class="btn btn-success mb-3" href="{{ route('students.create') }}">Add Student</a>

<div class="table-wrapper">
<table class="fl-table">
<thead>
    <tr>
        <th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Section</th>
        <th>Image</th><th>Show</th><th>Update</th><th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->section }}</td>
        <td><img src="{{ asset('image/' . $student->image) }}" width="96" height="96" /></td>
        <td><a class="btn btn-info" href="{{ route('students.show', $student->id) }}"> Show </a></td>
        <td><a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}"> Edit </a></td>
        <td>
            <form method="POST" action="{{ route('students.destroy', $student->id) }}"
                  onsubmit="return confirm('Delete this student?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> Delete </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>

@endsection