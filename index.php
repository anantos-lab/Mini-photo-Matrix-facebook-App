<?php

//impliment requirement file

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';


//login permissions
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email' , 'user_birthday'];

//login generate Url
$login= $helper->getLoginUrl($login_rual, $permissions);

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rual.io</title>
  </head>
  <body>
    <?php
    if (!isset($token))
    {
    echo '<a href=" '.$login.'">Login</a>';
     }
     if (isset($token)) {
       try {
        //  $data = url('https://graph.facebook.com/me?fields=id,name,birthday,email&access_token='.$token);
        //  $rual = json_decode($data);
        //  $user = json_decode( json_encode($rual), true);
        //  print_r($user);


        //Globaly create image and load data for calling from functions

         $GLOBALS['outputImage'] = imagecreatetruecolor(250, 250);
         $GLOBALS['data'] = url('https://graph.facebook.com/me/taggable_friends?access_token='.$token);


        //functions for Matrix

         function rual($a , $b , $c)
       {
         $rual = json_decode($GLOBALS['data']);
         $user = json_decode( json_encode($rual), true);
         $users = $user['data'];
         $img=$users[$a]['picture']['data']['url'];
         $ruali = imagecreatefromjpeg($img);
         imagecopyresized($GLOBALS['outputImage'],$ruali,$b,$c,0,0, 100, 100, 100, 100);
         return true;
       }


     for ($i=0; $i <= 4 ; $i++) {
       $arr = array('0', '50' , '100' , '150' ,'200');
       $val = $arr[$i];
       rual($i, $val , 0);
     }


     for ($i=5; $i <= 9 ; $i++) {
       $io  = $i - 5;
       $arr = array('0', '50' , '100' , '150' ,'200');
       $val = $arr[$io];
       rual($i, $val , 50);
     }

     for ($i=10; $i <= 14 ; $i++) {
       $io  = $i - 10;
       $arr = array('0', '50' , '100' , '150' ,'200');
       $val = $arr[$io];
       rual($i, $val , 100);
     }

     for ($i=15; $i <= 19 ; $i++) {
       $io  = $i - 15;
       $arr = array('0', '50' , '100' , '150' ,'200');
       $val = $arr[$io];
       rual($i, $val , 150);
     }

     for ($i=20; $i <= 24 ; $i++) {
       $io  = $i - 20;
       $arr = array('0', '50' , '100' , '150' ,'200');
       $val = $arr[$io];
       rual($i, $val , 200);
     }

     } catch (Exception $e) {
         echo  "Somthing Went Wrong :: ".$e;
       }

             $filename = 'rual.png';
             imagepng($outputImage, $filename);
             imagedestroy($outputImage);

             echo '<img src="rual.png" alt="" />';
     }

    ?>
  </body>
</html>
