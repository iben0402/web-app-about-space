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
        <div class="form-div">
            <p id="form-title">Galeria zdjęć z kosmosu</p>
            <p style="font-size: 25px">Dodaj swoje zdjęcie:</p>

            <form action="upload.php" method="post" enctype="multipart/form-data">
            
                <input type="file" name="fileToUploadName" id="fileToUploadId" class="form-input"> <br>
                <input type="text" name="watermark" id="watermark" required placeholder="WATERMARK" class="form-input"> <br>
                <input type="text" name="fileTytul" id="tytul" required placeholder="TITLE" class="form-input"> <br>
                <input type="text" name="fileAutor" id="autor" required placeholder="AUTHOR" class="form-input"><br>
                
                <div class="button-holder">
                    <input type="submit" value="Upload Image" name="submit" class="submit-button">
                </div>

            </form>

            <br><br>
            <div class="button-holder">
                <a href="files.php" class="gallery-button">Galeria</a>
            </div>
        </div>
        
        <?php
            $resultCode = 6;
            if(isset($model['resultcode'])) {
                $resultCode = $model['resultcode'];
                switch ($resultCode) {
                    case 0:
                        echo " <p style=color:green;>File uploaded correctly!</p>";
                    break;
                    case 1:
                        echo " <p style=color:red;>File not uploaded: Too big!</p>";
                    break;
                    case 2:
                        echo " <p style=color:red;>File not uploaded: Extensions not allowed !</p>";
                    break;
                    case 3:
                        echo " <p style=color:red;>File not uploaded: File already exists!</p>";
                    break;
                    case 4:
                        echo " <p style=color:red;>File not uploaded: Problem with upload file from client!</p>";
                    break;
                    case 5:
                        echo " <p style=color:red;>File not uploaded: Problem with storing file on server side!</p>";
                    break;
                
                }
            }    
        ?>


    </body>
</html>