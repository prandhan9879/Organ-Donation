       
        <?php
        $user='root';
        $pass='';
        $db='hospital';

        $db=new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
        // echo"Connected successfully";

    ?>
    <html>
      <head>
        <!-- <link href="/src/patient.css" rel='stylesheet'>" -->
        <style>
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
    <div class="main">
      <div class="sub">
        <img src="one.jpeg" width="100%">
      </div>
      <div class="sub">
       <form method= "post" >
            Patient Name <input type="text" name="name" required><br><br>
            Age:<input type="number" name="age" required><br><br>
            Gender: Male<input name="gender" type="checkbox" value="male" >
                  Female<input name="gender" type="checkbox" value="female" ><br><br>
            Address:<input name="address" type="textarea" rows="2" cols="4"><br><br>
            Blood Group: A+<input name="bloodgroup" type="radio" value="A+">
                        B+<input name="bloodgroup" type="radio" value="B+">
                        O+<input name="bloodgroup" type="radio" value="O+">
                        A-<input name="bloodgroup" type="radio" value="A-">
                        B-<input name="bloodgroup" type="radio" value="B-">
                        AB-<input name="bloodgroup" type="radio" value="AB-">
                        AB+<input name="bloodgroup" type="radio" value="AB+">
                        O-<input name="bloodgroup" type="radio" value="O-"><br><br>

            E-mail ID:<input name="mail" type="mail" ><br><br>
            Contact number:<input name="num" type="number" maxlength="10" minlength="10"><br><br>
            Needed Organ:<input name="organ" type="text"><br><br> 
            Time Required:<input name="timereq" type="date" required><br><br>
            <input type="submit" value="insert" name="insert">
        </form>
      </div>
    </div>
    <div class="footer">
        <p><span>&#169;: </span>This website is subjected to copyright.</p>
        <h2>SAVE LIVES , SHARE SMILES</h2><br>
        <p><span>&#9993;: </span>pradhansatyabrat2003@gmail.com</p>
        <p><span>&phone;: </span>+917978631994</p>
        <br>
      </body>
  </html>
    
        <?php
        
        if(array_key_exists('insert', $_POST)) {
            $name=$_REQUEST['name'];
            $age= $_REQUEST['age'];
            $gender = $_REQUEST['gender'];
            $address = $_REQUEST['address'];
            $bloodgroup = $_REQUEST['bloodgroup'];
            $mail = $_REQUEST['mail'];
            $contact = $_REQUEST['num'];
            $organ=$_REQUEST['organ'];
            $time_req = $_REQUEST['timereq'];
            $query="INSERT INTO data (Name, Age, Gender, Address, BloodGroup, Email, Contact, Organ, Timereq)
            VALUES ('$name', $age, '$gender', '$address', '$bloodgroup','$mail','$contact','$organ','$time_req');";
            echo"<br>";
            // echo "$query";
            if ($result = $db -> query($query)) {
              // echo "<br> data inserted";
            }

            
        }

        ?>