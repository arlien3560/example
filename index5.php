<?php

class EmailNotifier {
    public function sendEmail($email, $message) {
        echo "Email sent to $email: $message" . PHP_EOL;
    }
}

class SMSNotifier {
    public function sendSMS($phone, $message) {
        echo "SMS sent to $phone: $message" . PHP_EOL;
    }
}

class OrderProcessor {
    private $emailNotifier;
    private $smsNotifier;

    public function __construct() {
        $this->emailNotifier = new EmailNotifier();
        $this->smsNotifier = new SMSNotifier();
    }

    public function processOrder($orderId, $userEmail, $userPhone) {
        echo "Processing order #" . $orderId . PHP_EOL;

        // Повідомлення по email
        $this->emailNotifier->sendEmail($userEmail, "Your order #$orderId has been processed.");

        // Повідомлення по SMS
        $this->smsNotifier->sendSMS($userPhone, "Your order #$orderId is confirmed.");
    }
}

$processor = new OrderProcessor();
$processor->processOrder(123, 'customer@example.com', '+1234567890');
