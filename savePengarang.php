<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$address=$_POST['address'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$id=$_POST['id'];
	$cmd='';
	
	$getPengarang = mysql_query("select * from pengarang where id_pengarang = '$kode' limit 1");
	
	if(mysql_num_rows($getPengarang)==1){
		$query=mysql_query("update pengarang set nama_pengarang='$nama', email='$email', telp='$telp', alamat='$address' 
		where id_pengarang='$kode'");
		$cmd='update pengarang ';
	} else {
		$query=mysql_query("insert into pengarang values('$kode','$nama','$email','$telp','$address')");
		$cmd='simpan pengarang ';
	}
	if($query){
		echo $cmd."success<br>";
	} else {
		echo $cmd."gagal<br>";
	}
	//header('location:index.php?pg=penerbit&admin=$admin');
?>
