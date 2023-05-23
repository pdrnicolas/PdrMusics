<?php

namespace App\Repositories;

use App\Repositories\Interfaces\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class EloquentRepository implements Repository
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @var Builder
     */
    private $queryBuilder;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function query(): Builder
    {
        if ($this->queryBuilder) {
            return $this->queryBuilder;
        }

        return $this->model->query();
    }

    public function all(array $columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    public function create($attributes = []): Model
    {
        return $this->query()->create($attributes);
    }

    public function existsById(int $id): bool
    {
        return $this->query()
            ->where('id', $id)
            ->exists();
    }

    public function delete(int $id): bool
    {
        $model = $this->query()
            ->where('id', $id)
            ->firstOrFail();

        return $model->delete();
    }
}
