<?php
	include 'koneksi.php';
	
	session_start();
	$admin=$_GET['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2]) && $row[3]="ANG"){
				$query = mysql_query("select p.id_pinjam, a.nama, p.tgl_pinjam, p.tgl_kembali from peminjaman p inner join anggota a on a.id_anggota=p.id_anggota 
				where p.id_pinjam not in (select id_pinjam from pengembalian)");
			}else {
				header('location:index.php?pg=notmember');
			}
		} else {
			header('location:index.php?pg=sessionFailed');
		}
	}
	
	echo "Daftar Peminjaman</center><br><br>";

echo "<table border = 1 cellpadding=0 cellspacing=0 align=left width=550 style=\"font-family:arial;color:black;font-size:10px;\">
<tr>

<th>ID PINJAM</th>
<th>NAMA ANGGOTA</th>
<th>TGL PINJAM</th>
<th colspan=1>ACTION</th>

</tr>";
while ($p=mysql_fetch_array($query))
{
echo "<tr><td align=center>";
echo $p[0];
echo "</td><td align=center>";
echo $p[1];
echo "</td><td align=center>";
echo $p[2];
echo "</td><td align=center>";
echo "<a href=index.php?pg=formPengembalian&admin=$admin&idPinjam=$p[0]&tglKembali=$p[3]>kembali</a>";
echo "</td></tr>";

}

echo "</table>";

?>
