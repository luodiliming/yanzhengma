<?php
header('content-type:text/html;charset=utf-8');


//验证码引入
//include "Code.class.php";
//$code = new  Code;
//$code->show();


//水印引入
//include "Shuiyin.class.php";
//$shui = new Shuiyin;
//$shui->lei('dog.jpg','water.png');



//缩略图引入
include "Suolutu.class.php";
$suo = new Suo;
$suo->suolu('hanxin1.jpg');













