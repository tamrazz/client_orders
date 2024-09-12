<?php

namespace Src\Models;

class Order extends Model
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
        $joins = [
            'JOIN user_orders o ON u.id = o.user_id',
            'JOIN products p ON o.product_id = p.id',
        ];

        $conditions = ['1 '];
        if (!empty($params['uid'])) {
            $query = $this->db->prepare('u.id = ?');
            $query->bind_param('i', $params['uid']);
            $conditions[] = $query;
        }

        if (!empty($params['uids'])) {
            $uids = array_map('intval', $params['uids']);
            $placeholders = implode(',', array_fill(0, count($uids), '?'));
            $query = $this->db->prepare("u.id IN ($placeholders)");
            $types = str_repeat('i', count($uids));
            $query->bind_param($types, ...$uids);
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

