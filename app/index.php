<?php 

    require_once('../include/config.php');
    require_once('../include/function.php');
	
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

    require_once('../include/header.php');

?>
<div class="title">
    Favoritos
</div>
<br>
<table class="favs">
<?php

    //Add here your database connection data
	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT short_url as URL, 
        date as Fecha, 
        CASE
            WHEN long_url LIKE '%facebook.com%' THEN 'Facebook' 
            WHEN long_url LIKE '%instagram.com%' THEN 'Instagram' 
            WHEN long_url LIKE '%youtube.com%' OR long_url LIKE '%youtu.be%' THEN 'Youtube' 
            WHEN long_url LIKE '%twitter.com%' THEN 'Twitter' 
            WHEN long_url LIKE '%spotify.com%' THEN 'Spotify' 
            WHEN long_url LIKE '%github.com%' THEN 'Github'
            WHEN long_url LIKE '%photos.app.goo.gl%' THEN 'Photos'
            WHEN long_url LIKE '%byte.co%' THEN 'Byte'
            ELSE 'Web' 
        END as Icono,
        'Luciano Alfonsin' as Usuario,
        CASE 
            WHEN long_url LIKE '%youtube.com%' THEN REPLACE(long_url,'https://www.youtube.com/watch?v=','')
            ELSE ''
        END as thumb
        FROM url_shortner
        WHERE `show` = 1
        ORDER BY date DESC";
    
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

        $i = 0; $trEnd = 0;
		while($row = $result->fetch_assoc()) {
			
			switch($row["Icono"]) {
				case 'Facebook':
                    $logo = '<i class="fab fa-facebook"></i>';
                    break;
				case 'Instagram':
                    $logo = '<i class="fab fa-instagram"></i>';
                    break;
				case 'Youtube':
                    $logo = '<i class="fab fa-youtube"></i>';
                    break;
				case 'Twitter':
                    $logo = '<i class="fab fa-twitter-square"></i>';
                    break;
				case 'Spotify':
                    $logo = '<i class="fab fa-spotify"></i>';
                    break;
				case 'Github':
                    $logo = '<i class="fab fa-github"></i>';
                    break;
				case 'Photos':
                    $logo = '<i class="far fa-image"></i>';
                    break;
				case 'Web':
                    $logo = '<i class="fab fa-chrome"></i>';
                    break;
				case 'Byte':
                    $logo = '<i class="fab fa-vine"></i>';
                    break;
            }
            
            if($i == 0){
                echo '  <tr>'."\n";
            }
            echo '      <td>'."\n";
            echo '          <i class="far fa-calendar-alt"></i> Date: '.$row['Fecha']."\n";
            echo '          <br>'."\n";
            echo '          <i class="fas fa-user"></i> User: '.$row['Usuario']."\n";
            echo '          <br>'."\n";
            echo '          '.$logo.' Category: '.$row['Icono']."\n";
            if (strlen($row["thumb"])>0) {
                echo '          <br>'."\n";
                echo '          <i class="far fa-eye"></i> Preview:'."\n";
                echo '          <br>'."\n";
				echo '          <img src="https://img.youtube.com/vi/'.$row["thumb"].'/hqdefault.jpg" alt="youtube">'."\n";
            }
            echo '          <br>'."\n";
            echo '          <br>'."\n";
            echo '          <a href="'.$row["URL"].'" target="_blank">View more</a>'."\n";
            echo '      </td>'."\n";

            if($i == 2){
                $i = 0; $trEnd = 1;
            }else{
                $trEnd = 0; $i++;
            }
            if($trEnd == 1) {
                echo '  </tr>'."\n";;
            }
        }
            if($trEnd == 0) echo '  </tr>'."\n";;

	} else {
		echo '  <tr><td>No results found.</td></tr>'."\n";
	}

    $conn->close();
    
?>
</table>
<?php 
    require_once('../include/footer.php'); 
?>