<?php

    $msg = $_POST['twpost'];

    include "twitter.class.php";

    $consumerKey = "26hvjd5sd6J177YZLc537Q8xL";
    $consumerSecret = "rwjRHrqGcU1gxClr9r6MJKoQ2HGc4HUD0gGfaU22krFZg01eOk";
    $accessToken = "873672000-ZaWCMBCL2fM7di929rsjmEVPsPZB1kg16dtas82J";
    $accessTokenSecret = "KiPcoPApqQntQLXYx199rztkfgyE4SK4dVJVlZs88heY9";
    
    $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
    
    $twitter->send($msg.' - tweet publicado desde http://2mcoffee.com');
    
?>
<script language="JavaScript" type="text/javascript">
        setTimeout("window.history.go(-1)",100);
</script>