<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, {{ auth()->user()->name }}</h2>
    <p>Role: {{ auth()->user()->role }}</p>
    <p>Credit: ${{ auth()->user()->account_credit }}</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
