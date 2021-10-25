<?php

namespace App\Models;

use App\Domain\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['type', 'amount'];

    protected $casts = [
        'status' => TransactionTypeEnum::class,
        'nullable_enum' => TransactionTypeEnum::class.':nullable',
        'array_of_enums' => TransactionTypeEnum::class.':collection',
        'nullable_array_of_enums' => TransactionTypeEnum::class.':collection,nullable',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
