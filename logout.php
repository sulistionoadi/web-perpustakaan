<?
	include 'koneksi.php';
	session_start();
	/*$admin=$_POST['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2])){
				session_destroy();
				header("location:index.php");
			}
		}
	}*/
	session_destroy();
	header("location:index.php");
?>
