





<!--<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
	<link rel="stylesheet" href="./css/loginstyle.css">
</head>
<body>
	<div class="box">
		<h2>LOGIN</h2>
		<form>
			<div class="inputBox">
				<input type="text" name="" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="" required="">
				<label>Password</label>
			</div>
			<input type="submit" name="" value="Submit">
		</form>
	</div>

</body>
</html>-->
<?php 

/*$host="localhost";
$user="root";
$password="";
$db="grocery";

mysqli_connect($host,$user,$password);
mysqli_select_db($db);*/
$db=mysqli_connect("localhost","root","","grocery") or die("Cannot select DB" .mysqli_connect_error());
if(isset($_POST['login'])){
    session_start();
    $uname=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password2']);
    
    $sql="select * from user where name='".$uname."'AND password='".$password."'";
    
    /*$result=mysqli_query($db,$sql);
    
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        header("location: index.php");
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }*/
       $numrows=mysqli_num_rows($sql);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($sql))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($uname == $dbusername && $password == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$uname;  
  
    /* Redirect browser */  
    header("Location: index.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
   
}
?>
<html>
<head>
 <title> Login Form in HTML5 and CSS3</title>
 <link rel="stylesheet" a href="css\loginstyle.css">
 <link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body style="background-color:lightgrey;">
 <div class="container">
 <img src="img/login.jpg"/>
 <form>
 <div class="form-input">
 <input type="text" name="username" placeholder="Enter the User Name"/> 
 </div>
 <div class="form-input">
 <input type="password" name="password2" placeholder="password"/>
 </div>
 <input type="submit" type="submit" name="login" value="LOGIN" class="btn-login"/>
 </form>
 </div>
</body>
</html>