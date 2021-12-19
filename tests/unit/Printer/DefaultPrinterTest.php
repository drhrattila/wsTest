<?php declare(strict_types=1);

namespace App\Tests\unit\Printer;

use App\Printer\DefaultPrinter;
use App\Tests\mock\CSVParserResult;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Printer\DefaultPrinter
 * @covers \App\Map\OrderLabelMap
 */
class DefaultPrinterTest extends TestCase
{
    public function testInit(): void
    {
        $data = CSVParserResult::get();
        $printer = new DefaultPrinter($data, new \ArrayIterator([1 => 8, 2 => 4, 3 => 5]));

        $this->assertInstanceOf(DefaultPrinter::class, $printer);
    }

    public function testPrint(): void
    {
        $this->expectOutputString(file_get_contents('tests/mock/data/output.txt'));

        $data = CSVParserResult::get();
        $printer = new DefaultPrinter($data, new \ArrayIterator([1 => 8, 2 => 4, 3 => 5]));
        $printer->print();
    }
}