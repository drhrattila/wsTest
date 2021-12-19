<?php declare(strict_types=1);

namespace App\Tests\unit\Parser;

use App\Parser\CSVParser;
use App\Tests\mock\CSVParserResult;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Parser\CSVParser
 * @covers \App\Map\OrderLabelMap
 */
class CSVParserTest extends TestCase
{
    protected ?CSVParser $parser;
    protected \ArrayIterator $expected;

    public function setUp(): void
    {
        $this->parser = new CSVParser();
        $this->expected = CSVParserResult::get();
    }

    public function testParseWithValidData(): void
    {
        $result = $this->parser->parse('tests/mock/data/orders.csv');
        $this->assertEquals($this->expected, $result);
    }

    public function testParseWithInvalidFile(): void
    {
        $this->expectException(\Exception::class);
        $this->parser->parse('not_existing_file.csv');
    }

    public function testParseWithInvalidData(): void
    {
        $this->expectException(\Exception::class);
        $this->parser->parse('tests/mock/data/empty_orders.csv');
    }

    public function tearDown(): void
    {
        $this->parser = null;
    }
}

