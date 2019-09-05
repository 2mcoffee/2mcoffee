<!doctype html>
<html lang="es">

<head>
<meta charset="utf-8">

<!--Titulo-->
<title>@2mcoffee - Otro experimento utilizando IA</title>

<!--Metadata-->
<meta name="author" content="Luciano Alfonsin">
<meta name="description" content="Otro experimento utilizando IA">
<meta name="keywords" content="IA, AI, 2mcoffee">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Hoja de estilos-->
<link rel="stylesheet" href="./css/main.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet" type="text/css">

<!--Google Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manjari&display=swap">

<!--Estilo Menu embebido-->
<style type="text/css">
*, *:before, *:after { 
    box-sizing: border-box; 
}
label .menu {
    position: absolute;
    right: -100px;
    top: -100px;
    z-index: 100;
    width: 200px;
    height: 200px;
    background: #FDB90B;
    border-radius: 50% 50% 50% 50%;
    -webkit-transition: .5s ease-in-out;
    transition: .5s ease-in-out;
    box-shadow: 0 0 0 0 #FFF, 0 0 0 0 #FFF;
    cursor: pointer;
}
label .hamburger {
    position: absolute;
    top: 135px;
    left: 50px;
    width: 30px;
    height: 2px;
    background: #000;
    display: block;
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transition: .5s ease-in-out;
    transition: .5s ease-in-out;
}
label .hamburger:after, label .hamburger:before {
    -webkit-transition: .5s ease-in-out;
    transition: .5s ease-in-out;
    content: "";
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
    background: #000;
}
label .hamburger:before { 
  top: -10px; 
}
label .hamburger:after { 
  bottom: -10px; 
}
label input {
   display: none; 
}
label input:checked + .menu {
    box-shadow: 0 0 0 100vw #FDB90B, 0 0 0 100vh #FFF;
    border-radius: 0;
}
label input:checked + .menu .hamburger {
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}
label input:checked + .menu .hamburger:after {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    bottom: 0;
}
label input:checked + .menu .hamburger:before {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    top: 0;
}
label input:checked + .menu + ul { 
  opacity: 1; 
}
label ul {
    z-index: 200;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    opacity: 0;
    -webkit-transition: .25s 0s ease-in-out;
    transition: .25s 0s ease-in-out;
}
label a {
    margin-bottom: 1em;
    display: block;
    color: #000;
    text-decoration: none;
}
</style>
</head>
<body>
<label>
<input type='checkbox'>
<span class='menu'> <span class='hamburger'></span> </span>
  <ul>
    <li> <a href='#'>Home</a> </li>
    <li> <a href='#'>Trim URL</a> </li>
    <li> <a href='#'>Tweet like me!</a> </li>
    <li> <a href='#'>Public IG posts</a> </li>
  </ul>
</label>
<br>
<br>
<div class="title">
	<h1>@2mcoffee</h1>
	<span>Otro experimento usando IA</span>
</div>
<br>
<br>
<table class="content">
    <tr>
        <td style="width:35%;">
        Info personal
        </td>
        <td style="width:65%;">
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
                    echo '<div class="post">';
                    echo '  Link recomendado: <a href="'.$row["URL"].'" target="_blank">'.$row["URL"].'</a>';
                    echo '  <p>';
                    echo '    Publicado por '.$row["Usuario"].' en <img src="./img/'.$row["Icono"].'" alt="Categoria"> el '.$row["Fecha"];
                    echo '  </p>';
                    echo '</div>';
                    echo '<br>';
                }
            } else {
                echo "0 resultados";
            }

            $conn->close();
            ?>
        </td>
    </tr>
</table>
<br>
<br>
<div class="networks"><img src="./icons/facebook.png" alt="facebook"> <a href="http://fb.me/2mcoffee" target="_blank">@2mcoffee</a> <img src="./icons/instagram.png" alt="instagram"> <a href="http://instagr.am/2mcoffee" target="_blank">@2mcoffee</a> <img src="./icons/twitter.png" alt="twitter"> <a href="http://twitter.com/2mcoffee" target="_blank">@2mcoffee</a> </div>
<br>
<br>
<div class="license"><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Hey, no te copies!</a>.</div>
<div class="apu"><img  src="./img/apu.gif"></div>
</body>
</html>