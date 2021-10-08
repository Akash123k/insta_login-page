<?php
	$userid = $_POST['userid'];
	$password = $_POST['password'];
	
	if(!empty($userid) ||!empty($password)) {
	  $host="localhost";
	  $dbusername="root";
	  $dbpassword="";
	  $dbname="akash";
	  
	  
	}
		
	$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	
	
	
	
	if($conn->connect_error()) {
	  die('Cnnect.Error ('.mysqli_Comment_errno ().')'.mysqli_connect_error ()) ;
	}
	
	
	
	else { $SELECT= "userid from akash were userid=? Limit=1";
		$INSERT= "INSERT into akash(userid,password) values(?, ?)";
		
		$smt= $conn->prepare($SELECT);
		$stmt->bind_param("s", $userid);
		$stmt->execute();
		$stmt->bind_result($userid);
		$stmt->store_result();
		$rnum= $stmt->num_rows();
		
		if ($rnum==0)
		{ $stmt->close();
		  $smt= $conn->prepare($INSERT);
		  $stmt->bind_param("ss" ,$userid,$password);
		  $stmt->exicute();
		  echo "resistration successful";
		}else{
		  echo "already exist";
		}
		
		$stmt->close();
		$conn->close();
	}
	
	
?>