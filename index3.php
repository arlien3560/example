<?php

class Order
{
    public function calculateTotal($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function sendEmail($email, $message)
    {
        mail($email, "Your Order", $message);
    }

    public function saveToDatabase($orderData)
    {
        $connection = new PDO('mysql:host=localhost;dbname=shop', 'user', 'password');
        $query = "INSERT INTO orders (user_id, total, status) VALUES (:user_id, :total, :status)";
        $stmt = $connection->prepare($query);
        $stmt->execute([
            'user_id' => $orderData['user_id'],
            'total' => $orderData['total'],
            'status' => 'pending'
        ]);
    }
}
