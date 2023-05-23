<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface Repository
{
    public function all(array $columns = ['*']): Collection;

    public function create($attributes = []): Model;

    public function delete(int $id): bool;

}
