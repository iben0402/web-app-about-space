<?php

    use MongoDB\BSON\ObjectID;

    function get_db()
    {
        $mongo = new MongoDB\Client(
            "mongodb://localhost:27017/wai",
            [
                'username' => 'wai_web',
                'password' => 'w@i_w3b',
            ]);

        $db = $mongo->wai;

        return $db;
    }

    function clearDbState()
    {
        $db = get_db();
        $db->users->deleteMany(['name' => ['$regex' => '']]);
        $db->files->deleteMany(['name' => ['$regex' => '']]);
    }

    function verifyRegistrationForm($postArr) {
        $haslo = $postArr['haslo'];

        if($postArr['name'] === '' ) {
            return 1;
        }
    
        if($postArr['email'] === '') {
            return 2;
        }
    
        if($postArr['haslo'] === '') {
            return 3;
        }    
        
        if($postArr['haslo'] !== $postArr['haslo2'] ) {
            return 5;
        }   
        
        $hash = password_hash($haslo, PASSWORD_DEFAULT );
        $account = [
            'name' => $postArr['name'],
            'email' => $postArr['email'],
            'haslo' => $hash
        ];
        
        $db = get_db();

        $current = getAccount($postArr['name']);
        
        if($current === NULL){ 
            $db->users->insertOne($account);
            return 0;
        } 
        else {
        return 4;
        }
        
    }
        
    function verifyLoginForm($postArr) {

        $db = get_db();
        
        $name = $postArr['name'];
        $haslo = $postArr['haslo'];
        
        $user=['name'=>$name];
        $uzytkownik = $db->users->find($user);
        
        $_SESSION["logged_in"] = 1;
        $_SESSION["account_id"] = $name;
        
        if($db->users->count($user)==0){
            return false;
        }
        
        foreach ($uzytkownik as $sprawdzane){
            
            $hash = $sprawdzane['haslo'];
            
            if (password_verify($haslo, $hash)) {
                return true;
            } 
            else {
                return false;
            }
        }
        
            
        return true;
        
    }
        
    function getAccount($name) {
            $db = get_db();
        return $db->users->findOne(['name' => $name]);
    }

    function upload_fn() {
        
        $db = get_db();
        $allowedImgTypes= array("png","jpg");
        $target_dir = "/var/www/prod/src/web/images/";
        $target_file = $target_dir . basename($_FILES["fileToUploadName"]["name"]);
        $resultCode=0;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(filesize($_FILES["fileToUploadName"]["tmp_name"]) > 1000000 || $_FILES["fileToUploadName"]["error"]==1) {
            $resultCode = 1;
        }
        
        if(isset($_POST["submit"])) {
            if(!in_array($fileType, $allowedImgTypes)) {
                $resultCode = 2;
            }
        }

        if(file_exists($target_file)) {
            $resultCode = 3;
        }

        if($resultCode == 0) {
            if(!move_uploaded_file($_FILES["fileToUploadName"]["tmp_name"], $target_file)) {
                $resultCode = 5;
            }
            else {

                $SourceFile = $target_file;
                $target_dir2 = "/var/www/prod/src/web/images/watermarks/";
                $target_dir3 = "/var/www/prod/src/web/images/thumbnail/";
                $DestinationFile =  $target_dir2.basename($_FILES["fileToUploadName"]["name"]);
                $WaterMarkText = $_POST['watermark'];
                $target_oiginal_file = $target_file;
                $target_thumbnail_file = $target_dir3.basename($_FILES["fileToUploadName"]["name"]);
                $friendlyName=basename($_FILES["fileToUploadName"]["name"]);
                $Autor=" ";
                $Tytul=" ";
                if(isset($_POST['fileTytul'])) {
                    if($_POST['fileTytul'] != '') {
                        $Tytul=$_POST['fileTytul'];
                    } 
                }  
                if(isset($_POST['fileAutor'])) {
                    if($_POST['fileAutor'] != '') {
                        $Autor=$_POST['fileAutor'];
                    } 
                }

                $fileObject = [
                    'name' => $friendlyName,
                    'location' => $target_dir.basename($_FILES["fileToUploadName"]["name"]),
                    'type' => 'original',
                    'person' => $Autor,
                    'title' => $Tytul
                ];

                $db->files->insertOne($fileObject);

                if($fileType=='png'){
                    watermarkImagePNG($SourceFile, $WaterMarkText, $DestinationFile);

                    $friendlyName=basename($_FILES["fileToUploadName"]["name"]);
                    $Autor=" ";
                    $Tytul=" ";

                    if(isset($_POST['fileTytul'])) {
                        if($_POST['fileTytul'] != '') {
                          $Tytul=$_POST['fileTytul'];
                        } 
                    }  
                    if(isset($_POST['fileAutor'])) {
                        if($_POST['fileAutor'] != '') {
                            $Autor=$_POST['fileAutor'];
                        } 
                    }

                    $fileObject = [
                        'name' => $friendlyName,
                        'location' => $target_dir.basename($_FILES["fileToUploadName"]["name"]),
                        'type' => 'watermark',
                        'person' => $Autor,
                        'title' => $Tytul
                    ];

                    $db->files->insertOne($fileObject);



                    createThumbnailPNG($target_oiginal_file, $target_thumbnail_file);

                    $friendlyName=basename($_FILES["fileToUploadName"]["name"]);
                    $Autor=" ";
                    $Tytul=" ";

                    if(isset($_POST['fileTytul'])) {
                        if($_POST['fileTytul'] != '') {
                          $Tytul=$_POST['fileTytul'];
                        } 
                    }  
                    if(isset($_POST['fileAutor'])) {
                        if($_POST['fileAutor'] != '') {
                            $Autor=$_POST['fileAutor'];
                        } 
                    }

                    $fileObject = [
                        'name' => $friendlyName,
                        'location' => $target_dir.basename($_FILES["fileToUploadName"]["name"]),
                        'type' => 'thumbnail',
                        'person' => $Autor,
                        'title' => $Tytul
                    ];

                    $db->files->insertOne($fileObject);
                }
                else {

                    watermarkImageJPG($SourceFile, $WaterMarkText, $DestinationFile);

                    $friendlyName=basename($_FILES["fileToUploadName"]["name"]);
                    $Autor=" ";
                    $Tytul=" ";

                    if(isset($_POST['fileTytul'])) {
                        if($_POST['fileTytul'] != '') {
                          $Tytul=$_POST['fileTytul'];
                        } 
                    }  
                    if(isset($_POST['fileAutor'])) {
                        if($_POST['fileAutor'] != '') {
                            $Autor=$_POST['fileAutor'];
                        } 
                    }

                    $fileObject = [
                        'name' => $friendlyName,
                        'location' => $target_dir.basename($_FILES["fileToUploadName"]["name"]),
                        'type' => 'watermark',
                        'person' => $Autor,
                        'title' => $Tytul
                    ];

                    $db->files->insertOne($fileObject);



                    createThumbnailJPG($target_oiginal_file, $target_thumbnail_file);

                    $friendlyName=basename($_FILES["fileToUploadName"]["name"]);
                    $Autor=" ";
                    $Tytul=" ";

                    if(isset($_POST['fileTytul'])) {
                        if($_POST['fileTytul'] != '') {
                          $Tytul=$_POST['fileTytul'];
                        } 
                    }  
                    if(isset($_POST['fileAutor'])) {
                        if($_POST['fileAutor'] != '') {
                            $Autor=$_POST['fileAutor'];
                        } 
                    }

                    $fileObject = [
                        'name' => $friendlyName,
                        'location' => $target_dir.basename($_FILES["fileToUploadName"]["name"]),
                        'type' => 'thumbnail',
                        'person' => $Autor,
                        'title' => $Tytul
                    ];

                    $db->files->insertOne($fileObject);
                }
            }
        }
        return $resultCode;
    }

    function watermarkImageJPG($SourceFile, $WaterMarkText, $DestinationFile) {
        list($width, $height) = getimagesize($SourceFile);
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($SourceFile);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
        $red = imagecolorallocate($image_p, 255, 0, 0);
        $font = '/var/www/prod/src/web/static/arial.ttf';
        $font_size = 100;
        imagettftext($image_p, $font_size, 0, 100, 150, $red, $font, $WaterMarkText);

        imagejpeg ($image_p, $DestinationFile, 100);
 
        imagedestroy($image);
        imagedestroy($image_p);
    }

    function watermarkImagePNG ($SourceFile, $WaterMarkText, $DestinationFile) {

        list($width, $height) = getimagesize($SourceFile);
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefrompng($SourceFile);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
        $red = imagecolorallocate($image_p, 255, 0, 0);
        $font = '/var/www/prod/src/web/static/arial.ttf';
        $font_size = 100;
        imagettftext($image_p, $font_size, 0, 100, 150, $red, $font, $WaterMarkText);
 
        imagepng ($image_p, $DestinationFile);
 
        imagedestroy($image);
        imagedestroy($image_p);

    }

    function createThumbnailJPG($target_oiginal_file, $target_thumbnail_file) {
        $new_width = 200;
        $new_height=125;
        list($old_width, $old_height) = getimagesize($target_oiginal_file);
        $base_for_thumbnail = imagecreatefromjpeg($target_oiginal_file);
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $base_for_thumbnail, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        imagejpeg($new_image, $target_thumbnail_file);
    }

    function createThumbnailPNG($target_oiginal_file, $target_thumbnail_file) {
        $new_width = 200;
        $new_height=125;
        list($old_width, $old_height) = getimagesize($target_oiginal_file);
        $base_for_thumbnail = imagecreatefrompng($target_oiginal_file);
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $base_for_thumbnail, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        imagepng($new_image, $target_thumbnail_file);
    }