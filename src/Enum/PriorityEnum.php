<?php declare(strict_types=1);

namespace App\Enum;

class PriorityEnum
{
    public const LOW = 1;
    public const MEDIUM = 2;
    public const HIGH = 3;

    public const LABELS = [
        self::LOW => 'low',
        self::MEDIUM => 'medium',
        self::HIGH => 'high',
    ];
}
