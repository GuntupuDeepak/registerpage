<?php 
	session_start();
	// variable declaration
	$uname = "";
	$uemail    = "";
	$upassword_1="";
	$upassword_2="";
	$utype="";
	$udept="";
	$errors = array(); 
	
	$utypeadmin='unchecked';
	$utypehod='unchecked';
	$utypefaculty='unchecked';
	$utypestudent='unchecked';
	
	$udeptcse='unchecked';
	$udeptit='unchecked';
	$udeptece='unchecked';
	$udepteee='unchecked';
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'miniproject');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$uname = mysqli_real_escape_string($db, $_POST['uname']);
		$uemail = mysqli_real_escape_string($db, $_POST['uemail']);
		$upassword_1 = mysqli_real_escape_string($db, $_POST['upassword_1']);
		$upassword_2 = mysqli_real_escape_string($db, $_POST['upassword_2']);
		$utype= mysqli_real_escape_string($db, $_POST['utype']);
		if($utype=="1")
		{
			$utypeadmin="checked";
			$utype="1";
		}
		if($utype=="2")
		{
			$utypehod="checked";
			$utype="2";
		}
		if($utype=="3")
		{
			$utypefaculty="checked";
			$utype="3";
		}
		if($utype=="4")
		{
			$utypestudent="checked";
			$utype="4";
		}
		$udept= mysqli_real_escape_string($db, $_POST['udept']);
		if($udept=="cse")
		{
			$udeptcse="checked";
			$udept="cse";
		}
		if($udept=="it")
		{
			$udeptit="checked";
			$udept="it";
		}
		if($udept=="ece")
		{
			$udeptece="checked";
			$udept="ece";
		}
		if($udept=="eee")
		{
			$udepteee="checked";
			$udept="eee";
		}
		// form validation: ensure that the form is correctly filled
		if (empty($uname)) { array_push($errors, "Username is required"); }
		if (empty($uemail)) { array_push($errors, "Email is required"); }
		if (empty($upassword_1)) { array_push($errors, "Password is required"); }
		if (empty($utype)) { array_push($errors, "type is required"); }
		if (empty($udept)) { array_push($errors, "department is required"); }

		if ($upassword_1 != $upassword_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//$upassword = md5($upassword_1);//encrypt the password before saving in the database
			$upassword=$upassword_1;
			$query = "INSERT INTO users (uname,upassword,uemail,utype,udept) 
					  VALUES('$uname', '$upassword','$uemail','$utype','$udept')";
			mysqli_query($db, $query);

			$_SESSION['uname'] = $uname;
			$_SESSION['utype']=$utype;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}

	// LOGIN USER
	if (isset($_POST['login'])) {
		$uname = mysqli_real_escape_string($db, $_POST['uname']);
		$upassword = mysqli_real_escape_string($db, $_POST['upassword']);

		if (empty($uname)) {
			array_push($errors, "Username is required");
		}
		if (empty($upassword)) {
			array_push($errors, "Password is required");
		}
		
		if (count($errors) == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM users WHERE uname='$uname' AND upassword='$upassword'";
			$results = mysqli_query($db, $query);
			while($row = mysqli_fetch_array($results)) {
      				$type=$row['utype'];
    				 if($type=='1')
     				{
				header('location:adminpage.php');		
				}
				 if($type=='2')
     				{
				header('location:hod.php');		
				}
				if($type=='3')
     				{
				header('location:faculty.php');		
				}
				if($type=='4')
     				{
				header('location:student.php');		
				}
  			 }	
		}
	}
?>