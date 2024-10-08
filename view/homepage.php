<?php
require 'config/config.php';
$redirectUri = urlencode('http://localhost:3000/google');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="/styles/login.css">
    <link rel="icon" href="/icons/Main Logo.svg">
    <title>WELCOME to NextBid</title>
</head>

<body>
    <header>
        <!-- Login form -->
        <div id="login-form" class="form-container form-login container animate__animated">
            <h2>Login</h2>

            <form id="contact-form" action="login" method="post" class="contact-form">
                <label class="one-label" for="email">Email*</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" required>
                <label class="one-label" for="name">Password*</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="⁕⁕⁕⁕⁕⁕⁕⁕⁕⁕⁕" required>
                <div class="Reset-Password">
                    <a class="reset-psw" href="#" id="forgot-password-link">Forgot password?</a>
                </div>

                <label class="checkbox-label" for="remember">Remember Me</label>
                <input type="checkbox" name="remember" id="remember">

                <button type="submit" class="btn" name="sign">Sign In</button>
                <?php if (isset($errorMessage)) : ?>
                    <p><?php echo $errorMessage; ?></p>
                <?php endif; ?>

                <div class="login-method">
                    <div class="login-method-divider">
                        <div class="login-method-divider-line"></div>
                        <div class="login-method-divider-text">or Sign In with</div>
                        <div class="login-method-divider-line"></div>
                    </div>
                    <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email%20profile&access_type=online&include_granted_scopes=true&response_type=code&state=state_parameter_passthrough_value&redirect_uri=<?= $redirectUri ?>&client_id=<?= GOOGLE_ID ?>">
                        <button class="login-method-btn" type="button">
                            <img src="icons/logos_google-icon.svg" alt="">Google
                        </button>
                    </a>
                    <button class="login-method-btn" type="button"><img src="icons/logos_facebook.svg" alt="">Facebook</button>
                </div>

            </form>

            <br>
            <div class="switch-button">
                <p>If you don't have an account &nbsp;</p>
                <button id="register-btn">Create one</button>
            </div>
        </div>

        <!-- Register form -->
        <div id="register-form" class="form-container form-login container animate__animated">
            <h2>Sign Up</h2>

            <form id="contact-form" method="post" class="contact-form" action="sign">
                <label class="one-label" for="name">Full Name*</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="the end" required>
                <label class="one-label" for="email">Email*</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" required>
                <label class="one-label" for="name">Password*</label>
                <input type="password" name="password" class="form-control psw" id="password" placeholder="⁕⁕⁕⁕⁕⁕⁕⁕⁕⁕⁕" required>
                <div class="policy">
                    <input class="checkbox" type="checkbox" required>
                    <p>I accept all <a href="#">terms</a> & <a href="#">condition</a></p>
                </div>
                <button type="submit" class="btn" name="register">Create Account</button>
            </form>
            <div class="switch-button-1">
                <p>Already Signed Up? &nbsp;</p>
                <button id="login-btn">Login now</button>
            </div>
        </div>

        <div id="forgot-password" class="form-container form-login container animate__animated">
            <h2>Reset Password</h2>
            <p>Enter your email address associated with your account. We'll send you a link to reset your password</p>

            <form id="contact-form" method="get" class="contact-form" action="forget">
                <label class="one-label" for="name">Full name*</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="jhonling@forget.com">
                <button type="submit" class="btn" name="submit">Submit</button>
                <!-- <a href="#" type="submit" class="btn">Create account</a> -->
                <button id="back-to-login-btn" type="button" class="btn-1">Back to Login</button>
            </form>
        </div>
        <div class="guest">
            <a href="/guest">
                <p>Continue as a Guest</p>
            </a>
        </div>
    </header>
    <script src="/js/login.js"></script>
</body>

</html>