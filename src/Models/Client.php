<?php

namespace Src\Models;

class Client extends Model
{
    public function create(array $data): ?array
    {
        // todo: need to be implement
        return null;
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
        $joins = [
            'JOIN user_orders o ON u.id = o.user_id',
            'JOIN products p ON o.product_id = p.id',
        ];

        $conditions = ['1 '];
        if (!empty($params['u.id'])) {
            $query = $this->db->prepare('u.id = ?');
            $query->bind_param('i', $params['u.id']);
            $conditions[] = $query;
        }

        $query = $this->db->prepare(
            'SELECT u.full_name, p.title, p.price '
            . 'FROM users u '
            . implode(' ', $joins) . ' '
            . implode('AND ', $conditions) . ' '
            . 'ORDER BY p.title ASC, p.price DESC'
        );
        $query->execute();
        $result = $query->get_result();
        
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }

    public function delete(int $id): bool
    {
        // todo: need to be implement
        return false;
    }

}

