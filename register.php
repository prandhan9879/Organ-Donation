<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Register Donor</title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">

.main{
            display: inline-flex;
          }
          .sub{
            width: 50%; 
            /* border: 2px solid black; */
            
          }
          form{
            font-size: 24px;
          }
          .footer{

            align-items: center;
            display: block;
            justify-content: center;
            background-color: #7F8C8D;
            max-width: 100%;
            height: 200px;
            padding: 30px 10% 30px 40%;
            color: white;
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

	body {
		background-image: url('img/bg1.jpeg');										
		background-position: midle;
		background-repeat: no-repeat;
		background-size: 100%;
		font-family: 'times', sans-serif;
		background-color: #CCFFCC;
		
	}
	.box{
		
		margin-top:20px;	
		width:450px;
		height:auto;
		border:thick;
		border-color:#000033;
		border-style:groove;
		border-color:#990000;
		padding-top:40px;
		padding:10px;
		text-align:center;
		}

</style>
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
	<center>
		<form>
			<div class="box">
				<h2> Donor Registration</h2>
				<input class="form-control" type="text" name="dname" placeholder="Donor Name" style="margin-bottom:10px" required/>
				<input class="form-control" type="text" name="dphno" placeholder="Mobile No" style="margin-bottom:10px" required/>
				<input class="form-control" type="text" name="daddress" placeholder="Address" style="margin-bottom:10px" required />
				<input class="form-control" type="text" name="did" placeholder="E-mail" style="margin-bottom:10px" required/>
				<select class="form-control" style="margin-bottom:10px" name="btype">
					<option value="" selected="selected">Select Blood Type</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
				</select>
				<select class="form-control" name="gender">
							<option>Select Gender</option>
							<option>Male</option>
							<option>Female</option>
						</select>
				<label style="font-size:24px; color: #0000FF; font-style:bold">Select Organ:</label><br />
				<input type="radio" name="organ" value="eye" style="margin-bottom:10px"/> <b>Eye</b>
				<input type="radio" name="organ" value="kidney" style="margin-bottom:10px"/> <b>Kidney</b>
				<input type="radio" name="organ" value="liver" style="margin-bottom:10px"/> <b>Liver</b><br />
				<input class="form-control" type="text" name="dfname" placeholder="Family Memeber Name" style="margin-bottom:10px" required/>
				<input class="form-control" type="text" name="dfphno" placeholder="Family Mobile No" style="margin-bottom:10px"mrequired/>
				<input class="btn btn-success" type="submit" name="submit" value="Submit" style="margin-bottom:10px"/>
				
			</div>
		</form>
	</center>

	<div class="footer">
        <p><span>&#169;: </span>This website is subjected to copyright.</p>
        <h2>SAVE LIVES , SHARE SMILES</h2><br>
        <p><span>&#9993;: </span>pradhansatyabrat2003@gmail.com</p>
        <p><span>&phone;: </span>+917978631994</p>
        <br>
    

</body>
</html>

<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['did']))
{
        // removes backslashes
	$username = stripslashes($_REQUEST['did']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$ph_no = stripslashes($_REQUEST['dphno']);
	$bgroup = stripslashes($_REQUEST['btype']);
	$name = stripslashes($_REQUEST['dname']);
	$address = stripslashes($_REQUEST['daddress']);
	$gender = stripslashes($_REQUEST['gender']);
	$family_name = stripslashes($_REQUEST['dfname']);
	$family_phno = stripslashes($_REQUEST['dfphno']);
	$organ = stripslashes($_REQUEST['organ']);
	
	$query = "INSERT into `donor` (dname,email,phno,btype,gender,address,organ,fm_name,fm_phno)
				VALUES ('$name','$username','$ph_no','$bgroup','$gender','$address','$organ','$family_name','$family_phno')";
    $result=$con -> query($query);
	// $result = mysqli_query($con,$query);
    if($result)
	{
		echo "<div class='alert alert-success'>
			<h3>You are registered successfully.</h3>
			<br/>Click here to <a href='index.html'>Homepage</a></div>";
	exit();
    }
	else
	{
			echo "<div class='alert alert-danger'>
				<strong>Warning!</strong> Regestration Failed. Pleas try again.
				</div>";
			echo (mysqli_error($con));
			exit();
	}
	
}

?>