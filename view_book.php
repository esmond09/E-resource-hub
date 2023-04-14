<?php
$msg="";
include("conn.php");
session_start();

$name=$_SESSION["sname"];
$email=$_SESSION["semail"];
$id=$_GET['id'];


$query="SELECT * FROM `book` WHERE `book`.`b_id`= '$id'";
$query1=mysqli_query($conn,$query);
$ros=mysqli_fetch_array($query1);
$book_name=$ros['booksname'];
$auth_name=$ros['authorname'];


	
	

if(isset($_POST['sub'])){
	
$query="SELECT * FROM book WHERE `book`.`b_id`= '$id'";
$query1=mysqli_query($conn,$query);
$ros=mysqli_fetch_array($query1);
$path=$ros['path'];
header('content-Disposition: attachment;filename = '.$id.'');
header('content-type:application/pdf');
header('content-length='.filesize($path));
readfile($path); 
	
    $query="SELECT * FROM `student_book` where `student_book`.`emailid`= '$email'";
    $query1=mysqli_query($conn,$query);
    $ros=mysqli_fetch_array($query1);	
	
     
	if($ros[0]!=""){
		$sql1= "select date_format(curdate(),'%d-%m-%Y')" ;
	     $res1 = mysqli_query ($conn,$sql1);
	     $row1 = mysqli_fetch_row($res1);
	     $recive=$row1[0];
		
		$sql="UPDATE `student_book` SET". "`book_id` ='$id',"."`book_name` = '$book_name',"."`recive_date_1` = '$recive'"." WHERE `student_book`.`emailid` ="."'$email'";
        mysqli_query($conn,$sql); 
		
	}
	 if($ros[0]==""){
    $sql1= "select date_format(curdate(),'%d-%m-%Y')" ;
	$res1 = mysqli_query ($conn,$sql1);
	$row1 = mysqli_fetch_row($res1);
	$recive=$row1[0];
            
            
    $insert="INSERT INTO `student_book`(`emailid`,`book_id`,`book_name`,`recive_date_1`) VALUES('".$email."','".$id."','".$book_name."','".$recive."')";
    mysqli_query($conn,$insert); 
	   }
	
 }    
 
?>

<html>
<head><title>View Book</title>
    
<style>
body{
  background-image: url("m.jpg");
  height: 50%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
#table1{
		width: 70%;
		text-align: center;
		height: 40px;
    margin-left: 15%;
    font-size: 20px;
   
	}
	#table2{
		color: white;
	
	}
	.td1{
		padding: 1px;
		background-color: black;
		
	}
	.td1:hover{
    background: dimgray;
    color: #FFFFFF;
	}
	.td2{
		padding: 5px;
		color:black;
		background-color: 
	}
	a{
    text-decoration: none;
    color: #FFFFFF;
	}
  .box{
    width:74%;
    height:160px;
	border:solid 1px #CF0403;
    background-color:antiquewhite;
    background-size: cover;
    margin-left: 13%;
    opacity: .9;
    border-radius:12px;
  }
  .boxtwo{
    background-color:#EFEEF4;
    background-size: cover;
    border-radius:12px;
  }

.five{
  padding:10px 0px 10px 10px;
	width: 500PX;
  margin-top: 20px;
  margin-left: 23%;
  height:300px;
  border-radius:12px;
  margin-right: 5%;
  font-size:22px;


}
   .five input[type="submit"]
          {

		    font-size:15px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:40% ;
			background:#1D4D60;
			color:black;
			border-radius:18px;
			}
    
    .td3{
        font-size: 13px;
        font-family: cambria;
        color:black;
        font-weight: bold;
    }
</style>
</head>

<body>
  <div class="box">
   <table  style =" font-size:16pt"  align="center" width="100%" height="100%" >
      <tr>
        <td style="color:black"><h1><marquee>
        Welcome To E-Resource Hub
            </marquee></h1></td>
      </tr>
      <tr>
        <td  align="center"><b><i>
        <mark style="background-color:maroon;color:antiquewhite">VIEW BOOK PAGE</mark></i></b></td>
      </tr>
    </table>
  </div>
   
   <table id="table1">
	<tr>
		<td class="td1">
			<a href="sdb.php">HOME</a>
		</td>
		<td class="td1">
			<a href="sbooks.php">YOUR <span style="color: #FFFFFF">BOOKS</span> INFO</a>
		</td>
		<td class="td1">
			<a href="">ABOUT US</a>
		</td>
		<td class="td1">
			<a href="index.php">LOG OUT</a>
		</td>
	</tr>
</table>
    <br>
    <br>

   <div  class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:73.5%; height:360px; margin-left:13%;background-color:white">
        <fieldset style="background-color:lightgray" class="five">
            <form method="post">
		
<table  id="table2">
	<tr>
		<td  class="td2">
		BOOK NAME :
		</td>
		<td class="td3">
            <?php echo $book_name; ?>
			
		</td>
	</tr>
	<tr>
		<td class="td2">
	    AUTHOR NAME :
	    </td>
		<td class="td3">
            <?php echo $auth_name; ?>
			
		</td>
	</tr>
	<tr>
		<td class="td2">
		ID :
		</td>
		<td class="td3">
			<?php echo $id; ?>
		</td>
	</tr>

	<tr>
		<td class="td2">
		E-BOOK :
		</td>
		<td class="td2">
            
			<input type="submit" name="sub" value="DOWNLOAD"> 
		</td>
	</tr>
	<tr>
    <td style="color:red;font-weight:bold;text-align:center;padding-top:30px;padding-left:50px"><?php echo $msg; ?></td>
	</tr>
</table>
                </form>
      </fieldset>
      </div >

     <div class="boxthree" style="background-color:lavender; border:solid 2px orange;border-radius: 10px; width:73.5%; height:40px; margin-left:13%; margin-top:15px" >
      <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h5 style="line-height:1px;">For any inquiry please <a href="aboutus.php">contact us</a> . Thank You.</h5></marquee>


    </div>

  </body>
</html>