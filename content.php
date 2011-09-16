<?
	$admin=$_GET['admin'];
?>
<html>
<head></head>
<body onload="submitForm()">

<?
	$pg=$_GET['pg'];
		switch($pg){
			case 'home':
				echo "<form method=POST target=content action=home.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				//include 'home.php';
				break;
			case 'register':
				//include 'register.php';
				echo "<form method=POST target=content action=register.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
			case 'viewbook':
				//include 'viewbook.php';
				echo "<form method=POST target=content action=viewbook.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
			case 'login':
				//include 'login.php';
				echo "<form method=POST target=content action=login.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
			case 'cari':
				//include 'searching.php';
				echo "<form method=POST target=content action=searching.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
			case 'logout':
				//include 'logout.php';
				echo "<form method=POST target=content action=logout.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
			case 'profile':
				//include 'profile.php';
				echo "<form method=POST target=content action=profile.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
			default:
				//include 'login.php';
				echo "<form method=POST target=content action=login.php name=contentForm id=contentForm>
						<input type=hidden name=admin id=admin value=$admin>
						</form>";
				break;
		}
?><script type='text/javascript'>document.contentForm.submit();</script></body></html>
