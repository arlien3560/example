<?php

class PayPalPayment {
    public function pay($amount) {
        echo "Paid $amount via PayPal" . PHP_EOL;
    }
}

class StripePayment {
    public function pay($amount) {
        echo "Paid $amount via Stripe" . PHP_EOL;
    }
}

class PaymentService {
    public function processPayment($type, $amount) {
        if ($type === 'paypal') {
            $payment = new PayPalPayment();
        } elseif ($type === 'stripe') {
            $payment = new StripePayment();
        } else {
            throw new Exception("Unsupported payment method: $type");
        }
        
        $payment->pay($amount);
    }
}

$service = new PaymentService();
$service->processPayment('paypal', 100);
$service->processPayment('stripe', 200);
