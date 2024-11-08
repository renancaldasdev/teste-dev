<?php

declare(strict_types=1);

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function save(Model $model): Model;

    public function find(int $id): ?Model;

    public function delete(int $id): void;

    public function update(int $id, array $data): Model;
}
