<?php 
    
    require_once('./include/header.php');
    require_once('./include/main.php'); 

    //Add here your database connection data
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
                
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
                
    else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

    $realip="'".$ip_address."'";

    //Add here your token from ipinfo.io
    $url="'".'http://ipinfo.io/'.$ip_address.'?token=[TOKEN]'."'";

    $sql = "INSERT INTO visitors (ip,url) VALUES ($realip,$url)";
                
    $conn->query($sql);

    $conn->close();

    require_once('./include/footer.php'); 
    
?>