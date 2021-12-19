<?php declare(strict_types=1);

namespace App\Parser;

use App\Map\OrderLabelMap;
use Exception;

class CSVParser
{
    /**
     * @throws Exception
     */
    public function parse(string $fileName): \ArrayIterator
    {
        list($header, $orders) = $this->doParse($fileName);

        $this->sort($orders);

        return new \ArrayIterator([
            OrderLabelMap::LABEL_HEADER => $header,
            OrderLabelMap::LABEL_ROWS => $orders
        ]);
    }

    /**
     * @throws Exception
     */
    private function doParse(string $fileName): array
    {
        $handler = $this->getFileHandler($fileName);
        $orders = new \ArrayIterator([]);
        $header = new \ArrayIterator([]);

        $row = 1;
        while (($data = fgetcsv($handler)) !== false) {
            if ($row == 1) {
                $header = new \ArrayIterator($data);
            } else {
                $orders[] = $this->append($header, $data);
            }
            $row++;
        }

        return [$header, $orders];
    }

    /**
     * @throws Exception
     */
    private function getFileHandler(string $file): mixed {
        if (!file_exists($file)) {
            throw new Exception('File not found');
        }

        $handler = fopen($file, 'r');
        if ($handler === false || 0 == filesize($file)) {
            throw new Exception('File reading error: invalid or empty');
        }

        return $handler;
    }

    private function append(\ArrayIterator $header, iterable $data): array {
        $o = [];
        for ($i = 0; $i < $header->count(); $i++) {
            $o[$header[$i]] = is_numeric($data[$i]) ? (int)$data[$i] : $data[$i];
        }

        return $o;
    }

    private function sort(\ArrayIterator $orders): void {
        $orders->uasort(function ($a, $b) {
            $pc = -1 * ($a[OrderLabelMap::LABEL_PRIORITY] <=> $b[OrderLabelMap::LABEL_PRIORITY]);
            return $pc == 0 ? $a[OrderLabelMap::LABEL_CREATED_AT] <=> $b[OrderLabelMap::LABEL_CREATED_AT] : $pc;
        });
    }
}
