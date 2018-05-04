<?php 

// // Warning: include(unknow_file.php): failed to open stream: No such file or directory
// include  "unknow_file.php";
// echo "继续执行".PHP_EOL;

// // Fatal error: require(): Failed opening required
// require "unknow_file.php";
// echo "未走到".PHP_EOL;

function main() {
    include "test_include.php";

    $a = 250;

    #前者内容被覆盖， 输出test_include里面设置的内容, 因此输出1000
    // include_once "test_include.php";
    // echo $a.PHP_EOL;
    
    #只加载因此， 内容是250
    // include_once "test_include.php";
    // echo $a.PHP_EOL;
    
}

main();