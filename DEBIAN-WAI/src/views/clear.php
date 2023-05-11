<?php

require_once 'functions.php';

$db = get_db();

$db->files->deleteMany(['name' => ['$regex' => '']]);

$path = "/var/www/prod/src/web/files/";

$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $file) {
    unlink($path.$file);
}
?>
