<!DOCTYPE html>
<html lang="en">
<head>
    <br>
    <title>Signup</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<form action='validate-signup.php' method='post'>
    <div class="first">

        <div class="second">

            <div class="top">

    <header>Signup</header>


            </div>

        <div class="inputfield">

        <input type = "text" id = "inputfirstname" placeholder="Firstname" class = "input">
        <i class='bx bx-user' ></i>
    <label></label>
    <input type = "text" id = "inputsurname" placeholder="Surname" class = "input">
    <i class='bx bx-user' ></i>


    <label></label>
    <input id = "inputemail" placeholder="Email" class = "input" type = "email">
    <i class='bx bx-mail-send' ></i>
    <label></label>
    <input id = "inputpassword" placeholder="Password" type = "Password" class = "input">
    <i class='bx bx-lock-alt' ></i>

   

    <label></label>
    <input id = "inputphonenumber" placeholder="Telephone Number" class = "input" type= "text">
    <i class='bx bx-phone' ></i>
    <label></label>
    <input id = "inputstreetaddress" placeholder="Address" class = "input">
    <i class='bx bx-building-house' ></i>

    <label></label>
    <input type = "text" id = "inputpostalcode" placeholder="Postal Code" class = "input" type = "number">  
    <i class='bx bx-dialpad' ></i>


        <div class="selectcontainer">
        <select id = "inputprovice" class = "selector">
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