<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$stok=$_POST['stok'];
	$id=$_POST['isbn'];
	
	$query=mysql_query("update buku set qty_stok='$stok' where isbn='$id'");
	if($query){
		echo "update stok success<br>";
	} else {
		echo "update stok failed<br>";
	}
	//header('location:index.php?pg=penerbit&admin=$admin');
?>
