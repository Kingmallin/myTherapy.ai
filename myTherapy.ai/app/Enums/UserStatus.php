<?php

namespace App\Enums;

enum UserStatus: int
{
    case OFFLINE = 0;
    case ONLINE = 1;
    case BUSY =2;
}
