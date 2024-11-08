<?php

declare(strict_types=1);

namespace App\Contacts\Models;

use App\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'telephone',
        'age',
        'zip_code',
        'address',
        'address_number',
        'city',
        'state',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
