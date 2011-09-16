<?
	include 'koneksi.php';
	
	session_start();
	$admin=$_GET['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2]) && $row[3]="ADM"){
				$idBuku = $_GET['idBuku'];
				$select_buku=mysql_query("select * from buku where isbn='$idBuku'");
				$dtBuku=mysql_fetch_array($select_buku);
			}else {
				header('location:index.php?pg=notadmin');
			}
		} else {
			header('location:index.php?pg=sessionFailed');
		}
	}
	
	
?>
<html>
<head>
<title>Form Update Stok</title>
</head>
<body>

<table width="400" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="updateStok.php" target="thetarget">
<tr valign="center">
<td align="left">ISBN</td>
<td align="center">:</td>
<td ><input type="text" name="isbn" maxlength="25" <? if(mysql_num_rows($select_buku)==1) echo "value=$dtBuku[0]";?>></td>
</tr>

<tr valign="center">
<td align="left">JUDUL</td>
<td align="center">:</td>
<td ><input type="text" name="judul" value="<? if(mysql_num_rows($select_buku)==1) echo $dtBuku[1];?>" ></td>
</tr>

<tr valign="center">
<td align="left">STOK</td>
<td align="center">:</td>
<td ><input type="text" name="stok" value="<? if(mysql_num_rows($select_buku)==1) echo $dtBuku[6];?>"></td>
</tr>

<tr valign="top">
<td align="center" colspan="3">
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
	<input type="hidden" name="admin" value=<? echo $admin;?>>
</td>

</tr>
<tr>
<td colspan="3"><iframe width="100%" name="thetarget" height="100" frameborder="0" scrolling="auto"></iframe></td>
</tr>
</form>

</body>
</html>
