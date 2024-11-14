<?php

class Order
{
    public function processOrder($items, $tax, $discount, $email)
    {
        // Подсчёт общей суммы
        $subtotal = 0;
        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Применение скидки
        $discountAmount = $subtotal * ($discount / 100);
        $subtotal -= $discountAmount;

        // Налог
        $taxAmount = $subtotal * ($tax / 100);
        $total = $subtotal + $taxAmount;

        // Сохранение заказа в БД
        $connection = new PDO('mysql:host=localhost;dbname=shop', 'user', 'password');
        $stmt = $connection->prepare("INSERT INTO orders (total, email) VALUES (:total, :email)");
        $stmt->execute(['total' => $total, 'email' => $email]);

        // Отправка подтверждения на email
        mail($email, "Your Order Confirmation", "Thank you for your order. Total: $" . $total);
    }
}
