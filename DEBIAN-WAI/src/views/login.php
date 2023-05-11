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
                $( "#datepicker" ).datepicker();
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

        <div class="form-div">
            <p id="form-title">Formularz</p>
        

            <?php 
            if(isset($_GET['dbclear'])) {
                    echo "<h1 style=color:red;>Application DB empty!</h1>";
                }

            if(isset($logout)) {
                if($logout == 'passed') {
                echo "<h2 style=color:green;>Logout properly!</h2>";
                } else {
                    echo "<h2 style=color:red;>Logout error!</h2>";
                }
            }
            ?>
            <div>
                <p style="font-size: 25px">Login to your account:</p>
                <form action="login.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" id="nameId" placeholder="LOGIN" class="form-input"> <br>
                    <input type="password" name="haslo" id="hasloId" placeholder="PASSWORD" class="form-input"> <br>
                    <input type="submit" value="Login" name="submit" class="submit-button">
                    <?php 
                    
                    if(isset($logError)) {
                        echo "<p style=color:red;>Login error!</p>";
                    }
                    ?>
                </form>
            </div>

            <div>
                <p style="font-size: 25px">Register new user:</p>

                <form action="login.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" id="nameId" placeholder="LOGIN" class="form-input"> <br>
                    <input type="email" id="email" name="email" placeholder="EMAIL" class="form-input"><br>
                    <input type="password" name="haslo" id="hasloId" placeholder="PASSWORD" class="form-input"> <br>
                    <input type="password" name="haslo2" id="haslo2Id" placeholder="REPEAT PASSWORD" class="form-input"> <br>
                    <input type="text" name="birthdate" id="datepicker" placeholder="DATE OF BIRTH" class="form-input"> <br>
                    <input type="checkbox" name="register" checked="checked" style="opacity:0; position:absolute; left:9999px;">
                    <input type="submit" value="Register" name="submit" class="submit-button">

                    <?php 
                        if(isset($regResult)) {
                            switch ($regResult) {
                                case 0:
                                    echo " <p style=color:green;>Registered properly!</p>";
                                break;
                                case 1:
                                    echo " <p style=color:red;>Name field empty!</p>";
                                break;
                                case 2:
                                    echo " <p style=color:red;>Email field empty!</p>";
                                break;
                                case 3:
                                    echo " <p style=color:red;>Haslo field empty!</p>";
                                break;
                                case 4:
                                    echo " <p style=color:red;>User already exist!</p>";
                                break;
                                case 5:
                                    echo " <p style=color:red;>Passwords are different!</p>";
                                break;
                            }
                        }
                    ?>
                
            </div>
            <br>
            <br>
            <a href="clear">CLEAR DB</a>



        </div>


    </body>
</html>