<?php 
include("conn.php");


if(isset($_POST['sub']))

{


  $id=$_POST['sid'];  
  

  if($id!="")
  {  
      $sql="DELETE FROM `student_registration` WHERE `sid` ='$id'";
      
	$data = mysqli_query($conn, $sql);
	
      if($data)
	  {
	    $msg= "Student Delete Successfully";
	  }
	  else
	  {
	    $msg= "Something Went Wrong..";
	  }
}

}

?>

<html>
<head>
<style>
body{
  background-image: url("m.jpg");
  height: 50%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
    table{
                width: 100%;
                border-collapse: collapse;
                height: auto;
        text-align: center;
        color: black;
        font-weight: bold;

            }
    
    th{
        font-size: 17px;
        text-decoration: underline;
        font-style: italic;
    }
    
    .main{
        width: 80%;
        border-radius: 20px;
        overflow: auto;
        margin-left: 10%;
        margin-top: 2%;
        height:270px;
        background-color:lightgray;
    }
	.main2{
        width: 35%;
        border-radius: 0px;
        overflow: auto;
        margin-left: 10%;
        margin-top: 2%;
        height:130px;
        background-color:lightgray;
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
.boxtwo{
  background-color: wheat;
  border-radius:12px;

}
ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  width: 200px;
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
  padding-left:12%;

}
.three{
  margin-left: 60%;
  margin-top: 5px;
  box-shadow:0px 0px 15px lavender;
}
    button{
        margin-top: 10px;
    }
</style>


<title>Admin Dasboard</title>
</head>
<body>

  
    <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
            <td style="color:black"><h1 align="center"><marquee><i>Welcome To E-Resource Hub</i>  </marquee></h1></td></tr>
        <tr>
          <td align="center"><b><i><mark style="color:antiquewhite;background-color: maroon">ADMIN PANEL</mark></i></b></td>
        </tr>
      </table>
    </div>



      <div class="nav">
        <ul>
          <li><a href="admin.php">Home</a></li>
          <li><a href="add_book.php">Add Book</a></li>
          <li><a href="edit_book.php">Edit Book</a></li>
            <li><a href="delbook.php">Delete Book</a></li>
	 <li><a style="background-color: dimgray" href="studentinfo.php">Student Info</a></li>
          <li><a href="index.php">Logout</a></li>
        </ul>
           </div>
    <br><br>
          
          
  <div class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:84%; height:800px; margin-left:9%;margin-top:10px;background-color:#EFEEF4">
    <div class="main2">
      <form method="post">
        <label><b>Search:</b></label>
        <input type="text" name="search">
        <input type="submit" name="submit">
      </form>
      <?php 
	  if (isset($_POST["submit"])){
		  $str = $_POST["search"];
		  $data=mysqli_query($conn,"SELECT * FROM `student_registration` WHERE `sid`='$str' OR `name`='$str'");
		 
		  if($row2 = mysqli_fetch_array($data))
		  {
			  ?>
      <table>
        <tr>
          <th>student ID</th>
          <th>Student Name</th>
          <th>Programme</th>
          <th>Student Email</th>
        </tr>
        <tr>
          <?php  $studentid=NULL;
			     $studentid=$row2["sid"]; ?>
          <td><?php echo $row2['sid'];?></td>
          <td><?php echo $row2['name'];?></td>
          <td><?php echo $row2['programme'];?></td>
          <td><?php echo $row2['emailid'];?></td>
        </tr>
      </table>
      <?php
		  }
	 	  
	
	
			  else{ echo"student does not exist";}
	  }
	?>	
	
    </div>

    <!--    <input type="text" placeholder="search by book id"><button type="button">search</button>  -->
    <p style="text-align:center;color:black;font-weight:bold">ALL Students</p>
   <div class="main">
      
       <table>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Programme</th>
                    <th>Student Email</th>
					
                </tr>
                
                
                
                    
                    
                    
            <?php 
           
           $data=mysqli_query($conn,"SELECT * FROM `student_registration` WHERE `student_registration`.`type`='student'");
	              while($row = mysqli_fetch_array($data))
	               {   
                        echo "<tr>";
                        echo "<td>" ;echo $row["sid"]; echo "</td>";
                        echo "<td>";echo $row["name"]; echo "</td>";
                        echo "<td>"; echo $row["programme"]; echo "</td>";
                         echo "<td>"; echo $row["emailid"]; echo "</td>";
 	                                 
                    }?>
 
     </table>
      
    </div>   
   

</div>
      
      
      
      
 




        <div  style="background-color:lavender; border:solid 2px orange;border-radius: 10px; width:84%; height:40px; margin-left:9%; margin-top:15px" >
          <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">Thank You.</h6></marquee>


        </div>

   
    </body>
  
</html>