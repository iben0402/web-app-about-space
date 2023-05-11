<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kosmos</title>
        <meta name="description" content="Strona o kosmosie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="\static\css\style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
        $( function() {
            $( "#dialog" ).dialog();
        } );
        </script>
    </head>
    <body>
        
        <div class="navbar">
            <h1 class="title">KOSMOS</h1>
            <ul class="links">
                <li><a href="mainpage.php">Start</a></li>
                <li><a href="planety.php">Planety</a></li>
                <li><a href="upload.php">Galeria</a></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-info">
                <h1 class="card-name">Witaj <?=$account['name'] ?></h1>
                <div class="card-text">
                    <h2>Jak sie dzis czujesz? </h2>
                    <div id="dialog" title="Basic dialog">
                        <p>Cieszymy się, że z nami jesteś</p>
                    </div>
                    <a href="logout">Wyloguj się</a>
                </div>    
            </div>
            <img src="static/img/branding.png" class="card-img">
        </div>
        <a href="https://www.flaticon.com/free-stickers/rocket" title="rocket stickers">Rocket stickers created by kerismaker - Flaticon</a>
    </body>
</html>