<?php

class Logger {
    public function log($message) {
        echo "LOG: " . $message . PHP_EOL;
    }
}

class EmailNotifier {
    public function sendEmail($email, $message) {
        echo "Email sent to $email: $message" . PHP_EOL;
    }
}

class OrderProcessor {
    private $logger;
    private $notifier;

    public function __construct() {
        $this->logger = new Logger();
        $this->notifier = new EmailNotifier();
    }

    public function processOrder($orderId, $userEmail) {
        // Логіка обробки замовлення
        echo "Processing order #" . $orderId . PHP_EOL;

        // Логування
        $this->logger->log("Order $orderId processed");

        // Відправка повідомлення
        $this->notifier->sendEmail($userEmail, "Your order #$orderId has been processed.");
    }
}

$processor = new OrderProcessor();
$processor->processOrder(123, 'customer@example.com');
