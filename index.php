<html>
 <head>
  <link rel="stylesheet" type="text/css" href="studentlogin.css">
  <link rel="icon" type="image/png" href="images/feedbacklogo.png">
  <title>FeedBack | Students login</title>
 </head>
 <body>
  <div class="title">
	<a href=""><img src="images/home.png" class="home"></a>
    <img src="images/feedbacklogo.png" class="logo"/>
    <label class="f">FeedBack</label>
  </div>
  <div id="lgform">
	<center><h1>Login</h1></center> 
	<center><img src="images/student.png" class="student"/></center>
    <form class="myform" action="" method="post">
	  <label><b>Roll No.</b></label><br>
    <input type="text" class="inputvalue" name="rollno" placeholder="Enter your Roll no."/><br>
	  <label><b>Password</b></label><br>
    <input type="password" class="inputvalue" name="password" placeholder="Enter your Password"/><br>
    <div class="phpr">
    <label>
    <?php   

      $servername = "127.0.0.1";
      $username = "root";
      $password = "";
      $dbname = "feedie_base";
            
      if (isset($_POST["rollno"]) AND isset($_POST["password"])){
      // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $rollno = $_POST["rollno"];
        $sql = "SELECT st_username, password, class FROM students WHERE rollno = '".$rollno."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          if( $_POST["password"] == $row["password"] ){
            echo "Logging you in...";    
            session_start();
            $_SESSION["rollno"] = $_POST["rollno"];
            $_SESSION["st_username"] = $row["st_username"];
            $_SESSION["class"] = $row["class"];
            sleep(1);
            header("Location: dashboard/");  // lines
          }
          else
            echo "password incorrect";
          } 
        else {
            echo "Unknown username";
        }
        $conn->close();
      }

    ?>
    </label>
    </div>
	  <input type="submit" id="login_btn" value="Login"/><br>
    </form>
  </div>
 </body>
</html>