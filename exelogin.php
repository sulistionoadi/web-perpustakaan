<? 
	include 'koneksi.php';
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$md_pass=md5($pass);
	
	$sqlAdmin=mysql_query("select * from admin where username='$user' and password='$md_pass'");
	$row=mysql_fetch_array($sqlAdmin);
	$count=mysql_num_rows($sqlAdmin);
		
	if($count==0)
		echo "Username atau password salah";
	else if($row[3]=='ADM'){
		session_register($row[1]);
		session_register($row[2]);
		//session_register(administrator);
		$id=1;
		header("location:index.php?pg=profile&admin=$row[0]");
	} else if($row[3]=='ANG'){
		session_register($row[1]);
		session_register($row[2]);
		//session_register(member);
		$id=2;
		header("location:index.php?pg=profile&admin=$row[0]");
	}
	ob_end_flush();
	
?>
