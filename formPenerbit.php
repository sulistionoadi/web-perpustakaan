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
				$idPenerbit = $_GET['idPenerbit'];
				$select_penerbit=mysql_query("select * from penerbit where id_penerbit='$idPenerbit'");
				$dtPenerbit=mysql_fetch_array($select_penerbit);
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
<title>Form Penerbit</title>
</head>
<body>

<table width="400" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="savePenerbit.php" target="thetarget">
<tr valign="center">
<td align="left">KODE</td>
<td align="center">:</td>
<td ><input type="text" name="kode" maxlength="8" <? if(mysql_num_rows($select_penerbit)==1) echo "value=$dtPenerbit[0]";?>></td>
</tr>

<tr valign="center">
<td align="left">NAMA</td>
<td align="center">:</td>
<td ><input type="text" name="nama" value="<? if(mysql_num_rows($select_penerbit)==1) echo $dtPenerbit[1];?>"></td>
</tr>

<tr valign="center">
<td align="left">ALAMAT</td>
<td align="center">:</td>
<td ><input type="text" name="address" value="<? if(mysql_num_rows($select_penerbit)==1) echo $dtPenerbit[4];?>"></td>
</tr>

<tr valign="center">
<td align="left">EMAIL</td>
<td align="center">:</td>
<td ><input type="text" name="email" value="<? if(mysql_num_rows($select_penerbit)==1) echo $dtPenerbit[2];?>"></td>
</tr>

<tr valign="center">
<td align="left">TELEPON</td>
<td align="center">:</td>
<td ><input type="text" name="telp" value="<? if(mysql_num_rows($select_penerbit)==1) echo $dtPenerbit[3];?>"></td>
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
