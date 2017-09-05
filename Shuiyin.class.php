<?php
header('content-type:text/html;charset=utf-8');


class Shuiyin{
        public $x = 100;//水印在图片X轴
        public $y = 100;//水印在图片y轴
        public $sx = 0;//水印图片要截取的范围的顶点x坐标
        public $sy = 0;//水印图片要截取的范围的顶点y坐标
        public $w = 322;//要截取水印图片的范围的宽度
        public $h = 30;//要截取水印图片的范围的高度
        public $tou = 30;//水印的透明度0-100；
    public function __construct(){
        header('content-type:image/png');
    }


    public function lei($a,$b){

        //加载外部资源
        $image = imagecreatefromjpeg($a);
//加载水印图片
        $water = imagecreatefrompng($b);
        //在water图片中的0,0位置开始，截取50*30尺寸的图像，放到image图像中的100,100位置上，尺寸调整为200*60
//        imagecopyresized($image,$water,100,100,0,0,200,60,50,30);

//            上下都行，下面多了个透明度！

//参数：目标图片、水印图片、水印在目标图片的位置x坐标、y坐标、水印图片要截取的范围的顶点x坐标、y坐标、要截取的范围的宽度、高度
//imagecopy($image,$water,100,100,0,0,322,63);
//最后一个参数是透明度 取值范围0-100
        imagecopymerge($image,$water,$this->x,$this->y,$this->sx,$this->sy,$this->w,$this->h,$this->tou);


        imagepng($image);

        imagedestroy($image);
        }

}













