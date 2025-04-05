<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>Your Role: {{ Auth::user()->role }}</p>
    <p>Your Credit: ${{ Auth::user()->credit }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
