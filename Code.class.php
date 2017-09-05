<?php
header('content-type:text/html;charset=utf-8');


class Code{
    public $image;
    public $bgcolor;//    随机颜色
    public $seed = 'zxcvbnmasdfghjklqwertyuiop1234567890';
    public $black= '#F7642C';
    public $b;//背景的颜色

//    构造函数只执行一次！所以想把随机颜色放进去，在引用是行不通的
    public function __construct(){
//        头部
        header('content-type:image/png');
//        资源
        $this->image = imagecreatetruecolor(300,150);
    }


    public function show(){

        $this->peise();//配色4
        $this->yanzhengma();//验证码1  内有随机数

        $this->ganrao();//干扰线2
        $this->dian();//干扰点3
//最下面执行！
        $this->huabu();



    }

//            配色开始
    public function peise(){
//        背景颜色
        $this->b = imagecolorallocate($this->image,0,0,hexdec($this->black));
        //填充，就是当背景
        imagefill($this->image,0,0,$this->b);
    }



//    写验证码
    public function yanzhengma(){
        for ($i=0;$i<4;$i++){
//    循环种子随机数  获得字符串
            $num = mt_rand(0,strlen($this->seed)-1);
//    在随机颜色
            $this->bgcolor = imagecolorallocate($this->image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));

//    写字
//    参数：资源，文字大小。角度，x轴，Y轴，颜色，字体库。后面就是文字种子库里面的随机出来的第几个了 ！！
            imagettftext($this->image,40,mt_rand(-60,60),$i*75+20,80,$this->bgcolor,'font.ttf',$this->seed[$num]);
        }
    }


//    加干扰线
    public function ganrao(){
        //加干扰线
        for($i=0;$i<40;$i++){
//       在随机颜色
            $this->bgcolor = imagecolorallocate($this->image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
//    划线//参数：画布资源、起始点x坐标、起始点y坐标、结束点x坐标、结束点y坐标、颜色
            imageline($this->image,mt_rand(0,300),mt_rand(0,150),mt_rand(0,300),mt_rand(0,150),$this->bgcolor);
        }

    }



//    加干扰点
        public function dian(){
            //加干扰点
            for($i=0;$i<1000;$i++){
                //    在随机颜色
                $this->bgcolor = imagecolorallocate($this->image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
//    加点//参数，画布资源，x轴，y轴。颜色
                imagesetpixel($this->image,mt_rand(0,300),mt_rand(0,300),$this->bgcolor);
            }

        }



    //        最后一步
    public function huabu(){
//        输出
        imagepng($this->image);
//        销毁
        imagedestroy($this->image);

    }






}






