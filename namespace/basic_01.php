<?php 

function my_autoloader($class) {
    echo "classes_01".PHP_EOL;
    include 'classes_01/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader'); #注册第一个

spl_autoload_register(function ($class) {
    echo "classes_02".PHP_EOL;
    include 'classes_02/' . $class . '.class.php';
}); //匿名函数注册第二个

/*spl_autoload_register(function ($class) {
    echo "classes_03".PHP_EOL;
    include 'classes_03/' . $class . '.class.php';
}, true, true); //匿名函数注册第三个, 并且把其放到队列最前面*/

$test = new test();
$test->init();

#返回所有注册的autoload方法
print_r(spl_autoload_functions());