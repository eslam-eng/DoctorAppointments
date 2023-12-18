<?php

namespace App\Enum;

enum AppointmentTypeEnum: string
{
    case CALLFEES = 'call_fees';
    case CONSULTATIONFESS = 'consultation_fees';
    case CHATFEES = 'chat_fees';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
