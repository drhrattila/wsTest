<?php declare(strict_types=1);

namespace App\Tests\unit\Provider;

use App\Provider\Param\StockParamsProvider;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Provider\Param\StockParamsProvider
 */
class StockParamsProviderTest extends TestCase
{
    public function testProvideWithValidArguments(): void
    {
        $provider = new StockParamsProvider(2, '{"1":8,"2":4,"3":5}');
        $this->assertEquals(new \ArrayIterator([1 => 8, 2 => 4, 3 => 5]), $provider->provide());
    }

    public function testProvideWithInvalidArgumentCount(): void
    {
        $this->expectException(\ArgumentCountError::class);
        $provider = new StockParamsProvider(1, '{"1":8,"2":4,"3":5}');
        $this->assertEquals(new \ArrayIterator([1 => 8, 2 => 4, 3 => 5]), $provider->provide());
    }

    public function testProvideWithInvalidJson(): void
    {
        $this->expectException(\JsonException::class);
        new StockParamsProvider(1, '{etc}');

        $this->expectException(\JsonException::class);
        new StockParamsProvider(2, '{}');

        $this->expectException(\JsonException::class);
        new StockParamsProvider(0, '{}');
    }
}