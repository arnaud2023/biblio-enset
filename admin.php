<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	
}
$aid=mysqli_real_escape_string($set,$_POST['aid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($aid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=md5($pass);
	$sql=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:adminhome.php");
	}
	else
	{
		$msg="Les coordonnés saisi sont incorrect";
	}
}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion de Bibliothèque</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Application de Gestion de Bibliothèque</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">ECOLE SUPERIEUR DE TECHNOLOGIE</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Identification Admin</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Nom d'utilisateur: </td><td><input type="text" name="aid" class="fields" size="25" placeholder="Entrer le nom d'utilisateur" required="required" /></td></tr>
<tr><td class="labels">Mot de passe : </td><td><input type="password" name="pass" class="fields" size="25" placeholder="Entrer mot de passe " required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Identification" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link">Page d'Acceuil</a>
<br />
<br />

</div>
</div>
</body>
</html>