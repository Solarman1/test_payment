<?php
declare(strict_types=1);

namespace App\Service\Payment;

use App\Service\Payment\Core\Enums\PaymentType;
use App\Service\Payment\Core\Methods\Account;
use App\Service\Payment\Core\Methods\Acquiring;
use App\Service\Payment\Core\Methods\Contracts\PaymentInterface;
use App\Service\Payment\Core\Payment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentService implements PaymentServiceInterface
{
    /**
     * @throws Exception
     */
    public function payWithContext(array $paymentData): array
    {
        $context = new Payment($this->getPaymentType($paymentData['type']));
        return $context->pay($paymentData);
    }

    public function callback(Request $request): JsonResponse
    {
        #TODO логика обработки колбэка из эквайринга
    }

    /**
     * @throws Exception
     */
    private function getPaymentType(string $paymentType): Acquiring|Account
    {
        return match ($paymentType) {
            PaymentType::Acquiring->value => new Acquiring(),
            PaymentType::Account->value => new Account(),
            default => throw new Exception("Unknown Payment Method"),
        };
    }
}
