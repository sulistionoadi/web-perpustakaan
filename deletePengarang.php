<?
	session_start();
	include 'koneksi.php';
	$admin=$_GET['admin'];
	$kode=$_GET['idPengarang'];
	
	if($kode!=''){
		$query=mysql_query("delete from pengarang where id_pengarang='$kode'");
	} else {
		echo "KODE TIDAK BOLEH NULL !!!<br>";
	}
	if($query){
		echo "delete success<br>";
	} else {
		echo "delete failed<br>";
	}
	echo "<a href=index.php?pg=pengarang&admin=$admin>go to list pengarang</a>";
	//echo $admin;
?>
