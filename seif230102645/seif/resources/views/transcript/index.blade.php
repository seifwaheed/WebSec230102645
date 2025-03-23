@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Transcript</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transcript as $record)
            <tr>
                <td>{{ $record->course }}</td>
                <td>{{ $record->grade }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
