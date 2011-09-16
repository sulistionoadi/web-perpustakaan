<?
	session_start();
	include 'koneksi.php';
	$admin=$_GET['admin'];
	$kode=$_GET['idKatalog'];
	
	if($kode!=''){
		$query=mysql_query("delete from katalog where id_katalog='$kode'");
	} else {
		echo "KODE TIDAK BOLEH NULL !!!<br>";
	}
	if($query){
		echo "delete success<br>";
	} else {
		echo "delete failed<br>";
	}
	echo "<a href=index.php?pg=katalog&admin=$admin>go to list katalog</a>";
	//echo $admin;
?>
