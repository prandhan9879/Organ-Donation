
<?php

    $user='root';
    $pass='user';
    $db=new mysqli('localhost',$user,'','hospital') or die("unable to connect");
    if($db->connect_error){
        die("connection failed".$db->connect_error);
    }
    // else{
        // echo"connection successfully";
    // }
 ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <style>
            body{
    background-image: url('bg1.jpeg');	
    background-size: cover;
    
}
input, textarea{
    background: transparent;
    border:1px solid rgb(255, 255, 255);
    color: white;
}
#form{

    background-color: rgb(152, 149, 149); */
    border: 1px solid rgb(237, 231, 231);
    
    width: fit-content;
    padding: 20px;
    border-radius: 5px;
    margin: auto;
    
    
    
}



#reg_title{
    text-align: center;  
    color: rgb(34, 107, 176) 
}

#logo{
    max-height: 70px;
    max-width: 70px;
    position:absolute;
    top: 5px;
    left: 5px;
}
#account_exist_button{
    text-decoration: none;
    color: black;
    background-color: whitesmoke;
    border: 1px solid black;
    padding: 1px;
    display: flex;
    width: fit-content;
    margin: auto;
    /* margin: auto;
    align-items: center;
    justify-items: center; */
}
button{
    width: fit-content;
    display: block;
    margin: auto;
}
.main-header {
    background-color: #333;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    }
    nav ul {
     list-style: none;
     display: flex;
   }
 
  nav ul li {
    margin-right: 20px;
 }
  nav ul li:last-child {
    margin-right: 0;
  }

  nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
  }

           
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="account/account.css" rel="stylesheet"> -->
    </head>
    <body>
    <header class="main-header">
            <h2>RENEW LIFE</h2>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="register.php">Donor</a></li>
                    <li><a href="patient.php">Patient</a></li>
                    <li><a href="login_page.php">Log In</a></li>
                    <li><a href="create_account.php">SignUp</a></li>
                </ul>
            </nav>
        </header>
    <div>
        <h1 id='reg_title'>Create Account</h1>
    </div>
    
    <br>
    <br>
        <form id="form" method="post">
            <label for firstname>FirstName : </label>
            <input type="text" id=firstname name=firstname minlength="6" required><br><br>

            <label for lastname>LastName : </label>
            <input type="text" id=lastname name=lastname required><br><br>

            <label for email>E-mail Address : </label>
            <input type="mail" id=email name=email placeholder="abc@gmail.com" required><br><br>

            <label for passwrd>Password : </label>
            <input type="password" name=password id="passwrd" minlength="6" required><br><br>

            <label for address>Address : </label>
            <textarea rows="4" cols="30" name=address required id="address"></textarea><br><br>

            <label for ph>Phone NO. : </label>
            <input type="number" minlength="10" maxlength="10" name=phno  required><br><br>

            <p>Gender<input type="radio" name="gender" value="Male" id="male">
            <label for male>Male </label>
            <input type="radio" name="gender" value="Female" id="Female">
            <label for male>Female </label><p><br>

            <button type="submit" name='submit'>Create Account</button>
            <button onclick="reset()"> reset</button><br>
            <a id='account_exist_button'href="login_page.php">Already have Account</a>
            </form>
<?php
if(array_key_exists('submit', $_POST)) 
{
    
    $valid=1;
    $firstname=$_REQUEST['firstname'];
    $lastname=$_REQUEST['lastname'];
    $email=$_REQUEST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Enter valid email id')</script>";
        $valid=0;
    }

    $password=$_REQUEST['password'];
    $address=$_REQUEST['address'];
    $phno=$_REQUEST['phno'];
    
    if(!(strlen((string)$phno)==10)){
 
        echo "<script>alert('Invalid phone number')</script>";
        $valid=0;
    }
    
    // $ph_regex='/^\d{10}$/';
    // if(preg_match($phno,$ph_regex)){
    //     echo "<div>error</div>";
    //     echo "<script>alert('Enter valid phnone Number')</script>";
    //     $valid=0;
    // }
    $gender=$_REQUEST['gender'];
    $check="select * from user WHERE email='$email'";
    echo "<div>$check</div>";
    $result = $db -> query($check);
    if($result->num_rows==0 ){
        echo "<div>$result->num_rows</div>";
        $sql="INSERT INTO user (firstname,lastname,email,password,address,phno,gender) VALUES('$firstname','$lastname','$email','$password','$address','$phno','$gender')";
        echo "<p>$sql<p>";
        if ($result = $db -> query($sql)) 
        {
            echo"<script>alert('Account created Scuccessfully!')</script>";
            
        }
    }
    else
            echo "Account already exist"; 
}

    
?>
            

            
            


        
        <script>
            function reset(){
                document.getElementById("myForm").reset();
            }
                
            
            
        </script>
        
        
    </body>
</html>