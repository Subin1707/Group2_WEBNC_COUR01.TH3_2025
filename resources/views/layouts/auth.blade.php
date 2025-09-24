<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 380px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
        }
        .auth-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .auth-container input {
            width: 93%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s;
        }
        .auth-container input:focus {
            border-color: #43cea2;
            outline: none;
        }
        .auth-container button {
            width: 100%;
            padding: 12px;
            background: #185a9d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        .auth-container button:hover {
            background: #12497d;
        }
        .extra-links {
            margin-top: 15px;
            font-size: 14px;
        }
        .extra-links a {
            color: #43cea2;
            text-decoration: none;
        }
        .extra-links a:hover {
            color: #185a9d;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>
</html>
