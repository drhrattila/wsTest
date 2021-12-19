<?php declare(strict_types=1);

namespace App\Provider\Param;

class StockParamsProvider
{
    private int $argumentCount;
    private \ArrayIterator $arguments;

    public function __construct(int $argumentCount, string $json) {
        $this->argumentCount = $argumentCount;
        $this->arguments = $this->parseJson($json);
        $this->validate();
    }

    public function provide(): \ArrayIterator {
        return $this->arguments;
    }

    private function parseJson(string $json): \ArrayIterator {
        $data = \json_decode($json, true);

        if($data === null || json_last_error() !== JSON_ERROR_NONE) {
            throw new \JsonException('Unable to decode json string');
        }

        return new \ArrayIterator($data);
    }

    private function validate(): void {
        if ($this->argumentCount != 2) {
            throw new \ArgumentCountError('Missing argument(s)!');
        }
    }
}