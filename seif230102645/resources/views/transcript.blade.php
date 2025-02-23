<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Transcript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Student Transcript</h1>

    <div class="card">
        <div class="card-body">
            <h4>Student Information</h4>
            <p><strong>Name:</strong> {{ $student['name'] }}</p>
            <p><strong>ID:</strong> {{ $student['id'] }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h4>Courses & Grades</h4>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Course</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course['name'] }}</td>
                            <td>{{ $course['grade'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (empty($courses))
                <p class="text-center text-muted">No courses available.</p>
            @endif
        </div>
    </div>

</div>

</body>
</html>
