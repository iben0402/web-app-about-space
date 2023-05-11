<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kosmos</title>
        <meta name="description" content="Strona o kosmosie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="\static\css\style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".show").click(function(){
                    $(".card-text1").slideDown("slow");
                });
            });

            $(document).ready(function(){
                $(".hide").click(function(){
                    $(".card-text1").slideUp("slow");
                });
            });
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
        <div class="buttons">
            <button class="show">Pokaz opisy planet</button>
            <button class="hide">Ukryj opisy planet</button>
        </div>

        <noscript> 
            <br>
            <div style="margin-left: auto; margin-right:auto; width:300px">
                <a href="https://support.google.com/adsense/answer/12654?hl=en" target="_blank"><img src="static/img/JavaScript-logo.png" style="width: 300px; height: 300px"></a>
            </div>
            <p style="color: white; font-size: 30px; text-align: center">Inaczej ta strona nie dostarczy żadnych cennych informacji :(</p>
        </noscript>
        

        <div class="cards">
            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Słońce</h1>
                    <div class="card-text1">
                        <p>Nie jest to właściwie planeta, ale Słońce jest tak ważnym elementem Układu, że trzeba od niego zacząć.</p>
                        <strong>Więc czym jest Słońce?</strong>
                        <p>Najjaśniejsza i najbliższa Ziemi gwiazda widoczna gołym okiem. Od naszej planety dzieli ją odległość 149,6 mln km. Ziemia krąży wokół Słońca, które jest jednocześnie centralną gwiazdą Układu Słonecznego. Słońce zbudowane jest głównie z wodoru i helu. Jego masa jest równowartością 333 tys. mas ziemskich, co oznacza, że jest cięższe od Ziemi  333 tysiące razy. Odległość Ziemi od Słońca zmienia się w toku ruchu orbitalnego naszej planety. W styczniu dochodzi ona do peryhelium, czyli punktu na orbicie w miejscu największego zbliżenia. W lipcu z kolei w lipcu Ziemia osiąga aphelium – znajduje się wówczas w największym oddaleniu od Słońca. </p>
                    </div>    
                </div>
                
                <img src="static/img/slonce.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Merkury</h1>
                    <div class="card-text1">
                        <p>Jest najbliższą Słońca i najmniejszą planetą (0,055 masy Ziemi). Merkury nie ma naturalnych satelitów, a jedyne znane jego cechy geologiczne oprócz kraterów uderzeniowych to obłe grzbiety i urwiska, prawdopodobnie powstałe w okresie kurczenia się jego stygnącego wnętrza we wczesnej historii planety. Merkury prawie w ogóle nie ma atmosfery, gdyż jest ona „zdmuchiwana” przez wiatr słoneczny. Nie wiadomo dokładnie jak ukształtowały się jego stosunkowo duże żelazne jądro i cienki płaszcz. Według części hipotez jego zewnętrzne warstwy zostały zdarte przez ogromne uderzenie i to spowodowało, że nie rozrósł się w pełni, będąc pod wpływem promieniowania młodego Słońca.</p>
                    </div>    
                </div>
                
                <img src="static/img/merkury.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Wenus</h1>
                    <div class="card-text1">
                        <p>Jest zbliżona rozmiarami do Ziemi (0,815 masy Ziemi) i podobnie jak ona, ma gruby płynny płaszcz wokół żelaznego jądra i masywną atmosferę, 90 razy gęstszą niż ziemska. Wenus nie ma naturalnych satelitów. Jest najgorętszą planetą, o temperaturze powierzchni powyżej 400 °C, z powodu dużej zawartości gazów cieplarnianych w atmosferze. Nie ma ona pola magnetycznego, które mogłoby zapobiec uszczupleniu jej gęstej atmosfery, co sugeruje, że atmosfera jest stale uzupełniana przez aktywność wulkaniczną. Nie ma jednak innych dowodów współczesnej aktywności geologicznej na Wenus.</p>
                    </div>    
                </div>
                
                <img src="static/img/wenus.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Ziemia</h1>
                    <div class="card-text1">
                        <p>Jest największą i najgęstszą z planet wewnętrznych, jedyną z pewnością aktywną geologicznie i jedyną znaną planetą, na której istnieje życie. Jej hydrosfera jest unikalna wśród planet skalistych. Jest także jedyną planetą gdzie została zaobserwowana tektonika płyt. Atmosfera ziemska jest odmienna od atmosfer pozostałych planet i jest wciąż kształtowana przez procesy biologiczne, dzięki którym zawiera 21% wolnego tlenu. Ma jednego naturalnego satelitę – Księżyc – jedynego dużego satelitę pośród planet skalistych w Układzie Słonecznym. Czasem wręcz określa się układ Ziemia-Księżyc jako planetę podwójną.</p>
                    </div>    
                </div>
                
                <img src="static/img/ziemia.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Mars</h1>
                    <div class="card-text1">
                        <p>Jest mniejszy niż Ziemia i Wenus (0,107 masy Ziemi). Ma rzadką atmosferę złożoną głównie z dwutlenku węgla. Jego powierzchnia jest usiana wieloma wulkanami takimi jak Olympus Mons i dolinami pochodzenia tektonicznego takimi jak Valles Marineris. Nie wiadomo, czy Mars wykazuje współcześnie aktywność geologiczną. Jego czerwona barwa pochodzi od gleby bogatej w tlenki żelaza[31]. Mars ma dwa niewielkie księżyce: Fobosa i Deimosa. Mogą one być przechwyconymi planetoidami (przypominają je składem), lub mogły powstać na orbitach podobnych do dzisiejszych, na co wskazuje dynamika, np. z materii wyrzuconej przy uderzeniu dużego ciała w Marsa.</p>
                    </div>    
                </div>
                
                <img src="static/img/mars.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Jowisz</h1>
                    <div class="card-text1">
                        <p>Ma masę równą 318 mas Ziemi, czyli 2,5 razy więcej niż wszystkie pozostałe planety Układu. Składa się w większości z wodoru i helu. Duża ilość ciepła pochodząca z wnętrza planety tworzy wiele interesujących zjawisk w jego atmosferze, takich jak równoleżnikowe pasma chmur czy Wielka Czerwona Plama. Jowisz ma 79 znanych księżyców. Cztery największe z nich, tzw. księżyce galileuszowe, wykazują podobieństwa do planet skalistych, takie jak wulkanizm i zjawiska tektoniczne. Ganimedes, największy naturalny satelita w Układzie Słonecznym, jest większy niż Merkury.</p>
                    </div>    
                </div>
                
                <img src="static/img/jowisz.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Saturn</h1>
                    <div class="card-text1">
                        <p>Słynie z szerokich i jasnych pierścieni. Pod względem budowy i składu atmosfery bardzo przypomina on Jowisza. Ma jednak bardzo małą gęstość; przy średnicy równej ok. 84% średnicy Jowisza jest ponad trzykrotnie mniej masywny. Ma 82 znane satelity. Największe spośród nich są zbudowane w dużym stopniu z lodu. Z tej grupy Tytan i Enceladus wykazują oznaki aktywności geologicznej (kriowulkanizm). Tytan jest większy niż Merkury i jest jedynym satelitą w Układzie Słonecznym, który ma gęstą atmosferę, w której zachodzą złożone zjawiska pogodowe; poza tym znajdują się na nim powierzchniowe zbiorniki (jeziora i morza) ciekłych węglowodorów. Ciśnienie atmosferyczne na jego powierzchni jest o ok. 47% większe niż na powierzchni Ziemi.</p>
                    </div>    
                </div>
                
                <img src="static/img/saturn.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Uran</h1>
                    <div class="card-text1">
                        <p>Przy masie 14 mas Ziemi, jest najlżejszą z planet-olbrzymów. Jego unikalną cechą jest to, że obiega Słońce „leżąc na boku”; jego oś obrotu jest nachylona do ekliptyki pod kątem bliskim 0°. Ma także znacznie mniej aktywne jądro i wypromieniowuje mniej ciepła niż pozostałe olbrzymy Uran ma 27 znanych księżyców (stan z 2 października 2018, spośród których największe to Tytania, Oberon, Umbriel, Ariel i Miranda).</p>
                    </div>    
                </div>
                
                <img src="static/img/uran.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name">Neptun</h1>
                    <div class="card-text1">
                        <p>Chociaż nieco mniejszy od Urana, ma większą masę (równą 17 mas Ziemi) i większą gęstość. Wypromieniowuje też więcej ciepła, ale nie tak dużo jak Jowisz czy Saturn. Neptun ma 14 znanych księżyców. Największy z nich, Tryton, jest geologicznie aktywny, ma aktywne gejzery wyrzucające płynny azot. Tryton jest jedynym znanym dużym satelitą poruszającym się wokół planety ruchem wstecznym – przeciwnym niż jej ruch wirowy.</p>
                    </div>    
                </div>
                
                <img src="static/img/neptun.jpg" class="card-img">
            </div>

            <div class="card">
                <div class="card-info">
                    <h1 class="card-name" id="last">Co teraz?</h1>
                    <div id="card-text">
                        <script src="backToQuiz.js"></script>
                        <noscript> 
                            <a href="https://support.google.com/adsense/answer/12654?hl=en" target="_blank"><img src="static/img/JavaScript-logo.png" style="width: 200px; height: 200px"></a>
                        </noscript>
                    </div>
                </div>
            </div>
            
        </div>

    </body>
</html>