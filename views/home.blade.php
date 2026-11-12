@extends('layout')
@section('content')
<table border="0" style="width:800px; margin:50px;">
    <tr>
        <td><img src="{{ asset('img/student.jpg') }}" width="175" height="175"></td>
        <td><img src="{{ asset('img/teacher.png') }}" width="175" height="175"></td>
    </tr>
    <tr>
        <td><img src="{{ asset('img/library.png') }}" width="175" height="175"></td>
        <td><img src="{{ asset('img/administrator.png') }}" width="175" height="175"></td>
    </tr>
</table>
@endsection