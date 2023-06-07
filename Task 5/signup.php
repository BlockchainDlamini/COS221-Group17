<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" media="(prefers-color-scheme: dark)" href="img/favicon-dark/favicon-dark.ico">
    <link rel="icon" media="(prefers-color-scheme: light)" href="img/favicon-light/favicon-light.ico">
</head>
<body>

<form action='validate-signup.php' method='post'>
    <div class="first">

        <div class="second">

            <div class="top">

    <header>Signup</header>


            </div>

        <div class="inputfield">

        <input type = "text" name="inputfirstname" id = "inputfirstname" placeholder="Firstname" class = "input">
        <i class='bx bx-user' ></i>
    <label></label>
    <input type = "text" name="inputsurname" id = "inputsurname" placeholder="Surname" class = "input">
    <i class='bx bx-user' ></i>


    <label></label>
    <input id = "inputemail" name="inputemail" placeholder="Email" class = "input" type = "email">
    <i class='bx bx-mail-send' ></i>
    <label></label>
    <input id = "inputpassword" name="inputpassword" placeholder="Password" type = "Password" class = "input">
    <i class='bx bx-lock-alt' ></i>

   

    <label></label>
    <input id = "inputphonenumber" name="inputphonenumber" placeholder="Telephone Number" class = "input" type= "text">
    <i class='bx bx-phone' ></i>
    <label></label>
    <input id = "inputstreetaddress" name="inputstreetaddress" placeholder="Address" class = "input">
    <i class='bx bx-building-house' ></i>

    <label></label>
    <input type = "text" id = "inputpostalcode" name="inputpostalcode" placeholder="Postal Code" class = "input" type = "number">  
    <i class='bx bx-dialpad' ></i>


        <div class="selectcontainer">
        <select id = "inputprovice" class = "selector" name="inputprovice">
        <option>Gauteng</option>
        <option>Eastern Cape</option>
        <option>Western Cape</option>
        <option>Free State</option>
        <option>Mpumalanga</option>
        <option>Kwazulu-Natal</option>
        <option>Limpopo</option>
        <option>North West</option>
        <option>Northern Cape</option>
    </select>
        <div class="iconcontainer"> 
            <i class = "caret"></i>
        </div>
    
    <div class="iconcontainer">
            <i class = "caret"></i>
        </div>
        </div>
    
    <label></label>
   
    <br>

    <button id = "btnsignup" class = "submit" >Signup</button>
    <br>
    <br>
    <a href = "login.php">Already a user? Login here!</a>


        </div>

    </div>


            
        </div>
   

    
</form>

</body>
</html>