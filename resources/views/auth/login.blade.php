<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR Admin Login</title>
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            width: 100%;
            max-width: 400px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #fff;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #4facfe;
            background-image: linear-gradient(to right, #00f2fe, #4facfe);
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-image: linear-gradient(to right, #43e97b, #38f9d7);
        }

        .error {
            background: rgba(255, 0, 0, 0.3);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>HR Management System</h2>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter email" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
