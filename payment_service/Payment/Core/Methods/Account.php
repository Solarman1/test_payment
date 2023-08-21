<?php
declare(strict_types=1);

namespace App\Service\Payment\Core\Methods;

use App\Service\Payment\Core\Methods\Contracts\PaymentInterface;

class Account implements PaymentInterface
{

    /**
     * Для выставления счета мы возьмем данные указанные клиентом, для сохранения в order
     * для формирования счета, из конфига пропишем данные банка куда клиент должен перечислить средства
     * сумму подсчитаем согласно тарифу
     */
    public function makePayment(array $paymentData): array
    {
        #TODO тут вызов/сохранение/обновление данных компании по платежу для юр.лиц

        return [
            'bill_id' => $paymentData['bill_id'],
            'bank_name' => config('bank_account_info.bank_name'),
            'bic' => config('bank_account_info.bic'),
            'inn' => config('bank_account_info.inn'),
            'kpp' => config('bank_account_info.kpp'),
            'corespondent_num' => config('bank_account_info.corespondent_num'),
            'invoice_num' => config('bank_account_info.invoice_num'),
            'requisites' => config('bank_account_info.requisites'),
            'offer_doc_link' => config('bank_account_info.offer_doc_link'),
            'pay_date' => $paymentData['pay_date'],
            'subscription_months_count' => $paymentData['month_count'],
            'subscription_amount' => $paymentData['amount'] / $paymentData['month_count'],
            'subscription_amount_sum' => $paymentData['amount_pay'],
        ];
    }
}
