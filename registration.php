<?php include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))

{
  $name=$_POST['name1'];
  $sid=$_POST['sid'];
  $gender=$_POST['gender'];  
  $programme=$_POST['programme'];
  $year=$_POST['year'];
  $email=$_POST['email'];
  $password=$_POST['password'];
    
  $_SESSION["sname"]=$name;
  $_SESSION["semail"]=$email;
    
    
    
    if($name!="" && $sid!="" && $programme!="" && $year!="" && $email!="" && $password!="" )
  { 
        $insert="INSERT INTO `student_registration`(`sid`,`gender`,`name`,`programme`,`year`,`emailid`,`password`) VALUES('".$sid."','".$gender."','".$name."','".$programme."','".$year."','".$email."','".$password."')";
      $data=mysqli_query($conn,$insert); 
      if($data)
	  {
	  
	  
          header("Location:thnk.php"); 
	  }
        else
        {
            echo "Something Wrong Occurs..!! Please Try Again";
        }
        
    }
    else{
        echo "Fields Should Not Be Empty..!!";
    }
}


?>

<!DOCTYPE html>
<html>

<style type="text/css">
body{
 background-image: url("m.jpg");
  height: 50%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.box{
 width:74%;
  height:160px;
  background-color: antiquewhite;
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
 border:solid 1px #CF0403;
  border-radius: 12px;
}
.title h2{
           background:#1D4D60;
       border:none;
       margin-left:-10px;
      margin-top: -05px;
      padding-top:3px;
      padding-bottom: 2px;
        padding-left:120px;
      border-radius:15px;
      width:77.2%;
      color:white;
           }
.one{
  margin-top: 1.5%;
  margin-left:52%;
  margin-right:2%;
  opacity: .9;
  height:320px;
  background:rgba(0,0,0,0.5);
}
.boxtwo{
  background-image: url("login.jpeg");
  background-size: cover;
  border-radius:12px;
}
.boxtwo input[type="submit"]
       {

     font-size:25px;
     text-align:center;
   border:none;
   height:40px;
   margin-left:60% ;
   margin-top: 10px;
   background:#1D4D60;
   color:#FFFFFF;
   border-radius:18px;
   }

</style>




<head><title>REGISTRATION</title></head>
<body>
  <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
            <td style="color:black"><h1 align="center"><marquee><i>Welcome To E-Resource Hub</i>  </marquee></h1></td></tr>
        <tr>
          <td align="center"><b><i><mark style="color:black";>REGISTER PANEL</mark></i></b></td>
        </tr>
      </table>
  <br><br>
  <div  class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:73.5%; height:370px; margin-left:13%;margin-top:10px;background-color:white">

<fieldset align="center" style="color:blue;" class="one">
  <div class="title">
  <h2>YOUR DETAILS</h2>
    </div>

<form action="" method="post">
<table align="Right" style="color:white;font-size:13pt">
	  <tr>
			<td>NAME:</td>
 <td ><input type="text" required="required" name="name1" size="17"
 maxlength="30" style="color:blue"/></td>

	  </tr>
    <tr>
      <td>GENDER.:</td>
      <td>
<input type="radio" name="gender" value="m" checked> Male
<input type="radio" name="gender" value="f"> Female</td>
    </tr>
<tr>
<td>Student ID:</td>
 <td><input type="text" name="sid" required="required" size="17"
 maxlength="30" style="color:blue"/></td></tr>

<tr>
<td>Programme:</td>
 <td><select required name="programme">
	   <option value="it">Information Technology</option>
	   <option value="ib">Business and Management</option>
	   <option value="mc">Media and Communication</option>	   
	   <option value="th">Tourism and Hospitality</option>
	   <option value="lg">Languages and General Studies</option>
</select></td></tr>
<tr>
<td>
YEAR:</td>
 <td>
   <select required name="year">
     <option value="1st_year">1st Year</option>
     <option value="2nd_year">2nd Year</option>
     <option value="3rd_year">3rd Year</option>
    </select>
 </td></tr>
<tr><td>E-MAIL:</td>
 <td><input type="email" name="email" required="required" size="17"
 maxlength="30" style="color:blue"/></td></tr>
<tr>
<td>
PASSWORD:</td>
 <td><input type="text" name="password" required="required" size="17"
 maxlength="30" style="color:blue"/>
</td></tr>

 <tr>
  <td><input type="submit" name="submit"
   value="REGISTER"></td>
</tr>
 </table>
</form>
 </fieldset>
</div>



  <div class="boxthree" style="background-color:lavender; border:solid 2px orange;border-radius: 10px; width:73.5%; height:40px; margin-left:13%; margin-top:15px" >
    <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">For any query please <a href="aboutus.php">contact us</a>.Thank You.</h6></marquee>


  </div>

 </body>
</html>
