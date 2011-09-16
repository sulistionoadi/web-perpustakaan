<html>
<head>
<title>Register</title>
</head>
<body>
<div id="register">
<table width="400" align="center" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="exeregister.php" target="content" enctype="multipart/form-data">
<tr valign="center">
<td align="left">Username</td>
<td align="center">:</td>
<td ><input type="text" name="username"><? echo"**"?></td>
</tr>

<tr valign="center">
<td align="left">Password</td>
<td align="center">:</td>
<td ><input name="password" type="password" value="" maxlength="8"><? echo"** max 8 katakter"?></td>
</tr>

<tr valign="center">
<td align="left">Nama</td>
<td align="center">:</td>
<td ><input type="text" name="name"></td>
</tr>

<tr valign="center">
<td align="left">Sex</td>
<td align="center">:</td>
<td >
	<select name="sex">
	<option value="L">L</option>
	<option value="L">P</option>
	</select>
</td>
</tr>

<tr valign="center">
<td align="left">Telepon</td>
<td align="center">:</td>
<td ><input type="text" name="telp"></td>
</tr>

<tr valign="center">
<td align="left">Alamat</td>
<td align="center">:</td>
<td ><input type="text" name="alamat"></td>
</tr>

<tr valign="center">
<td align="left">Email</td>
<td align="center">:</td>
<td ><input type="text" name="mail"></td>
</tr>

<tr valign="center">
<td align="left">Foto</td>
<td align="center">:</td>
<td ><input type="file" name="file" id="file"></td>
</tr>

<tr valign="top">
<td align="left">Deskripsi</td>
<td align="center">:</td>
<td ><textarea cols="35" rows="8" name="description"></textarea></td>
</tr>

<tr valign="top">
<td align="center" colspan="3">
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
</td>
</tr>
	<?
		$tglentry=date("Y-m-d");
		echo "<input type=hidden name=tglentry value=$tglentry>";
	?>
<tr>
<td colspan="3"><iframe width="100%" name="content" height="100" frameborder="0" scrolling="auto"></iframe></td>
</tr>
</form>
</table>
</div>
</body>
</html>
