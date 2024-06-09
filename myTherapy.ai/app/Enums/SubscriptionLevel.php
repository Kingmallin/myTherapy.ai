<?php

namespace App\Enums;

enum SubscriptionLevel: string
{
    case Free = 'Free';
    case Trial = 'Trial';
    case Gold = 'Gold';
    case Platinum = 'Platinum';
}
