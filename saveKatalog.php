<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$cmd='';
	
	$getKatalog = mysql_query("select * from katalog where id_katalog = '$kode' limit 1");
		
	if(mysql_num_rows($getKatalog)==1){
		$query=mysql_query("update katalog set nama='$nama' where id_katalog='$kode'");
		$cmd='update katalog ';
	} else {
		$query=mysql_query("insert into katalog values ('$kode','$nama')");
		$cmd='simpan katalog ';
	}
	if($query){
		echo $cmd."success<br>";
	} else {
		echo $cmd."failed<br>";
	}
	//header('location:index.php?pg=penerbit&admin=$admin');
?>
