<?php

    $user='root';
    $pass='user';
    $db=new mysqli('localhost',$user,'','hospital') or die("unable to connect");
    // if($db->connect_error){
    //     die("connection failed".$db->connect_error);
    // }else{
    //     echo"connection successfully";
    // }
 ?>    
<html>
    <head>
        <title></title>
        <style>
            
            body{
              background-image: url("OD1.jpeg");
    

  
    /* Add the blur effect */
    
  
  
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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

#form{
    
    display:inline-block;
    border: 1px solid rgba(82, 82, 82, 0.493);
    padding: 1%;
    margin-left: 40%;
    margin-top: 15%;

}
.label{
    font-size: 36px;
    font-weight: 100;
    font-family: 'Times New Roman', 'Times', 'serif';
}
.field{
    border-radius: 5px;
    background-color: rgb(213, 211, 211);
}

#social > img{
    height: 30px;
    width: 30px;
}
#form > button{
    height: 36px;
    width: 70px;
    border-radius: 5px;
}
#newuser{
    color: rgb(26, 77, 194);
    font-weight: bold;
}

.menu{
    position: fixed;
   width: 100%;            
   
   background-color: bisque;
   border: 2px solid blue;
   
   /* overflow: auto; */

}
.menu_element{
    

    padding-right: 20px;
    display: inline-block;
    list-style: none;
}
.menu_element a{

    
    color: black;
    text-decoration: none;

}
.menu_element a:hover{
    background-color: burlywood;
    
}
#login{
    float: right;
    /* padding-right: 1%; */
    margin-right: 2px;
}

        </style>
        
        </head>
        <body id=body>
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
        
        
        <form id="form" name="form" method="POST">
            <div class="label">Username</div>
            <div ><input type="text" class="field" namespace="username" id="username" name="username"></div>
            <br>
            <br>

            <div class="label">Password</div>
            <div ><input class="field" type="password" id="password" name="password"></div>
            <br>
            <button type="submit" name="submit" onclick=login()>Login</button>
            <br>
            <br>
            <div id="social">Sign Up With <img src="login_page/Google.jpg">  <img src="login_page/facebook.jpg">  <img src="login_page/insta_icon.jpg"></div>
            <br>
            <br>
            <div id="newuser"><a href="create_account.php">Already Have One?</a></div>
</form>

<?php
    if(array_key_exists('submit', $_POST)) 
    {
        $user=$_REQUEST['username'];
        $user=strtolower(htmlspecialchars($user));
        $pass=$_REQUEST['password'];
        $sql="SELECT email,password FROM user WHERE email='$user' AND password=$pass";
        $result = $db -> query($sql);
        if(!($result->num_rows==0) )
        {
            echo "<script>alert('Login Success')</script>";
            echo "<script>window.location.replace('http://localhost/ORGAN_DONATION/index.html')</script>";
            
        }else 
            echo "$sql";
            echo "<script>alert('Invalid Username or Password')</script>";
    }
?>
        
        <script src="login_page/login_page.js"></script>
    </body>
</html>


