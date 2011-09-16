<?php
	include 'koneksi.php';
	
	session_start();
	$admin=$_GET['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2]) && $row[3]="ADM"){
				$query = mysql_query("select b.isbn, b.judul, b.tahun, pn.nama_penerbit, pg.nama_pengarang, kg.nama from buku b 
				inner join penerbit pn on pn.id_penerbit=b.id_penerbit inner join pengarang pg on pg.id_pengarang=b.id_pengarang 
				inner join katalog kg on kg.id_katalog=b.id_katalog");
			}else {
				header('location:index.php?pg=notadmin');
			}
		} else {
			header('location:index.php?pg=sessionFailed');
		}
	}
	
	echo "Daftar Buku</center><br><br>";
	echo "<a href=index.php?pg=formBuku&admin=$admin>add</a>";  
	 
 echo "<br>";

echo "<table border = 1 cellpadding=0 cellspacing=0 align=left width=550 style=\"font-family:arial;color:black;font-size:10px;\">
<tr>

<th>ISBN</th>
<th>JUDUL</th>
<th>TAHUN</th>
<th>PENERBIT</th>
<th>PENGARANG</th>
<th>KATALOG</th>
<th>QTY</th></th>
<th colspan=2>ACTION</th>

</tr>";
while ($p=mysql_fetch_array($query))
{
echo "<tr><td>";

echo $p[0];
echo "</td><td>";
echo $p[1];
echo "</td><td>";
echo $p[2];
echo "</td><td>";
echo $p[3];
echo "</td><td>";
echo $p[4];
echo "</td><td>";
echo $p[5];
echo "</td><td align=center>";
echo "<a href=index.php?pg=formBuku&admin=$admin&idBuku=$p[0]>edit</a>";
echo "</td><td align=center>";
echo "<a href=index.php?pg=deleteBuku&admin=$admin&idBuku=$p[0]>delete</a>";
echo "</td></tr>";

}

echo "</table>";

?>
