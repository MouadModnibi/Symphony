<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | symphonie</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        body {
            background-color: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                              url('https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .login-container {
            background-color: rgba(0, 5, 20, 0.8);
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 32px rgba(7, 29, 103, 0.2);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(90deg, #18048a47, #1E90FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #0b32e1;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #aaa;
        }
        
        .input-group input {
            width: 100%;
            padding: 14px;
            background-color: #111;
            border: 1px solid #333;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #1E90FF;
            box-shadow: 0 0 0 2px rgba(30, 144, 255, 0.3);
        }
        
        button {
            width: 100%;
            padding: 14px;
            background-color: #1E90FF;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s;
        }
        
        button:hover {
            background-color: #187bcd;
            transform: scale(1.02);
        }
        
        .options {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 13px;
        }
        
        .options a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .options a:hover {
            color: #1E90FF;
            text-decoration: underline;
        }
        
        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #555;
            font-size: 12px;
        }
        
        .divider::before, .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #333;
        }
        
        .divider::before {
            left: 0;
        }
        
        .divider::after {
            right: 0;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #111;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            background-color: #1E90FF;
            transform: scale(1.1);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>symphonie</h1>
        </div>
        
        <h2>Se connecter à votre compte</h2>
        
        <form action="/login" method="POST">
            <div class="input-group">
                <label for="username">Adresse email ou nom d'utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="options">
                <label>
                    <input type="checkbox" name="remember" style="margin-right: 5px;"> Se souvenir de moi
                </label>
                <a href="#">Mot de passe oublié ?</a>
            </div>
            
            <button type="submit">SE CONNECTER</button>
            
            <div class="divider">OU</div>
            
            <div class="social-login">
                <div class="social-btn">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="social-btn">
                    <i class="fab fa-google"></i>
                </div>
                <div class="social-btn">
                    <i class="fab fa-apple"></i>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 30px; color: #aaa; font-size: 14px;">
                Pas de compte ? <a href="#" style="color: #1E90FF; text-decoration: none; font-weight: 600;">S'inscrire</a>
            </p>
        </form>
    </div>
</body>
</html>