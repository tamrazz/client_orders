<?php

namespace Src\Models;

class Order extends Model
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
        'JOIN user_order AS o ON u.id = o.user_id',
        'JOIN products AS p ON o.product_id = p.id',
    ];

    $conditions = ['1=1'];
    $conditionTypes = '';
    $conditionValues = [];

    if (!empty($params['uid'])) {
        $conditions[] = 'u.id = ?';
        $conditionTypes .= 'i';
        $conditionValues[] = $params['uid'];
    }

    if (!empty($params['uids'])) {
        $uids = array_map('intval', $params['uids']);
        $placeholders = implode(',', array_fill(0, count($uids), '?'));
        $conditions[] = "u.id IN ($placeholders)";
        $conditionTypes .= str_repeat('i', count($uids));
        $conditionValues = array_merge($conditionValues, $uids);
    }

    $q = "SELECT CONCAT(u.first_name, ' ', u.second_name) AS full_name, p.title, p.price "
        . 'FROM user AS u '
        . implode(' ', $joins) . ' '
        . 'WHERE ' . implode(' AND ', $conditions) . ' '
        . 'ORDER BY full_name ASC, p.title ASC, p.price DESC;';

    $query = $this->db->prepare($q);
    
    if ($conditionTypes) {
        $query->bind_param($conditionTypes, ...$conditionValues);
    }
    
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

