<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to Our Application</h1>
    <div class="button-container">
        <a href="{{ route('evennum') }}">Go to EVEN & ODD</a>
        <a href="{{ route('multiplication') }}">Go to Multiplication</a>
        <a href="{{ route('prime') }}">Go to Prime</a>
    </div>
</body>
</html>