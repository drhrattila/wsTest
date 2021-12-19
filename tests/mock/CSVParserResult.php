<?php declare(strict_types=1);

namespace App\Tests\mock;

use App\Map\OrderLabelMap;

class CSVParserResult
{
    public static final function get(): \ArrayIterator {
        return new \ArrayIterator([
            'header' => new \ArrayIterator([
                OrderLabelMap::LABEL_PRODUCT_ID,
                OrderLabelMap::LABEL_QUANTITY,
                OrderLabelMap::LABEL_PRIORITY,
                OrderLabelMap::LABEL_CREATED_AT,
            ]),
            'rows' => new \ArrayIterator([
                5 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 3,
                    OrderLabelMap::LABEL_QUANTITY => 5,
                    OrderLabelMap::LABEL_PRIORITY => 3,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-23 05:01:29',
                ],
                0 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 1,
                    OrderLabelMap::LABEL_QUANTITY => 2,
                    OrderLabelMap::LABEL_PRIORITY => 3,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-25 14:51:47',
                ],
                1 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 2,
                    OrderLabelMap::LABEL_QUANTITY => 1,
                    OrderLabelMap::LABEL_PRIORITY => 2,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-21 14:00:26',
                ],
                9 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 1,
                    OrderLabelMap::LABEL_QUANTITY => 8,
                    OrderLabelMap::LABEL_PRIORITY => 2,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-22 09:58:09',
                ],
                3 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 3,
                    OrderLabelMap::LABEL_QUANTITY => 1,
                    OrderLabelMap::LABEL_PRIORITY => 2,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-22 12:31:54',
                ],
                6 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 1,
                    OrderLabelMap::LABEL_QUANTITY => 6,
                    OrderLabelMap::LABEL_PRIORITY => 1,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-21 06:17:20',
                ],
                2 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 2,
                    OrderLabelMap::LABEL_QUANTITY => 4,
                    OrderLabelMap::LABEL_PRIORITY => 1,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-22 17:41:32',
                ],
                7 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 2,
                    OrderLabelMap::LABEL_QUANTITY => 2,
                    OrderLabelMap::LABEL_PRIORITY => 1,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-24 11:02:06',
                ],
                8 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 3,
                    OrderLabelMap::LABEL_QUANTITY => 2,
                    OrderLabelMap::LABEL_PRIORITY => 1,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-24 12:39:58',
                ],
                4 => [
                    OrderLabelMap::LABEL_PRODUCT_ID => 1,
                    OrderLabelMap::LABEL_QUANTITY => 1,
                    OrderLabelMap::LABEL_PRIORITY => 1,
                    OrderLabelMap::LABEL_CREATED_AT => '2021-03-25 19:08:22',
                ],
            ]),
        ]);
    }
}