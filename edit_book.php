<?php include("conn.php");

$msg="";



if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sub']))

{

  $bookname=$_POST['booksname'];
  $authorname=$_POST['authorname'];
  $id=$_POST['book_id'];  
  $programme=$_POST['programme'];
  

  if($bookname!="" && $authorname!="" && $id!="")
  {  
     
  
     $file_name = $_FILES['file']['name'];
	 $new_file_name=$id.".pdf";
     $file_tmp_loc = $_FILES['file']['tmp_name'];
	 $file_store = "ebooks/";
     $fpath=$file_store.$new_file_name;
	 $accepted=array("pdf");

	 
	 
	if(!in_array(pathinfo($file_name,PATHINFO_EXTENSION),$accepted))
	{
	
	 $msg= $file_name."<br> is not acceptable file type";
	}
	else
	{
	  
	  move_uploaded_file($_FILES['file']['tmp_name'],$file_store.$new_file_name);
	  
	 }
      
    
      $sql="UPDATE `book` SET". "`booksname` ='$bookname',"."`authorname` = '$authorname',"."`programme` = '$programme',"."`file_name` = '$new_file_name',"."`path` = '$fpath'". " WHERE `book`.`b_id` ="."'$id'";
      

	$data1 = mysqli_query($conn,$sql);
	
      if($data1)
	  {
	    $msg= "Successfully Edit";
	  }
	  else
	  {
	    $msg= "Something Went Wrong..";
	  }
}
    else
	  {
	   $msg="all field are required";
	  }
}
?>
<html>
<head>
<title>Edit_Book</title>


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
  border-radius: 12px;
}

	 .header{
	         width:400px;
			color:#FFFFFF;
			 display: inline-block;
			 width:73.5%;
			 height:370px;
			 margin-left:13%;
       background-color:#EFEEF4;
       background-size: cover;
       border-radius:12px;
         border:solid 1px #CF0403;

			 }


	.title
	       {
				color:#FFFFFF;
			   font-size:20px;
			 	font-weight:10px;
			
                margin-top: 4%;
				margin-right:56%;
				padding-left:10%;
				font-style:italic;
				}
	.title h2{
	           background:#1D4D60;
			   border:none;
         margin-left:20px;
         margin-top: 10px;
			  padding-top:3px;
        padding-bottom: 2px;
			    padding-left:150px;
				border-radius:15px;
        width:280px;
	           }

	.container{
        margin-top: 15px;
	            margin-left:20%;

				font-weight:10px;
				height:350px;
				background-color:lightgray;
				padding-left:3%;
                width:600px;
        border-radius:18px;
        overflow:auto;
				}

   .header input[type="submit"]
          {

		    font-size:25px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:110% ;
            margin-top: 10px;
			background:#1D4D60;
			color:#FFFFFF;
			border-radius:18px;
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


</style>
</head>
<body>
  <div class="box">
   <table  style ="border-color:red; font-size:16pt"  align="center" width="100%" height="100%">
      <tr>
        <td style="color:black"><h1 align="center"><marquee>Welcome To E-Resource Hub</marquee></h1></td>
      </tr>
      <tr>
        <td style="color:antiquewhite;background-color: maroon;" align="center"><b><i>Edit Books to Database</i></b></td>
      </tr>
    </table>
  </div>
<div class="nav">
<ul>
  <li><a href = "admin.php">Home</a></li>
  <li ><a href = "add_book.php" >Add Book</a></li>
  <li><a href = "edit_book.php"  style="background-color:dimgray">Edit Book</a></li>
  <li><a href = "delbook.php">Delete Book</a></li>
	<li><a href="studentinfo.php">Student Info</a></li>
  <li><a href = "index.php">Logout</a></li>
</ul>
<br><br><br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
<div class = "header">


  <div class = "container">
    <div class="title">
    <h2>EDIT BOOK</h2>
      </div>

  <table style= "color:black;padding-top:10px;">
      
       <tr>
     <td>BOOK ID:</td>
     <td><input type="text" name="book_id" placeholder="books ID"/></td>
	</tr>
      
       <tr>
     <td>BOOK NAME:</td>
     <td><input type="text" name="booksname" placeholder="books name"/></td>
     </tr>
      
      
         
	<tr>
	  <td>AUTHOR NAME:</td>
	 <td><input type="text" name="authorname" placeholder="books author name"/></td>
        <td style="color:red;font-weight:bold;text-align:center"><?php echo $msg; ?></td>
	</tr>
      
      
      
      
  
   <tr>
	  <td>PROGRAMME:</td>
	 <td>
	 <select name="dept">
	   <option value="it">Information Technology</option>
	   <option value="ib">Business and Management</option>
	   <option value="mc">Media and Communication</option>	   
	   <option value="th">Tourism and Hospitality</option>
	   <option value="lg">Languages and General Studies</option>
	   </select>
	   
	 </td>
	</tr>

	<tr>
	 <td>UPLOAD EBOOK:</td>
	 <td><input type="file" name="file"  /></td>
	</tr>
      <tr>
	  <td><h2><input style="margin-left:180%;margin-top:10%;" type="submit" name="sub" value="RE-UPLOAD"/></h2></td>
	  </tr>
    </table>
    </div>
   </div> 
 </form>
</body>
</html>