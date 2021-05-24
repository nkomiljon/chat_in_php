<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include("includes/header.php"); ?>

  
 <?php if(!empty($message)) {echo "<p class=\"error\">".
 "MESSAGE: ".$message."</p>";} ?>
<div id="welcome">	
	<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	 
	 <?php
	         /// TEXTAREA ///
       $db=mysqli_connect("localhost","root","","connect");
         $in1=$_POST['searchtext'];
	 
	   ?>
		 <?php
		    /// PRINT SEARCH TEXTAREA /// 
		$db=mysql_connect("localhost","root");
	  mysql_select_db("connect", $db);
	  
	   $result = mysql_query("SELECT * FROM usertbl WHERE username  RLIKE '$in1';");
	   
	   while($myrow = mysql_fetch_array($result))
	   {
	    echo $myrow['id'].'&nbsp &nbsp; ';  echo $myrow['username'].'<br>';
		
	   }
	  ?>
	  
	<div class="container mregister">
            <div id="login">
	<form name="loginform" id="loginform" action="" method="post">
	<input type="text" name="searchtext" id="" class="input" size="32">
	<input type="submit" name="query" id="" class="button" value="Поиск">
	</form>
	</div>
   </div>
</div>
	
	 <?php 
	  // =========== date month year ================== //
	   $today  = date ("d-m-Y");
	  // $today_time = time ("Clock-minuts-seconds");
	   ?>
	    <?php 
		 echo $today;
		 //echo $today_time;
		?>
<?php include("includes/footer.php"); ?>
	

<?php
	}
?>