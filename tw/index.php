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
            <div class="send">
                <h1 style="font-family:'Press Start 2P';">Let's tweet!</h1>
            </div>
            <br>
            <br>
            <div class="read"> 
                <br>
                <div class="twitter">Twitter <span>@USERNAME</span></div> <!--Insert your twitter username in this line-->
                <br>
                <?php

                    include "../include/twitter.class.php";

                    $consumerKey = "C_KEY"; // Twitter consumer key
                    $consumerSecret = "C_SECRET"; // Twitter consumer secret
                    $accessToken = "A_TOKEN";  // Twitter access token
                    $accessTokenSecret = "A_SECRET"; // Twitter access token secret
        
                    $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
        
                    $statuses = $twitter->load(Twitter::ME);

                    $media_url = $result->entities->media[0]->media_url;
                    
                    foreach ($statuses as $status) {
                        echo '                '.Twitter::clickable($status)."\n";
                        echo '                <p>Publicado el '.$status->created_at.' por '.$status->user->name.'</p>'."\n";
                        if (strlen($status->entities->media[0]->media_url)>0) {
                            echo '                <p><a href="'.$status->entities->media[0]->media_url.'" target="_blank"><img src="'.$status->entities->media[0]->media_url.'" alt="2mcoffee" style="max-width: 240px;border:0px;"></a></p>'."\n";
                        }
                        echo '                <br>'."\n";
                    }

                ?>
            </div>
            <br>
            <?php include '../include/license.php'; ?>
            <br>
        </td>
    </tr>
</table>
<?php include '../include/footer.php'; ?>