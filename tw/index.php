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
                <!--<br>
                <form action="./publish.php" method="post" onsubmit="return submitUserForm();">
                    <textarea  minlength="5" maxlength="140" name="twpost" placeholder="Escribir tweet aqui..." required></textarea>
                    <br>
                    <input type="submit" name="submit" class="cut bouncy" value="Send Tweet!">
                    <br>
                    <br>
                    <div class="g-recaptcha" data-sitekey="6LdEdbcUAAAAANsMheFp8MznPCGwARNblEP-Y1BJ" data-callback="verifyCaptcha"></div> 
                    <div id="g-recaptcha-error"></div>                   
                </form>
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <script>
                    function submitUserForm() {
                        var response = grecaptcha.getResponse();
                        if(response.length == 0) {
                            document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:#FE6E41;">Verificar que no eres un robot.</span>';
                            return false;
                        }
                        return true;
                    }
                    
                    function verifyCaptcha() {
                        document.getElementById('g-recaptcha-error').innerHTML = '';
                    }
                </script>-->
            </div>
            <br>
            <br>
            <div class="read"> 
                <br>
                <div class="twitter">Twitter <span>@2mcoffee</span></div>
                <br>
                <?php

                    include "./twitter.class.php";

                    $consumerKey = "26hvjd5sd6J177YZLc537Q8xL";
                    $consumerSecret = "rwjRHrqGcU1gxClr9r6MJKoQ2HGc4HUD0gGfaU22krFZg01eOk";
                    $accessToken = "873672000-ZaWCMBCL2fM7di929rsjmEVPsPZB1kg16dtas82J";
                    $accessTokenSecret = "KiPcoPApqQntQLXYx199rztkfgyE4SK4dVJVlZs88heY9";
        
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