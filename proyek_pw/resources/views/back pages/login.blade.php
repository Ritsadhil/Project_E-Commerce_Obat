 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedStore - Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://i.imgur.com/EXp2bCQ.png');
            background-size: cover;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: #3eb0b4;
            width: 450px;
            padding: 40px 50px;
            border-radius: 25px;
            box-shadow: 0px 5px 12px rgba(0,0,0,0.15);
            text-align: center;
            color: #fff;
        }

        h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
        }

        h2 {
            margin-top: 5px;
            font-size: 22px;
            font-weight: bold;
        }

        .form-group {
            text-align: left;
            margin-top: 30px;
        }

        label {
            font-weight: bold;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 10px 0;
            background: transparent;
            border: none;
            border-bottom: 2px solid rgba(255,255,255,0.6);
            color: #fff;
            outline: none;
            font-size: 16px;
            margin-bottom: 25px;
        }

        input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .btn-login {
            width: 80%;
            padding: 12px;
            background: #2e6d72;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-login:hover {
            opacity: 0.9;
        }

        .register-text {
            margin-top: 25px;
            font-size: 16px;
            color: #fff;
        }

        .register-text a {
            color: #3419ff;
            font-weight: bold;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h1>MedStore</h1>
        <h2>LOGIN</h2>

        <form>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="Masukkan password">
            </div>

            <button class="btn-login">LOGIN</button>
        </form>

        <p class="register-text">
            Belum punya akun? <a href="#">Daftar Disini!</a>
        </p>
    </div>
</body>
</html>