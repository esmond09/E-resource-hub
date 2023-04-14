<?php include("conn.php");

session_start();

$name=$_SESSION["sname"];
$email=$_SESSION["semail"];
$gender=$_SESSION["sgender"];

$namecap=ucwords($name);

?>

<!DOCTYPE html>
<html>
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
  border-radius:12px;
   border:solid 1px #CF0403;
}
.boxtwo{
  background-color:#EFEEF4;
  background-size: cover;
   border:solid 1px #CF0403;

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
.box-cnt{

  background-color:lightgray;
  float:left;
  border-radius:12px;
  overflow: auto;
  height:400px;
  width:45%;
  margin: 2% 2%;
    float: left;

}
    .box-cnt-h{
        color:white;
       text-align: center;
        padding-top:2px;
        padding-bottom: 2px;
        background:#1D4D60;
        border-radius:12px;
        
    }

    .box-table{
        color: black;
        text-align: center;
        border-collapse: collapse;
        margin:1%;
        box-shadow: 0px 0px 10px white;
        height: auto;
        
    }
    .box-table td,tr,th{
        border: 1px solid white;
    }
    
    a{
        color: navy;
    }
    
    
    </style>
    
    
    
    
  
    
    
    
<head><title>Student_DashBoard</title></head>
<body>
  <div class="box">
   <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
      <tr>
        <td style="color:black"><h1 align="center"><marquee><i>Welcome To E-Resource Hub</i>  </marquee></h1></td>
      </tr>
      <tr>
        <td ><mark style="color:white;background-color:maroon";> &nbsp;Welcome 
            
            <?php if($gender=="m")
                {
                    echo "Mr. ";
                } 
               else{
                echo "Ms. ";
               }
            ?><b><?php echo $namecap; ?> &nbsp;</b></mark></td>
      </tr>
    </table>
  </div>

  <div class="nav">
    <ul>
      <li><a style="background-color: dimgray" href="sdb.php">HOME</a></li>
      <li><a href="sbooks.php">YOUR BOOKS INFO</a></li>
      <li><a href="aboutus.php">ABOUT US</a></li>
      <li><a href="index.php">LOGOUT</a></li>
    </ul>
  
<br><br>

</div>

  <div class="boxtwo" style="border-radius: 10px; width:73.5%; height:1350px; margin-left:13%;margin-top:10px;background-color:white">
      
    <form method="post">
	  <label>Search:</label>
		<input type="text" name="search">
		<input type="submit" name="submit">
	  </form>  
      <?php 
	  if (isset($_POST["submit"])){
		  $str = $_POST["search"];
		  $data=mysqli_query($conn,"SELECT * FROM `book` WHERE booksname='$str' OR b_id='$str' OR authorname='$str'");
		 
		  if($row2 = mysqli_fetch_array($data))
		  {
			  ?> 
	  <br><br><br>
	  <table>
	  <tr>
		<th>Book ID</th>
		  <th>Book Name</th>
		  <th>Authorname</th>
		  </tr>
	  <tr>
		  <?php  $bookid=NULL;
			     $bookid=$row2["b_id"];
			     $lg="<a href='view_book.php?id=$bookid'>"; ?>
		  <td><?php echo $row2['b_id'];?></td>
		  <td><?php echo "$lg";echo $row2['booksname'];?></td>
		  <td><?php echo $row2['authorname'];?></td>
		  </tr>
		   
	  </table>
	    <?php
		  }
	
			  else{ echo"book does not exist";}
	  }
	  ?>
      
    <div class="box-cnt">
      <h3 class="box-cnt-h">Information Technology</h3>
         <table width="470" class="box-table">
                <tr>
                    <th width="73">Book ID</th>
                    <th width="99">Book Name</th>
                    <th width="128">Authorname</th> 
                    <th width="150">Ebook Name</th>
                </tr>
               
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["programme"]=="it"){
                        echo "<tr>";
                          $bookid_it=NULL;
                          $bookid_it=$row["b_id"];
                          $lg1="<a href='view_book.php?id=$bookid_it'>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg1"; echo $row["booksname"]; echo "</a>"; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
                        echo "</tr>";
                          $bookid_it=NULL;
                      }
                    }

	            ?>
                </table>


    </div>

    <div class="box-cnt">
      <h3 class="box-cnt-h">Business and Management</h3>
        
        <table class="box-table">
                <tr>
                     <th width="73">Book ID</th>
                    <th width="99">Book Name</th>
                    <th width="128">Authorname</th> 
                    <th width="150">Ebook Name</th>
                </tr>
               
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["programme"]=="ib"){
                        echo "<tr>";
                          $bookid_ib=NULL;
                          $bookid_ib=$row["b_id"];
                          $lg2="<a href='view_book.php?id=$bookid_ib'>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg2"; echo $row["booksname"]; echo "</a>"; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
                        echo "</tr>";
                          $bookid_ib=NULL;
                      }
                    }

	            ?>
                </table>


    </div>
      
    
    
      <br/clear="all">

    <div class="box-cnt">
      <h3 class="box-cnt-h">Media and Communication</h3>
        
        <table class="box-table">
                <tr>
                    <th width="73">Book ID</th>
                    <th width="99">Book Name</th>
                    <th width="128">Authorname</th> 
                    <th width="150">Ebook Name</th>
                </tr>
               
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["programme"]=="mc"){
                        echo "<tr>";
                          $bookid_mc=NULL;
                          $bookid_mc=$row["b_id"];
                          $lg3="<a href='view_book.php?id=$bookid_mc'>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg3"; echo $row["booksname"]; echo "</a>"; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
                        echo "</tr>";
                          $bookid_mc=NULL;
                      }
                    }

	            ?>
                </table>


    </div>

    <div class="box-cnt">
      <h3 class="box-cnt-h">Tourism and Hospitality</h3>
        
        
        <table class="box-table">
                <tr>
                     <th width="73">Book ID</th>
                    <th width="99">Book Name</th>
                    <th width="128">Authorname</th> 
                    <th width="150">Ebook Name</th>
                </tr>
               
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["programme"]=="th"){
                        echo "<tr>";
                          $bookid_th=NULL;
                          $bookid_th=$row["b_id"];
                          $lg4="<a href='view_book.php?id=$bookid_th'>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg4"; echo $row["booksname"]; echo "</a>"; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
                        echo "</tr>";
                          $bookid_th=NULL;
                      }
                    }

	            ?>
                </table>


    </div>
		      </br/clear>
		      <div class="box-cnt">
      <h3 class="box-cnt-h">Languages and General Studies</h3>
        
        
        <table class="box-table">
                <tr>
                     <th width="73">Book ID</th>
                    <th width="99">Book Name</th>
                    <th width="128">Authorname</th> 
                    <th width="150">Ebook Name</th>
                </tr>
               
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["programme"]=="lg"){
                        echo "<tr>";
                          $bookid_lg=NULL;
                          $bookid_lg=$row["b_id"];
                          $lg5="<a href='view_book.php?id=$bookid_lg'>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg5"; echo $row["booksname"]; echo "</a>"; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
                        echo "</tr>";
                          $bookid_lg=NULL;
                      }
                    }

	            ?>
                </table>


    </div>
      


  </div>


      <div class="boxthree" style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:73.5%; height:40px; margin-left:13%; margin-top:15px" >
        <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">Thank You For Using This System.</h6></marquee>


      </div>

</body>
</html>
