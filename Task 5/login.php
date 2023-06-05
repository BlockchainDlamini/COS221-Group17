<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
    <body>
        <form onsubmit='return validateForm()' action='validate-login.php' method='post'>
            <input type="email" id="inputemail" name="email" required>
            <label for="inputemail">Email</label>
            <input type="password" id="inputpassword" name="password" required>
            <label for="password">Password</label>
            <input id="btnlogin" type="submit" value="Login">
        </form>
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
    </body>
</html>