<?php
require_once 'business.php';
require_once 'controller_utils.php';

function mainpage(&$model) {
    return 'mainpage';
}

function planety(&$model) {
    return 'planety';
}

function clear() {
    clearDbState();
    return 'redirect:login?dbclear=true';
}

function files(&$model) {
    display();
    return "files";
}

function logout(&$model) {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
        session_destroy();
        return 'redirect:login?logout=passed';
    } 
    return 'redirect:login?logout=failed';
}

function login(&$model) {
    
    if(isset($_GET['logout'])) {
        $model['logout'] = $_GET['logout'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
             $model['account'] = getAccount($_SESSION['account_id']);
            return 'account';
        } else {
            return 'login';
        }
    } else {
        if(isset($_POST['register'])) {
            $regResult = verifyRegistrationForm($_POST);
            $model['regResult'] = $regResult;
            return 'login';
        } else {
            if(verifyLoginForm($_POST)) {
                $model['account'] = getAccount($_SESSION['account_id']);
                return 'account';
            } else {
                $model['logError'] = true;
                return 'login';
            }

        }
    }

}

function upload(&$model) {

    if(isset($_POST['submit'])) {
           $resultCode = upload_fn();
      
          $model['resultcode'] =  $resultCode;
        } return 'upload';
      }
    
function display() {
    
    echo 
    '<div class="navbar">
        <h1 class="title">KOSMOS</h1>
        <ul class="links">
            <li><a href="mainpage.php">Start</a></li>
            <li><a href="planety.php">Planety</a></li>
            <li><a href="upload.php">Galeria</a></li>
        </ul>
    </div>';
    
    echo '<div class="photos-gal">';

    $db=get_db();

    $page = 1;
    if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
        }
    $pageSize = 2;
    $sum=$db->files->count(['type'=>'original']);
    $opts = [
        'skip' => ($page - 1) * $pageSize,
        'limit' => $pageSize
    ];
    $numbers=ceil($sum/$pageSize);
    $files = $db->files->find(['type'=>'original'], $opts);
    foreach ($files as $file){
        if($file['type']=='original') {
            $autorPrint=$file['person'];
            $tytulPrint=$file['title'];

            echo 
            '<div><div>
            <a href="images/watermarks/'.$file['name'].'">
                <img src="images/thumbnail/'.$file['name'].'" alt=" :("/>
            <a/><br/></div>';
            if ($autorPrint !== " ")
            {
                echo
            '<div class="autor">
            Autor: '.$autorPrint.'
            </div>';
            }
            
            if ($tytulPrint !== " ")
            {
                echo
                '<div class="tytul">
                Tytul: '.$tytulPrint.'
                </div></div>';
            }
        }
        
    }

    echo '<br><br>';
    for($i= 1; $i <=$numbers; $i++){
        echo 
        '
            <a href="files?page='.$i.'">'.$i.'</a>
        ';
    }

    echo '</div>';
}