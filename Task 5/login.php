
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Login</title>

</head>
<body>
<form onsubmit='return validateForm()' action='validate-login.php' method='post'>
   <div class="first">
    <div class="second">

        <div class="top">
        
            
            <header>GWS Login</header>
        </div>

        <div class="inputfield">
            <input type="text" class="input" placeholder="Username" id="">
            <i class='bx bx-user' ></i>
        </div>

        <div class="inputfield">
            <input type="Password" class="input" placeholder="Password" id="">
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
</body>
<script>
        function validateForm() {
            var email = document.getElementById("inputemail").value;
            var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

            if (!emailRegex.test(email)) { 
                alert("Invalid email address.");
                return false;
            }
            return true; 
        }
</script>
