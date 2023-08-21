<?php
declare(strict_types=1);

namespace App\Service\Payment\Core\Enums;

enum PaymentType: string
{
    case Acquiring = 'acquiring';
    case Account = 'account';
}
