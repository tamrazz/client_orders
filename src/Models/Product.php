<?php

namespace Src\Models;

class Product extends Model
{
    public function create(array $data): ?array
    {
        $query = $this->db->prepare(
            "INSERT INTO products (title, price) VALUES (?, ?)"
        );

        $query->bind_param('sd', $data['title'] ?? '', $data['price'] ?? 0);
        $result = $query->execute();
        // todo: return Model data
        return $result ? [] : null;
    }

    public function update(int $id, array $data): ?array
    {
        // todo: need to be implement
        return null;
    }

    public function find(int $id): ?array
    {
        // todo: need to be implement
        return null;
    }

    public function get(array $params): array
    {
        // todo: need to be implement
        return [];
    }

    public function delete(int $id): bool
    {
        // todo: need to be implement
        return false;
    }

}
