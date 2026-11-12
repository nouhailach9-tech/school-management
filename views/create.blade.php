@extends('layout')
@section('content')

<h3> Add Student </h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
@csrf

<div class="form-group mb-3">
    <label for="name">Name: </label>
    <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" />
</div>

<div class="form-group mb-3">
    <label for="student_email">Email: </label>
    <input type="text" id="student_email" class="form-control" name="email" value="{{ old('email') }}" />
</div>

<div class="form-group mb-3">
    <label for="phone">Phone: </label>
    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}" />
</div>

<div class="form-group mb-3">
    <label for="section">Section: </label>
    <input type="text" id="section" class="form-control" name="section" value="{{ old('section') }}" />
</div>

<div class="form-group mb-3">
    <label for="image">Image: </label>
    <input type="file" id="image" class="form-control" name="image" />
</div>

<button type="submit" class="btn btn-primary mb-3" style="top:0;"> Add Student </button>
<a class="btn btn-secondary mb-3" style="top:0;" href="{{ route('students.index') }}"> Cancel </a>
</form>

@endsection