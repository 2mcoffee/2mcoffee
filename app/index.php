<?php
	include("config.php");
	include("function.php");
	
	
	$msg = "";
	
if(isset($_GET['r']) || !empty($_GET['r']))
{
	$url_id = $_GET['r'];

	// Checking database if the the URL keyword is in it or not.
	// If query is true it will redirect to long URL.
	// Otherwise it will redirect to index.php ( our home page )
	
	$sql = "SELECT long_url FROM url_shortner WHERE url_id = '$url_id'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 1)
	{
		$l_url = $row['long_url'];
		header('Location:' .$l_url);
	}
	else
	{
		header('Location: index.php');
	}
}


	
if(isset($_POST["submit"]))	
{
	// Checking database if the the Long URL already exist or not.
	// If result is true it will show message that this URL already exit.
	// Otherwise it will add to database and you will get a short URL.
	
	$long_url = $_POST["long_url"];
	$long_url = mysqli_real_escape_string($db, $long_url);
	
	$sql="SELECT long_url FROM url_shortner WHERE long_url = '$long_url'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 0)
	{
		// URL Validation
		if (!filter_var($_POST['long_url'], FILTER_VALIDATE_URL) === false) 
		{
			$url_id = generateRandomString();
			$short_url = $site . "/" . $url_id;
			
			
			$query = mysqli_query($db, "INSERT url_shortner (url_id, long_url, short_url) VALUES ('$url_id','$long_url','$short_url')");
			
			if($query)
			{
				$msg = "<b>La nueva url es</b>: <a href='".$short_url."'>$short_url</a>";
			}
			else
			{
				$msg = "Ups! Tenemos un problema.";
			}
		} 
		else 
		{
			$msg = $_POST['long_url'] ."no es una url valida.";
		}
	}
	else
	{
		$msg = "Fuck! Esa url ya esta guardada en nuestros registros.";
	}
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>2mcoffee URL Shortener</title>

<!--Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Manjari&display=swap" rel="stylesheet">

<style>
body
{
}

.inputBox
{
	width:300px;
	padding:10px;
	font-size:17px;
	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
}
.button
{
	padding:10px;
	color:#FFFFFF;
	background-color:#FF4162;
	border:0;
	font-size:17px;
	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
}
.msg
{
	font-size:17px;
	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
}
.msg a {
	text-decoration: none;
	color:#00ABA9;
}
.outer {
    display: table;
    position: absolute;
    height: 45%;
    width: 99%;
	text-align:center;
}

.middle {
    display: table-cell;
    vertical-align: middle;
}
.title {
	margin:0 auto;
	width:500px; 
	text-align:center;
	font-family:'Press Start 2P';
}
.title h1 {
	margin: 0;
}
.title span {
	font-size:10px;
	color:#1BA1E2;
}
.license {
	text-align:center;
	font-size:13px;
	font-family: 'Manjari', sans-serif;
}
.license a {
	text-decoration:none;
	color:#A200FF;
}
.networks {
	text-align:center;
	font-family:'Press Start 2P';
	font-size:9px;
}
.networks img {
	border:0;
	vertical-align:middle;
}
.networks a {
	text-decoration: none;
	color:#F8C113;
}
.networks a:hover {
	color: #00ABA9;
}
</style>
</head>

<body>
<br>
<br>
<div class="title">
	<h1>@2mcoffee</h1>
	<span>Otro experimento usando IA</span>
</div>
<div class="outer">
<div class="middle">
<form method="post">
	<input type="url" name="long_url" class="inputBox" required>
    <input type="submit" name="submit" class="button" value="Chiqi Chiqi!" >
</form>
<h2 class="msg"><?php echo $msg;?></h2>
<br>
<br>
<div class="networks"><img src="./icons/facebook.png" alt="facebook"> <a href="http://fb.me/2mcoffee" target="_blank">@2mcoffee</a> <img src="./icons/instagram.png" alt="instagram"> <a href="http://instagr.am/2mcoffee" target="_blank">@2mcoffee</a> <img src="./icons/twitter.png" alt="twitter"> <a href="http://twitter.com/2mcoffee" target="_blank">@2mcoffee</a> </div>
<br>
<br>
<div class="license"><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Hey, no te copies!</a>.</div>
</div>
</div>
</body>

</html>
