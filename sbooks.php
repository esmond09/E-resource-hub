<?php
session_start();
$name=$_SESSION["sname"];
$email=$_SESSION["semail"];
$gender=$_SESSION["sgender"];


include("conn.php");
?>

<html>
<head>
<title>book info</title>
    <style>
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
  background-color:antiquewhite;
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
 border:solid 1px #CF0403;
  border-radius: 12px;

}
.boxtwo{
  background-color:#EFEEF4;
  background-size: cover;
  border-radius:12px;

}
ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  width: 248px;
  height: 40px;
  background-color: black;
  opacity: .8;
  line-height: 40px;
  text-align: center;
  font-size: 20px;
  margin-right: 2px;
}
ul li a{
  text-decoration: none;
  color: white;
  display: block;
}
ul li a:hover{
  background-color: dimgray;
}
ul li ul li{
  display: none;
}
ul li:hover ul li{
  display: block;

}
.nav{
  padding-left:13%;

}
.three{
  margin-left: 15%;
  margin-top: 5px;
}
        table,tr,td{
            text-align: center;
        }
</style>


</head>
<body>

  <head><title>LOGIN_PAGE</title></head>
  <body>
    <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
          <td style="color:black"><h1 align="center"><marquee><i>Welcome To E-Resource Hub</i>  </marquee></h1></td>
        </tr>
        <tr>
          <td align="center"><b><i><mark style="color:antiquewhite;background-color:maroon";>YOUR BOOKS INFORMATION</mark></i></b></td>
        </tr>
      </table>
    </div>



      <div class="nav">
        <ul>
          <li><a href="sdb.php">HOME</a></li>
          <li><a  style="background-color: dimgray" href="sbooks.php">YOUR BOOKS INFO</a></li>
          <li><a href="aboutus.php">ABOUT US</a>
          </li>
          <li><a href="index.php">LOGOUT</a></li>
        </ul>
    <br><br>
          
          
  <div class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:84%; height:360px; margin-left:0%;margin-top:10px;background-color:white">
      
      
      
    <fieldset  style ="height:320px; width:650px;overflow:auto" class="three"  >
      <legend align="center" style="color:black"><b><u>Your Books</u></b></legend>

    <table width="100%" height="310px" border="1"  align="center" style="color:black;  background-color: lightgray;box-shadow:0px 0px 15px lightblue;">
      <tr>
        <th height="50">BOOK ID</th>
        <th>BOOK NAME</th>
        <th>PREVIOUS DOWNLOADED DATE </th>
      </tr>
      
        
        
        <?php $query1="SELECT * FROM `student_book`  where `student_book`.`emailid` = '$email'";
        
        $data=mysqli_query($conn,$query1);
        
	            while( $row = mysqli_fetch_array($data)){
                      if($row[0]!=""){   
               
                        echo "<tr>";
                        echo "<td>" ;echo $row["book_id"]; echo "</td>";
                        echo "<td>";echo $row["book_name"]; echo "</td>";
                        echo "<td>"; echo $row["recive_date_1"]; echo "</td>";
                        echo "</tr>";
                     
                      
                      
                    }
        
        else{
                        echo "<tr>";
                        echo "<td>" ;echo "You"; echo "</td>";
                        echo "<td>";echo "Have"; echo "</td>";
                        echo "<td>"; echo "No"; echo "</td>";
                        echo "<td>"; echo "Book"; echo "</td>";
                        echo "</tr>";
                      }
				}
	            ?>
            
        

        
    </table>
    </fieldset>

  </div>



        <div  style="background-color:lavender; border:solid 2px orange;border-radius: 10px; width:84%; height:40px; margin-left:0%; margin-top:15px" >
          <p ><h6 style="line-height:1px;">Thank You For Using This System.</h6></p>


        </div>


</body>
</html>
