<form id="gpa-form">
    @foreach($courses as $course)
        <div class="form-group">
            <label>{{ $course->course_title }}</label>
            <input type="number" name="grades[]" class="form-control" min="0" max="100">
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Calculate GPA</button>
</form>
<div id="gpa-result"></div>

<script>
    document.getElementById('gpa-form').addEventListener('submit', function (e) {
        e.preventDefault();
        // Calculate GPA logic here
    });
</script>