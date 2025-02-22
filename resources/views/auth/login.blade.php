<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CampusHub - Login</title>
    <link rel="icon" href="../img/ch-logo.png" type="image/gif" />
    @vite('resources/css/bootstrap.min.css')
    <link rel="stylesheet" href="../icons/font/bootstrap-icons.css">

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

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
        }

        .login-content {
            padding: 40px;
            flex: 1;
            text-align: center;
            position: relative;
        }

        .login-content img {
            width: 120px;
            margin-bottom: 20px;
        }

        .login-step {
            display: none;
        }

        .login-step.active {
            display: block;
        }

        .btn-option {
            margin: 10px;
            min-width: 150px;
        }

        .login-image {
            flex: 1;
            background: url('../img/bg2.jpeg') no-repeat center center;
            background-size: cover;
            opacity: 0.8;
        }

        .progress-dots span {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            border-radius: 50%;
            display: inline-block;
            background-color: #ccc;
        }

        .progress-dots span.active {
            background-color: #0d6efd;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-content">
            <img src="../img/ch-logo.png" alt="CyberHub Logo" />
            <!--
      <div id="step1" class="login-step active">
        <h2>Sign In as...</h2>
        <button class="btn btn-primary btn-option" onclick="nextStep()"> <i class="bi bi-person-fill"></i> Student</button>
        <button class="btn btn-primary btn-option" onclick="nextStep()"> <i class="bi bi-briefcase-fill"></i> Faculty</button>
        <button class="btn btn-primary btn-option" onclick="nextStep()"> <i class="bi bi-shield-lock-fill"></i> Admin</button>
      </div>
  -->
            <div id="step2" class="login-step active"> <!-- Remove nalang yung 'active' dito kapag need na yung sign in as -->
                <!-- <span class="back-button" onclick="prevStep()"><i class="bi bi-arrow-left"></i></span> -->
                <h2>Welcome to CampusHub!</h2>
                <p>An institution delivering world-class education.</p>
                <form method="POST" action="{{ url('login/admin') }}">
                    @csrf
                    <input type="email" class="form-control mb-3" placeholder="Enter your email" required />
                    <input type="password" class="form-control mb-3" placeholder="Enter your password" required />
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" />
                            <label class="form-check-label" for="remember">Remember</label>
                        </div>
                        <a href="forgot-password.php" class="text-decoration-none">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Log in</button>
                </form>
            </div>
            <div class="progress-dots mt-3">
                <span id="dot1" class="active"></span>
                <span id="dot2"></span>
            </div>
        </div>
        <div class="login-image d-none d-md-block"></div>
    </div>
    <!--
  <script>
    function nextStep() {
      document.getElementById('step1').classList.remove('active');
      document.getElementById('step2').classList.add('active');
      document.getElementById('dot1').classList.remove('active');
      document.getElementById('dot2').classList.add('active');
    }
    function prevStep() {
      document.getElementById('step2').classList.remove('active');
      document.getElementById('step1').classList.add('active');
      document.getElementById('dot2').classList.remove('active');
      document.getElementById('dot1').classList.add('active');
    }
  </script>
-->
    @vite('resources/js/bootstrap.bundle.min.js')
</body>

</html>