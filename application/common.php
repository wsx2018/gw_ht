<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 字节数转大小
 * byteNum 字节数
 * precision 四舍五入的精度
 */
function byte_to_size($byteNum,$precision=2){
    $type = array('byte','KB','MB','GB');
    for($i=0;$byteNum>1024;$i++){
        $byteNum /= 1024;
    }
    $byteNum = round($byteNum,$precision);

    return $byteNum.' '.$type[$i];
}