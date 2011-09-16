<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$maxLamaPinjam=$_POST['maxLamaPinjam'];
	$dendaPerHari=$_POST['dendaPerHari'];
	$id=$_POST['id'];
	
	$query=mysql_query("update config set maxLamaPinjam=$maxLamaPinjam, dendaPerHari=$dendaPerHari where id=$id");
	if($query){
		echo "update config success<br>";
	} else {
		echo "update config failed<br>";
	}
	//header('location:index.php?pg=penerbit&admin=$admin');
?>
