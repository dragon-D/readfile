//获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
    $handler = opendir($dir);
    while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
        if ($filename != "." && $filename != "..") {
                $files[] = $filename ;
           }
       }
    }
    closedir($handler);
     
//打印所有文件名
foreach ($filens as $value) {
    echo $value."<br />";
}


//获取目录下所有文件，包括子目录
function get_allfiles($path,&$files) {
    if(is_dir($path)){
        $dp = dir($path);
        while ($file = $dp ->read()){
            if($file !="." && $file !=".."){
                get_allfiles($path."/".$file, $files);
            }
        }
        $dp ->close();
    }
    if(is_file($path)){
        $files[] =  $path;
    }
}
   
function get_filenamesbydir($dir){
    $files =  array();
    get_allfiles($dir,$files);
    return $files;
}
   
$filenames = get_filenamesbydir("static/image/");
//打印所有文件名，包括路径
foreach ($filenames as $value) {
    echo $value."<br />";
}
