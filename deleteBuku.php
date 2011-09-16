<?
	session_start();
	include 'koneksi.php';
	$admin=$_GET['admin'];
	$kode=$_GET['idBuku'];
	
	if($kode!=''){
		$query=mysql_query("delete from buku where isbn='$kode'");
	} else {
		echo "KODE TIDAK BOLEH NULL !!!<br>";
	}
	if($query){
		echo "delete success<br>";
	} else {
		echo "delete failed<br>";
	}
	echo "<a href=index.php?pg=buku&admin=$admin>go to list buku</a>";
	//echo $admin;
?>
