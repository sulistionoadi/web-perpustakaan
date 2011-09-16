<?
	session_start();
	include 'koneksi.php';
	$admin = $_POST['admin'];
	$count=$_POST['count'];
	$idAnggota=$_POST['id_anggota'];
	$tglPinjam=$_POST['tglPinjam'];
	$tglKembali=$_POST['tglKembali'];
	$cmd='';
	
	//save headernya dulu
	$saveHeader = mysql_query("insert into peminjaman values('','$idAnggota','$tglPinjam','$tglKembali')");
	if($saveHeader){
		//jika header berhasil maka mulai save detail
		//cari dulu header yang tadi di save pastinya ada direcord terakhir
		//makanya di sort desc
		
		echo "header saved<br>";
		$getHeader = mysql_query("select * from peminjaman order by id_pinjam desc limit 1");
		$dtHeader = mysql_fetch_array($getHeader);
		$idHeader = $dtHeader[0];
		
		for($i=0;$i<$count;$i++){
			$isbn = $_POST['isbn'.$i];
			$qty = $_POST['jml'.$i];
			$saveDetail = mysql_query("insert into detail_peminjaman values('$idHeader','$isbn','$qty')");
			
			//save detailnya satu2
			//jika ada error atau gagal hapus detail dan headernya.
			if($saveDetail){
				echo "detail ke-".$i." saved<br>";
			} else{
				echo "save detail failed roolback all data<br>";
				mysql_query("delete from detail_peminjaman where id_pinjam = '$idHeader'");
				mysql_query("delete from peminjaman where id_pinjam = '$idHeader'");
			}
		}
	} else {
		echo "save header failed<br>";
	}
?>

