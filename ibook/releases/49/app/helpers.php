<?php
/**
 * User: zengrui
 * Date: 2019-05-06
 * Time: 20:04
 */

namespace helpers;

/**
 * 从给定的字符串提取数字
 * @param $str
 * @return mixed
 */
function extract_number($str)
{
    preg_match('/\d+/', $str, $match);
    return $match[0] ?? 0;
}

/**
 * 从当前域名中提取appId
 * @return mixed
 */
function app_id()
{
    $parts = explode('.', $_SERVER['HTTP_HOST']);
    return extract_number($parts[0]);
}

function api_data($msg = '', $data = null)
{
    $return['msg'] = $msg;
    if (isset($data)) {
        $return['data'] = $data;
    }
    return $return;
}

/**
 * 递归扫描文件夹下的所有文件
 * @param $dir
 * @return array
 */
function scan_dir($dir)
{
    //定义一个数组
    $files = array();
    //检测是否存在文件
    if (is_dir($dir)) {
        //打开目录
        if ($handle = opendir($dir)) {
            //返回当前文件的条目
            while (($file = readdir($handle)) !== false) {
                //去除特殊目录
                if ($file != "." && $file != "..") {
                    //判断子目录是否还存在子目录
                    if (is_dir($dir . "/" . $file)) {
                        //递归调用本函数，再次获取目录
                        $files[$file] = scan_dir($dir . "/" . $file);
                    } else {
                        //获取目录数组
                        $files[] = $dir . "/" . $file;
                    }
                }
            }
            //关闭文件夹
            closedir($handle);
            //返回文件夹数组
            return $files;
        }
    }
}

/**
 * @param $path
 * @return string
 */
function img_url($path)
{
    $host = config('app.img_url');
    return "$host/$path";
}
