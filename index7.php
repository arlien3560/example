<?php

class OrderFilter {
    public function filter(array $orders, array $criteria): array {
        $filtered = [];

        foreach ($orders as $order) {
            if (isset($criteria['date']) && $order['date'] !== $criteria['date']) {
                continue;
            }

            if (isset($criteria['status']) && $order['status'] !== $criteria['status']) {
                continue;
            }

            if (isset($criteria['user_id']) && $order['user_id'] !== $criteria['user_id']) {
                continue;
            }

            $filtered[] = $order;
        }

        return $filtered;
    }
}
