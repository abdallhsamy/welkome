<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Standard repository
 */
interface Repository
{
    /**
     * Get paginated model collection
     *
     * @param int $perPage
     * @param array $filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $filters = []): LengthAwarePaginator;

    /**
     * Get complete model collection
     *
     * @param array $filters
     * @return \Illuminate\Support\Collection
     */
    public function all(array $filters = []): Collection;

    /**
     * Get model
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find(int $id): Model;

    /**
     * Create a new model
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data): Model;

    /**
     * Update model
     *
     * @param int $id
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(int $id, array $data): Model;

    /**
     * Destroy model
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;
}
