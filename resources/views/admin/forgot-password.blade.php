<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password - CyberHub</title>
  <link rel="icon" href="{{ asset('img/ch-logo.png') }}" type="image/png" />
    @vite('public/icons/font/bootstrap-icons.css')
    @vite('resources/css/bootstrap.min.css')
  <style>
    body {
      background: url('../img/bg3.png') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.5);
      z-index: -1;
    }

    .forgot-password-container {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      padding: 40px;
      text-align: center;
      max-width: 400px;
      width: 100%;
    }

    .back-button {
      display: block;
      margin-bottom: 15px;
      text-decoration: none;
      color: #0d6efd;
    }
  </style>
</head>
<body>
  <div class="forgot-password-container">
    <h2>Forgot Password?</h2>
    <p>Enter your email address below and we'll send you a link to reset your password.</p>
    <form>
      <input type="email" class="form-control mb-3" placeholder="Enter your email" required />
      <button type="submit" class="btn btn-primary w-100">Reset Password</button>
    </form>
    <a href="login.php" class="back-button">Back to Login</a>
  </div>
  @vite('resources/js/bootstrap.bundle.min.js')
</body>
</html>
