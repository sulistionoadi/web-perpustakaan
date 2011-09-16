<?
	include 'koneksi.php';
	
	session_start();
	$admin=$_GET['admin'];
		
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2]) && $row[3]="ANG"){
				$count = $_POST['txtCount'];
				$count = $count + 1;
			}else {
				header('location:index.php?pg=notmember');
			}
		} else {
			header('location:index.php?pg=sessionFailed');
		}
	}
	
	
?>
<html>
<head>
<title>Form Peminjaman</title>
</head>
<body>

<table width="400" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<tr valign="center">
<td align="left" colspan="3">
	<form method="POST" action="" target="_self">
		<input type="submit" value="add_detail" name="add" / >
		<input type="hidden" value="<? echo $admin;?>" name="admin" / >
		<input type="hidden" value="<? echo $count;?>" name="txtCount" / >
	</form>
</td>
</tr>
<form method="post" action="savePeminjaman.php" target="thetarget">
<tr valign="center">
<td align="left" width="80">ANGGOTA</td>
<td align="center">:</td>
<?
	$Qanggota=mysql_query("select * from anggota where id_admin='$admin'");
	$anggota = mysql_fetch_array($Qanggota);
?>

<td >
	<? echo $anggota[2];?><input type="hidden" name="id_anggota" value="<? echo $anggota[0];?>">
</td>
</tr>

<?
	$tglPinjam = date("Y-m-d");
	$config = mysql_query("select * from config");
	$dtConfig = mysql_fetch_array($config);
	
	$dateMax = mktime(0,0,0, date("m"), date("d")+$dtConfig[1], date("Y"));
	$tglKembali = date("Y-m-d", $dateMax);
?>

<tr valign="center">
<td align="left" width="80">TGL PINJAM</td>
<td align="center">:</td>
<td ><input type="hidden" name="tglPinjam" value="<? echo $tglPinjam; ?>"><? echo $tglPinjam; ?></td>
</tr>

<tr valign="center">
<td align="left" width="80">TGL KEMBALI</td>
<td align="center">:</td>
<td ><input type="hidden" name="tglKembali" value="<? echo $tglKembali;?>"><? echo $tglKembali;?></td>
</tr>

<tr valign="center">
<td align="left" colspan="3">
 <table align="left" border="1" cellpadding="2" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
 <?
	for($i=0;$i<$count;$i++){
		echo "<tr><td>";
		echo "<select name=isbn$i >";
			$buku=mysql_query("select * from buku");
			while($w=mysql_fetch_array($buku)){
				echo "<option value=$w[0]>$w[1]</option>";
			}
		echo "</select>";
		echo "</td><td width=20>";
		echo "<input type=hidden value=1 name=jml$i />1";
		echo "</td></tr>";
	}
 ?>
 </table>
</td>
</tr>


<tr valign="top">
<td align="center" colspan="3">
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
	<input type="hidden" name="admin" value=<? echo $admin;?>>
	<input type="hidden" name="count" value=<? echo $count;?>>
</td>

</tr>
<tr>
<td colspan="3"><iframe width="100%" name="thetarget" height="100" frameborder="0" scrolling="auto"></iframe></td>
</tr>
</form>

</body>
</html>
