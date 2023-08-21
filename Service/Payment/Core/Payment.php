<?php
declare(strict_types=1);

namespace App\Service\Payment\Core;

use App\Service\Payment\Core\Methods\Contracts\PaymentInterface;

class Payment
{
    public function __construct(
        private PaymentInterface $payment
    ){
    }

    public function setPayment(PaymentInterface $payment): void
    {
        $this->payment = $payment;
    }

    public function pay(array $paymentData): array
    {
        return $this->payment->makePayment($paymentData);
    }
}
