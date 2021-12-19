<?php declare(strict_types=1);

namespace App\Printer;

use App\Enum\PriorityEnum;
use App\Map\OrderLabelMap;

class DefaultPrinter
{
    public function __construct(
        private \ArrayIterator $ordersData,
        private object $params,
    ) {}

    public function print(): void {
        $this->printResult();
    }

    private function printResult(): void {
        ob_start();
        $this->printHeader();
        $this->printBody();
        ob_end_flush();
    }

    private function printHeader(): void {
        foreach ($this->ordersData[OrderLabelMap::LABEL_HEADER] as $h) {
            echo str_pad($h, 20);
        }
        echo PHP_EOL;

        echo str_repeat(
            '=',
            20 * count($this->ordersData[OrderLabelMap::LABEL_HEADER])
        );
        echo PHP_EOL;
    }

    private function printBody(): void {
        foreach ($this->ordersData[OrderLabelMap::LABEL_ROWS] as $item) {
            if ($this->params[$item[OrderLabelMap::LABEL_PRODUCT_ID]] >= $item[OrderLabelMap::LABEL_QUANTITY]) {
                $this->printBodyByHeader($item);
                echo PHP_EOL;
            }
        }
    }

    private function printBodyByHeader(array $item): void {
        foreach ($this->ordersData[OrderLabelMap::LABEL_HEADER] as $h) {
            if ($h == OrderLabelMap::LABEL_PRIORITY) {
                echo str_pad($this->guessLabelByPriority($item), 20);
            } else {
                echo str_pad((string)$item[$h], 20);
            }
        }
    }

    private function guessLabelByPriority(array $item): string {
        return match ((int)$item[OrderLabelMap::LABEL_PRIORITY]) {
            PriorityEnum::LOW => PriorityEnum::LABELS[PriorityEnum::LOW],
            PriorityEnum::MEDIUM => PriorityEnum::LABELS[PriorityEnum::MEDIUM],
            PriorityEnum::HIGH => PriorityEnum::LABELS[PriorityEnum::HIGH],
        };
    }
}