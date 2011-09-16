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
	
	$getPenerbit = mysql_query("select * from penerbit where id_penerbit = '$kode' limit 1");
		
	if(mysql_num_rows($getPenerbit)==1){
		$query=mysql_query("update penerbit set nama_penerbit='$nama', email='$email', telp='$telp', alamat='$address' 
		where id_penerbit='$kode'");
		$cmd='update penerbit ';
	} else {
		$query=mysql_query("insert into penerbit values ('$kode','$nama','$email','$telp','$address')");
		$cmd='simpan penerbit ';
	}
	if($query){
		echo $cmd."success<br>";
	} else {
		echo $cmd."failed<br>";
	}
	//header('location:index.php?pg=penerbit&admin=$admin');
?>
