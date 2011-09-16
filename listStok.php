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
				$query = mysql_query("select b.isbn, b.judul, b.qty_stok from buku b");
			}else {
				header('location:index.php?pg=notadmin');
			}
		} else {
			header('location:index.php?pg=sessionFailed');
		}
	}
	
	echo "Stok Buku</center><br><br>";

echo "<table border = 1 cellpadding=0 cellspacing=0 align=left width=300 style=\"font-family:arial;color:black;font-size:10px;\">
<tr>

<th>ISBN</th>
<th>JUDUL</th>
<th>QTY</th></th>

</tr>";
while ($p=mysql_fetch_array($query))
{
echo "<tr><td>";

echo $p[0];
echo "</td><td>";
echo $p[1];
echo "</td><td>";
echo "<a href=index.php?pg=formUpdateStok&admin=$admin&idBuku=$p[0]>$p[2]</a>";
echo "</td></tr>";

}

echo "</table>";

?>
