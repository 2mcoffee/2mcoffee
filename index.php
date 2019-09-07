<?php include './include/header.php'; ?>
<body>
<?php include './include/hamburger.php'; ?>
<table class="content">
    <tr>
        <td class="bar">
        <?php include './include/bar.php'; ?>   
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
                WHEN long_url LIKE '%photos.app.goo.gl%' THEN 'photos.png'
                ELSE 'chrome.png' 
            END as Icono,
            '2mcoffee' as Usuario
            FROM url_shortner
            ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

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
                echo '      <div class="post">Se han encontrado 0 resultados</div>'."\n";
            }

            $conn->close();
            ?>
            <br>
            <?php include './include/license.php'; ?>
            <br>
        </td>
    </tr>
</table>
<?php include './include/footer.php'; ?>