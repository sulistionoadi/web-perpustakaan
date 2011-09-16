<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$isbn=$_POST['isbn'];
	$judul=$_POST['judul'];
	$tahun=$_POST['tahun'];
	$pengarang=$_POST['pengarang'];
	$penerbit=$_POST['penerbit'];
	$katalog=$_POST['katalog'];
	$cmd='';
	
	if($pengarang=='' || $penerbit=='' || $katalog==''){
		if($pengarang==''){
			echo "Pengarang harus dipilih<br>";
		}
		if($penerbit==''){
			echo "Penerbit harus dipilih<br>";
		}
		if($katalog==''){
			echo "Katalog harus dipilih<br>";
		}
	} else {
		$getBuku = mysql_query("select * from buku where isbn = '$isbn' limit 1");
			
		if(mysql_num_rows($getBuku)==1){
			$query=mysql_query("update buku set judul='$judul', tahun='$tahun', id_penerbit='$penerbit', id_pengarang='$pengarang', 
			id_katalog='$katalog' where isbn='$isbn'");
			$cmd='update buku ';
		} else {
			$query=mysql_query("insert into buku values ('$isbn','$judul','$tahun','$penerbit','$pengarang','$katalog','')");
			$cmd='simpan buku ';
		}
		if($query){
			echo $cmd."success<br>";
		} else {
			echo $cmd."failed<br>";
		}
		//header('location:index.php?pg=penerbit&admin=$admin');
	}
?>
