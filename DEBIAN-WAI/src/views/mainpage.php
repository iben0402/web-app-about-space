<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kosmos</title>
        <meta name="description" content="Strona o kosmosie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="\static\css\style.css">
        
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

        <div class="cards">
            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Zarejestruj/zaloguj się</h1>
                    <div class="card-text">
                        <?php 
                            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
                                echo "<a href=\"logout\">Wyloguj się</a>";
                            }
                            else {
                                echo "<a href=\"login.php\">Log in</a>";
                            }
                        ?>
                    </div>    
                </div>
            </div>
            
            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">NASA</h1>
                    <div class="card-text">
                        <p>Narodowa Agencja Aeronautyki i Przestrzeni Kosmicznej – agencja rządu Stanów Zjednoczonych odpowiedzialna za narodowy program lotów kosmicznych, ustanowiona 29 lipca 1958 roku na mocy National Aeronautics and Space Act[4], zastępując poprzednika – National Advisory Committee for Aeronautics. NASA nie wchodzi w skład struktury żadnego ministerstwa (departamentu). Ma status niezależnej agencji podległej bezpośrednio prezydentowi Stanów Zjednoczonych.</p>
                        <strong><i>Co robi NASA?</i></strong>
                        <p>Oprócz programu lotów kosmicznych agencja jest również odpowiedzialna za długofalowy (zarówno cywilny, jak i wojskowy) program badań przestrzeni kosmicznej. W lutym 2006 roku NASA sama określiła swoje cele, uznając, że jej misją jest „utorowanie drogi przyszłej eksploracji kosmosu, odkryciom naukowym i badaniom z dziedziny aeronautyki”.</p>    
                    </div>    
                </div>
                
                <img src="static/img/NASA_logo.svg.png" class="card-img">
            </div>
            
            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Pierwsze loty w kosmos</h1>
                    <div class="card-text">
                        <p>12 kwietnia 1961 radziecki kosmonauta i pilot wojskowy Jurij Gagarin jako pierwszy człowiek w historii okrążył Ziemię w przestrzeni kosmicznej. Lot trwał 108 minut. Lecąc z prędkością ponad 27 tysięcy kilometrów na godzinę, Jurij Gagarin przeleciał nad Pacyfikiem, Południową Ameryką, Atlantykiem i nad Afryką.</p>
                        <p>20 lipca 1969 roku lądownik Apollo 11 z astronautami Neilem Armstrongiem i Buzzem Aldrinem wylądował na Księżycu. Był to pierwszy spektakularny sukces Stanów Zjednoczonych w trwającym od połowy XX wieku kosmicznym wyścigu z ZSRR.</p>
                        <p>Pierwszą udaną misją wykorzystującą samobieżny pojazd na innej planecie był Mars Pathfinder. 6 lipca 1997 roku z platformy lądownika zjechał na powierzchnię planety łazik Sojourner, o masie zaledwie 10,5 kg, zasilany przez baterie słoneczne.</p>
                    </div>
                </div>
                <img src="static/img/apollo11.jpg" class="card-img">
            </div>
            
            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">SpaceX</h1>
                    <div class="card-text">
                        <strong><i>Jak SpaceX opisuje samych siebie?</i></strong>
                        <p>SpaceX projektuje, buduje i wystrzeliwuje zaawansowane rakiety i statki kosmiczne. Firma została założona w 2002 roku, aby zrewolucjonizować kosmiczne technologie. Naszym głównym celem jest coś, czego nie udało się dokonać nigdy wcześniej: osiedlenie ludzi na innej planecie. Przesuwamy granice obecnych możliwości.</p>
                        <p>SpaceX (Space Exploration Technologies) zostało założone przez Elona Muska w czerwcu 2002, aby obniżyć koszty dostępu do kosmosu. W 2006 roku – po zaledwie 4 latach – SpaceX wystrzeliło swoją pierwszą rakietę, Falcon 1. Pomimo tego, że kilka pierwszych startów nie powiodło się, w 2008 SpaceX zostało pierwszą prywatną firmą, która stworzyła rakietę na paliwo ciekłe, która wyniosła ładunek na orbitę okołoziemską.</p>
                        <p><strong>Elon Musk</strong> – przedsiębiorca i filantrop, założyciel lub współzałożyciel przedsiębiorstw PayPal, SpaceX, Tesla, Neuralink i Boring Company. Pochodzi z Afryki Południowej, mieszka i pracuje w Stanach Zjednoczonych. Dyrektor generalny i techniczny w SpaceX, dyrektor generalny i główny architekt w Tesla Inc.</p>
                    </div>
                </div>
                <img src="static/img/spacex.jpg" class="card-img">
            </div>
        </div>

        <div class="quiz-box">
            <div id="quiz"></div>
            <button id="submit">Sprawdź!</button>
            <div id="results"></div>
            <script type="text/javascript" src="quiz.js"></script>
            <noscript> 
                <a href="https://support.google.com/adsense/answer/12654?hl=en" target="_blank"><img src="static/img/JavaScript-logo.png" style="width: 200px; height: 200px"></a>
            </noscript>
        </div>
        
        

    </body>
</html>