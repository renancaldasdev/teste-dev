<?php

declare(strict_types=1);

namespace App\Contacts\Models;

use App\Users\Models\User;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): ContactFactory
    {
        return new ContactFactory();
    }

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

    public static function getAllPaginatedAsJson($perPage = 10): JsonResponse
    {
        return response()->json(self::paginate($perPage));
    }
}
