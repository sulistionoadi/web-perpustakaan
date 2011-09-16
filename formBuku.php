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
<title>Form Buku</title>
</head>
<body>

<table width="400" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="saveBuku.php" target="thetarget">
<tr valign="center">
<td align="left">ISBN</td>
<td align="center">:</td>
<td ><input type="text" name="isbn" maxlength="25" <? if(mysql_num_rows($select_buku)==1) echo "value=$dtBuku[0]";?>></td>
</tr>

<tr valign="center">
<td align="left">JUDUL</td>
<td align="center">:</td>
<td ><input type="text" name="judul" value="<? if(mysql_num_rows($select_buku)==1) echo $dtBuku[1];?>"></td>
</tr>

<tr valign="center">
<td align="left">TAHUN</td>
<td align="center">:</td>
<td ><input type="text" name="tahun" value="<? if(mysql_num_rows($select_buku)==1) echo $dtBuku[2];?>"></td>
</tr>

<tr valign="center">
<td align="left">PENERBIT</td>
<td align="center">:</td>
<td >
	<select name="penerbit">
	<option value='' >--[pilih]--</option>
	<?
		$penerbit=mysql_query("select * from penerbit");
		while($p=mysql_fetch_array($penerbit)){
			if($p[0]==$dtBuku[3]){
				$selected='selected=selected';
			} else {
				$selected='';
			}
			echo "<option value=$p[0] $selected>$p[1]</option>";
		}
	?>
	</select>
</td>
</tr>

<tr valign="center">
<td align="left">PENGARANG</td>
<td align="center">:</td>
<td >
	<select name="pengarang">
	<option value='' >--[pilih]--</option>
	<?
		$pengarang=mysql_query("select * from pengarang");
		while($w=mysql_fetch_array($pengarang)){
			if($w[0]==$dtBuku[4]){
				$selected='selected=selected';
			} else {
				$selected='';
			}
			echo "<option value=$w[0] $selected>$w[1]</option>";
		}
	?>
	</select>
</td>
</tr>

<tr valign="center">
<td align="left">KATALOG</td>
<td align="center">:</td>
<td >
	<select name="katalog">
	<option value='' >--[pilih]--</option>
	<?
		$katalog=mysql_query("select * from katalog");
		while($k=mysql_fetch_array($katalog)){
			if($k[0]==$dtBuku[5]){
				$selected='selected=selected';
			} else {
				$selected='';
			}
			echo "<option value=$k[0] $selected>$k[1]</option>";
		}
	?>
	</select>
</td>
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
