<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        .container {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #fff;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #e0e0e0;
        }
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .button-container a {
            display: inline-block;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: background 0.3s, transform 0.3s;
            font-size: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .button-container a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Application</h1>
        <p>Explore the functionalities below:</p>
        <div class="button-container">
            <a href="{{ route('evennum') }}">Even & Odd</a>
            <a href="{{ route('multiplication') }}">Multiplication</a>
            <a href="{{ route('prime') }}">Prime Numbers</a>
            <a href="{{ route('minitest') }}">Mini Test</a>
            <a href="{{ route('transcript') }}">Transcript</a>
            <a href="{{ route('products_list') }}">Product List</a>
            <a href="{{ route('products_add') }}">Add Product</a>
        </div>
    </div>
</body>
</html>