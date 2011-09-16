<?php
	include 'koneksi.php';
	$keyword=$_POST[keyword];
	$query = mysql_query("select b.isbn, b.judul, b.tahun, pn.nama_penerbit, pg.nama_pengarang, kg.nama from buku b 
				inner join penerbit pn on pn.id_penerbit=b.id_penerbit inner join pengarang pg on pg.id_pengarang=b.id_pengarang 
				inner join katalog kg on kg.id_katalog=b.id_katalog where judul like '$keyword%'");
	$jumlah=mysql_num_rows($query);
	
	echo "<center>Data Buku Yang Dicari</center>";
	 echo "Jumlah Buku : $jumlah";  
	 
 echo "<br><br>";

echo "<table border = 1 cellpadding=0 cellspacing=0 align=left width=550 style=\"font-family:arial;color:black;font-size:10px;\">
<tr>

<th>ISBN</th>
<th>JUDUL</th>
<th>TAHUN</th>
<th>PENERBIT</th>
<th>PENGARANG</th>
<th>KATALOG</th>

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
echo "</td></tr>";
}
echo "</table>";

?>
