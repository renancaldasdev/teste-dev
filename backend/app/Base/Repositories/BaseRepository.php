<?php

declare(strict_types=1);

namespace App\Base\Repositories;

use App\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{
    protected string $_model;

  
}
