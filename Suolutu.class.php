<?php
header('content-type:text/html;charset=utf-8');

class Suo{
        public $w =100;//缩略图宽度
        public $h =100;//缩略图宽度

        public $mx = 0;//X坐标的目的地
        public $my = 0;//y坐标的目的地
        public $yx = 0;//X坐标的源点
        public $yy = 0;//y坐标的源点

        public $sw = 100;//缩略图呈现的宽度
        public $sh = 100;//缩略图呈现的宽度
        public $yw = 496;//源宽度
        public $yh = 330;//源高度


        public function __construct(){
             header('content-type:image/png');
        }
    public function suolu($a){

//引入原图
        $dog = imagecreatefromjpeg($a);
//创建一个缩略图画布  参数宽高
        $image = imagecreatetruecolor($this->w,$this->h);
//参数：创建缩率画布，原图片。1：是X坐标的目的地。2：y坐标目的地。3：X坐标的源点。4：y坐标源点。
//        5：目的地宽度 6：目标高度。 7：源宽度。8：源高度。
        imagecopyresized($image,$dog,$this->mx,$this->my,$this->yx,$this->yy,$this->sw,$this->sh,$this->yw,$this->yh);

        imagepng($image,'dog'.mt_rand(0,1000).'.'.'jpg');
//        imagepng($image,'dog_thumb.jpg');
        imagedestroy($image);

    }
}













