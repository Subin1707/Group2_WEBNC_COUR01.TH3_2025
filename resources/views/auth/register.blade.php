<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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

        .register-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            width: 380px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .register-container label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            text-align: left;
            color: #444;
        }

        .register-container input {
            width: 93%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        .register-container input:focus {
            border-color: #43cea2;
            outline: none;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            background: #43cea2;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .register-container button:hover {
            background: #36a68c;
        }

        .register-container .extra-links {
            margin-top: 15px;
            font-size: 14px;
        }

        .register-container .extra-links a {
            color: #185a9d;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-container .extra-links a:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Đăng ký</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <label for="name">Họ và tên</label>
            <input id="name" type="text" name="name" placeholder="Nhập họ và tên" required autofocus>

            <!-- Email -->
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Nhập email" required>

            <!-- Password -->
            <label for="password">Mật khẩu</label>
            <input id="password" type="password" name="password" placeholder="Nhập mật khẩu" required>

            <!-- Confirm Password -->
            <label for="password_confirmation">Xác nhận mật khẩu</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>

            <!-- Submit -->
            <button type="submit">Đăng ký</button>

            <div class="extra-links">
                <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
            </div>
        </form>
    </div>
</body>
</html>
