<?php

namespace Src\Models;

interface ModelInterface
{
    public function create(array $data): ?array;
    public function update(int $id, array $data): ?array;
    public function delete(int $id): bool;
    public function find(int $id): ?array;
    public function get(array $params): array;
}
