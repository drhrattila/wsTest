<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Parser\CSVParser;
use App\Provider\Param\StockParamsProvider;
use App\Printer\DefaultPrinter;

try {
    $params = new StockParamsProvider($argc, $argv[1]);
    $params = $params->provide();

    $data = (new CSVParser())->parse('orders.csv');
    $printer = new DefaultPrinter($data, $params);
    $printer->print();

} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL; // or log error
    exit(1);
}


// clear && php get_fulfillable_orders.php '{"1":8,"2":4,"3":5}'

// vendor/bin/phpunit tests --coverage-text
// vendor/bin/phpunit tests --coverage-html