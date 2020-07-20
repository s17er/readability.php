<?php
namespace andreskrey\Readability\test;

use andreskrey\Readability\Configuration;
use andreskrey\Readability\ParseException;
use andreskrey\Readability\Readability;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once "../vendor/autoload.php";

$config = new Configuration();

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)); // <<< uses a stream
$config->setLogger($log);

$readability = new Readability($config);
try {
    $readability->parse(file_get_contents('test-pages/testpage_001.html'));
    print('---'. PHP_EOL);
    print($readability->getContent(). PHP_EOL);
    print('---'. PHP_EOL);
    print($readability->getSummary(). PHP_EOL);
} catch (ParseException $e) {
    print('error'.PHP_EOL);
}

?>