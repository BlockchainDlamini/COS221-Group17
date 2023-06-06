<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" media="(prefers-color-scheme: dark)" href="img/favicon-dark/favicon-dark.ico">
    <link rel="icon" media="(prefers-color-scheme: light)" href="img/favicon-light/favicon-light.ico">
    
    <title>Login</title>

    <body>
        <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error == "incorrect username or password") {
                    echo "<script>alert('Incorrect username or password');</script>";
                }
            }
        ?>
        <form onsubmit='return validateForm()' action='validate-login.php' method='post'>
        <div class="first">
            <div class="second">
                <div class="top">
                    <header>GWS Login</header>
                </div>

                <div class="inputfield">
                    <input type="text" class="input" placeholder="Username" id="email" name='email' required>
                    <i class='bx bx-user' ></i>
                </div>

                <div class="inputfield">
                    <input type="Password" class="input" placeholder="Password" id="password" name='password' required>
                    <i class='bx bx-lock-alt'></i>
                </div>

                <div class="inputfield">
                    <input type="submit" class="submit" value="Login" id="">
                    <br>
                    <br>
                    <a href = "signup.php">Don't have an account? Signup here!</a>
                </div>
            </div>
        </div>  
        </form>

    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

            if (!emailRegex.test(email) || email === '') { 
                alert("Invalid email address.");
                return false;
            }
            return true; 
        }
    </script>
</body>


