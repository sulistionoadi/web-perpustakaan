<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$idPinjam=$_POST['idPinjam'];
	$tglKembali=$_POST['tglKembali'];
	$denda=$_POST['denda'];
	
	$query=mysql_query("insert into pengembalian values ('','$idPinjam','$tglKembali','$denda')");
	
	if($query){
		echo "save pengembalian success<br>";
	} else {
		echo "save pengembalian failed<br>";
	}
	//header('location:index.php?pg=penerbit&admin=$admin');
?>
