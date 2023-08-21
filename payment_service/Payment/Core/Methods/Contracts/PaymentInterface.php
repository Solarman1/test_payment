<?php
declare(strict_types=1);

namespace App\Service\Payment\Core\Methods\Contracts;

interface PaymentInterface
{
    public function makePayment(array $paymentData): array;
}
