<?php
	include '../include/config.php';
	include '../include/function.php';
	
	$msg = "";
	
if(isset($_GET['r']) || !empty($_GET['r']))
{
	$url_id = $_GET['r'];
	
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
	
	$long_url = $_POST["long_url"];
	$long_url = mysqli_real_escape_string($db, $long_url);
	
	$sql="SELECT long_url FROM url_shortner WHERE long_url = '$long_url'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 0)
	{

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
<?php include '../include/header.php'; ?>
<body>
<?php include '../include/hamburger.php'; ?>
<table class="content">
    <tr>
        <td class="bar">
        <?php include '../include/bar.php'; ?>   
        </td>
        <td style="width:80%;">
            <br>
            <br>
            <div class="outer">
                <div class="middle">
					<h1>URL Trim</h1>
					<br>
					<br>
                    <form method="post">
                        <input type="url" name="long_url" class="inputBox" required>
                        <input type="submit" name="submit" class="cut bouncy" value="Cut it off!" >
					</form>
					<br>
                    <h2 class="msg"><?php echo $msg;?></h2>
					<br>
					<br>
                    <?php include '../include/license.php'; ?>
                    <br>
                </div>
            </div>
        </td>
    </tr>
</table>
<?php include '../include/footer.php'; ?>