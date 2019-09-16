<br>
            <br>
            <div class="title">
                <h1>@Username</h1> <!--Complete here with your username-->
                <span>Site Slogan</span> <!--Complete here with your slogan-->
            </div>
            <br>
            <br>
            <div class="user">
                <?php
                    $json_string = 'https://api.instagram.com/v1/users/1996905208?access_token=ACCESS_TOKEN'; //IG Access Token
                    $jsondata = file_get_contents($json_string);
                    $obj = json_decode($jsondata,true);
                    $pic = $obj['data']['profile_picture'];
                    $bio = $obj['data']['bio'];
                    echo '<img src="'.$pic.'" alt="Profile">'."\n";
                    echo '                <br>'."\n";
                    echo '                <br>'."\n";
                    echo '                '.$bio."\n";
                ?>
            </div>
            <br>
            <br>
            <div class="networks">
                <!--Complete the following links with your own username-->
                <img src="../icons/facebook.png" alt="facebook"> <a href="http://fb.me/Username" target="_blank">@Username</a> 
                <br>
                <img src="../icons/instagram.png" alt="instagram"> <a href="http://instagr.am/Username" target="_blank">@Username</a> 
                <br>
                <img src="../icons/twitter.png" alt="twitter"> <a href="http://twitter.com/Username" target="_blank">@Username</a>
                <br>
                <img src="../icons/github.png" alt="github"> <a href="http://github.com/Username" target="_blank">@Username</a>
             </div>
            <br>
            <div class="release">
            <?php include 'release.php'; ?>
                <br>
                <br>
                <a href="http://github.com/2mcoffee/2mcoffee" class="button bouncy" target="_blank">Source Code</a> <!--Do not remove this line, thanks!-->
            </div>
            