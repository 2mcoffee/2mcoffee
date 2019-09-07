<br>
            <br>
            <div class="title">
                <h1>@2mcoffee</h1>
                <span>Otro inútil experimento</span>
            </div>
            <br>
            <br>
            <div class="user">
                <?php
                    $json_string = 'https://api.instagram.com/v1/users/1996905208?access_token=1996905208.ed896b3.e11366fd165e4090882cbb85c75c564d';
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
                <img src="../icons/facebook.png" alt="facebook"> <a href="http://fb.me/2mcoffee" target="_blank">@2mcoffee</a> 
                <br>
                <img src="../icons/instagram.png" alt="instagram"> <a href="http://instagr.am/2mcoffee" target="_blank">@2mcoffee</a> 
                <br>
                <img src="../icons/twitter.png" alt="twitter"> <a href="http://twitter.com/2mcoffee" target="_blank">@2mcoffee</a>
                <br>
                <img src="../icons/github.png" alt="github"> <a href="http://github.com/2mcoffee" target="_blank">@2mcoffee</a>
             </div>
            <br>
            <div class="release">
            <?php include 'release.php'; ?>
                <br>
                <br>
                <a href="http://github.com/2mcoffee/2mcoffee" class="button bouncy" target="_blank">Source Code</a>
            </div>
            