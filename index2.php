<?php

class Order
{
    public function processOrder($items, $tax, $discount, $email)
    {
        $subtotal = 0;
        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $discountAmount = $subtotal * ($discount / 100);
        $subtotal -= $discountAmount;

        $taxAmount = $subtotal * ($tax / 100);
        $total = $subtotal + $taxAmount;

        $connection = new PDO('mysql:host=localhost;dbname=shop', 'user', 'password');
        $stmt = $connection->prepare("INSERT INTO orders (total, email) VALUES (:total, :email)");
        $stmt->execute(['total' => $total, 'email' => $email]);

        mail($email, "Your Order Confirmation", "Thank you for your order. Total: $" . $total);
    }
}
