<?php
declare(strict_types=1);

namespace App\Service\Payment;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface PaymentServiceInterface
{
    public function payWithContext(array $paymentData): array;
    public function callback(Request $request): JsonResponse;
}
