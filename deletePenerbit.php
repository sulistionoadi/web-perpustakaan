<?
	session_start();
	include 'koneksi.php';
	$admin=$_GET['admin'];
	$kode=$_GET['idPenerbit'];
	
	if($kode!=''){
		$query=mysql_query("delete from penerbit where id_penerbit='$kode'");
	} else {
		echo "KODE TIDAK BOLEH NULL !!!<br>";
	}
	if($query){
		echo "delete success<br>";
	} else {
		echo "delete failed<br>";
	}
	echo "<a href=index.php?pg=penerbit&admin=$admin>go to list penerbit</a>";
	//echo $admin;
?>
