<?php

namespace App\Users\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Users\Interfaces\UserRepositoryInterface;
use App\Users\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $_model = User::class;

}
