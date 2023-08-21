<?php
declare(strict_types=1);

namespace App\Service\Payment\Core\Methods;

use App\Service\Payment\Core\Methods\Contracts\PaymentInterface;

class Acquiring implements PaymentInterface
{

    /**
     * Тут пропишем логику для запроса на эквайринг и сохранения ордера оплаты по эквайрингу, тип можно расширить добавлением состояния,
     * если несколько систем эквайринга, также логику под каждую.
     */
    public function makePayment(array $paymentData): array
    {
        // TODO: Implement makePayment() method.
    }
}
