<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-container label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            text-align: left;
            color: #444;
        }

        .login-container input {
            width: 93%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        .login-container input:focus {
            border-color: #667eea;
            outline: none;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #5563d6;
        }

        .login-container .extra-links {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container .extra-links a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.2s;
        }

        .login-container .extra-links a:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email -->
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Nhập email" required autofocus>

            <!-- Password -->
            <label for="password">Mật khẩu</label>
            <input id="password" type="password" name="password" placeholder="Nhập mật khẩu" required>

            <!-- Submit -->
            <button type="submit">Đăng nhập</button>

            <div class="extra-links">
                <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
            </div>
        </form>
    </div>
</body>
</html>
