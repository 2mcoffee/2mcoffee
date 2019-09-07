<?php include './include/header.php'; ?>
<body>
<?php include './include/hamburger.php'; ?>
<table class="content">
    <tr>
        <td class="bar">
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
                <img src="./icons/facebook.png" alt="facebook"> <a href="http://fb.me/2mcoffee" target="_blank">@2mcoffee</a> 
                <br>
                <img src="./icons/instagram.png" alt="instagram"> <a href="http://instagr.am/2mcoffee" target="_blank">@2mcoffee</a> 
                <br>
                <img src="./icons/twitter.png" alt="twitter"> <a href="http://twitter.com/2mcoffee" target="_blank">@2mcoffee</a>
                <br>
                <img src="./icons/github.png" alt="github"> <a href="http://github.com/2mcoffee" target="_blank">@2mcoffee</a>
             </div>
            <br>
            <div class="release">
            <?php include './include/release.php'; ?>
                <br>
                <br>
                <a href="http://github.com/2mcoffee/2mcoffee" class="button bouncy" target="_blank">Source Code</a>
            </div>
        </td>
        <td style="width:80%;">
            <br>
            <br>
            <?php
            $servername = "localhost";
            $username = "elbaulde_short";
            $password = "P@l!7o02";
            $dbname = "elbaulde_estore";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT short_url as URL, 
            date as Fecha, 
            CASE
                WHEN long_url LIKE '%facebook.com%' THEN 'facebook.png' 
                WHEN long_url LIKE '%instagram.com%' THEN 'instagram.png' 
                WHEN long_url LIKE '%youtube.com%' THEN 'youtube.png' 
                WHEN long_url LIKE '%twitter.com%' THEN 'twitter.png' 
                WHEN long_url LIKE '%spotify.com%' THEN 'spotify.png' 
                WHEN long_url LIKE '%github.com%' THEN 'github.png'
                ELSE 'nulled.png' 
            END as Icono,
            '2mcoffee' as Usuario
            FROM url_shortner
            ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '      <div class="post">'."\n";
                    echo '          Contenido compartido: <a href="'.$row["URL"].'" target="_blank">'.$row["URL"].'</a>'."\n";
                    echo '          <p>'."\n";
                    echo '              Publicado por '.$row["Usuario"].' en <img src="./img/'.$row["Icono"].'" alt="Categoria"> el '.$row["Fecha"]."\n";
                    echo '          </p>'."\n";
                    echo '      </div>'."\n";
                    echo '      <br>'."\n";
                }
            } else {
                echo "0 resultados";
            }

            $conn->close();
            ?>
            <br>
            <div class="license">&copy; <?php echo date("Y"); ?> | Diseño y desarrollo por <a href="http://2mcoffee.com" target="_self">Luciano Alfonsin</a></div>
            <br>
        </td>
    </tr>
</table>
<?php include './include/footer.php'; ?>