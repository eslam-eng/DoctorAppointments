<?php

namespace App\Enum;

enum UsersType: int
{
    case CUSTOMER = 1;
    case DOCTOR = 2;

    case ADMIN = 3;
}
