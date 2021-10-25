<?php


namespace App\Domain\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self DEBIT()
 * @method static self CREDIT()
 */
final class TransactionTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'DEBIT' => 'debit',
            'CREDIT' => 'credit',
        ];
    }
}
