<!doctype html>
<html lang="es">

<head>
<meta charset="utf-8">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5F3CP3SR48"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5F3CP3SR48');
</script>

<!--Titulo-->
<title>@2mcoffee - Otro inutil experimento</title>

<!--Metadata-->
<meta name="author" content="Luciano Alfonsin">
<meta name="description" content="Otro inutil experimento sobre redes sociales">
<meta name="keywords" content="IA, AI, 2mcoffee,social,redes,instagram,twitter,facebook,youtube">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Hoja de estilos-->
<link rel="stylesheet" href="./css/main.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet" type="text/css">

<!--Google Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manjari&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">

<!--Estilo Menu embebido-->
<style>
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
    box-shadow: 0 0 0 100vw #FDB90B, 0 0 0 100vh #FDB90B;
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
    font-family:'Press Start 2P';
    font-size:16px;
}
label a:hover{
    color:#FFFFFF;
}
</style>
</head>
