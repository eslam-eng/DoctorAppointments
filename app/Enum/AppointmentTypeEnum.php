<?php

namespace App\Enum;

enum AppointmentTypeEnum: int
{
    case CONSULTATION = 1;
    case CHAT = 2;
    case CALL = 3;
}
