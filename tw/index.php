<?php 
    require_once('../include/header.php');
?>
<div class="title">
    Social Networks
</div>
<br>
<div class="network"><i class="fab fa-instagram"></i> Instagram.</div>
<br>
<table class="ig">
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

	$sql = "SELECT URL, 
            Fecha, 
            Ubicacion
        FROM Instagram
        ORDER BY Fecha DESC, Id ASC
        LIMIT 9";
    
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

        $i = 0; $trEnd = 0;
		while($row = $result->fetch_assoc()) {
            
            if($i == 0){
                echo '  <tr>'."\n";
            }
            echo '      <td>'."\n";
            echo '          <i class="far fa-calendar-alt"></i> Date: '.$row['Fecha']."\n";
            echo '          <br>'."\n";
            echo '          <i class="fas fa-user"></i> User: '."\n"; //Complete with your username
            echo '          <br>'."\n";
            echo '          <i class="fab fa-instagram"></i> Network: Instagram'."\n";
            echo '          <br>'."\n";
            echo '          <i class="far fa-eye"></i> Preview:'."\n";
            echo '          <br>'."\n";            
            echo '          <img src="'.$row["URL"].'" alt="Instagram">'."\n";
            echo '          <br>'."\n";
            echo '          <br>'."\n";
            echo '          <a href="'.$row["URL"].'" target="_blank"><i class="far fa-image"></i> Image</a>  <a href="'.$row['Ubicacion'].'" target="_blank"><i class="fas fa-map-marker-alt"></i> Location</a>'."\n";
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
<br>
<div class="network"><i class="fab fa-twitter"></i> Twitter.</div>
<br>
<table class="tw">
<?php

    include "../include/twitter.class.php";

    //Add here your twitter developer account data
    $consumerKey = "";
    $consumerSecret = "";
    $accessToken = "";
    $accessTokenSecret = "";
        
    $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
        
    $statuses = $twitter->load(Twitter::ME);

    $media_url = $result->entities->media[0]->media_url;
    
    echo '  <tr>'."\n";
    $i = 0;

    foreach ($statuses as $status) {
        $i++;

        
        echo '      <td>'."\n";
        echo '          <span>'.Twitter::clickable($status).'</span>'."\n";
        echo '          <br>'."\n";
        echo '          <br>'."\n";
        echo '          <i class="far fa-calendar-alt"></i> Date: '.$status->created_at."\n";
        echo '          <br>'."\n";
        echo '          <i class="fas fa-user"></i> User: '.$status->user->name."\n";
        echo '          <br>'."\n";
        echo '          <i class="fab fa-twitter"></i> Network: Twitter'."\n";
        if (strlen($status->entities->media[0]->media_url)>0) {
            echo '          <br>'."\n";
            echo '          <i class="far fa-image"></i> Images:'."\n";
            echo '          <br>'."\n";
            echo '<a href="'.$status->entities->media[0]->media_url.'" target="_blank"><img src="'.$status->entities->media[0]->media_url.'" alt="" style="max-width: 200px;max-height:200px;border:0px;"></a>'."\n";
        }
        echo '      </td>'."\n";
        if($i % 2==0) {
        echo '      </tr>'."\n";
        echo '      <tr>'."\n";
        }
    }

    echo '  </tr>'."\n";

?>
</table>
<?php 
    require_once('../include/footer.php'); 
?>