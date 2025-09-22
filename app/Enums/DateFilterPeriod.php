<?php

namespace App\Enums;

enum DateFilterPeriod: string
{
    case TwentyFourHours = '24h';
    case SevenDays = '7d';
    case ThirtyDays = '30d';
    case ThreeMonths = '3m';
    case SixMonths = '6m';
    case TwelveMonths = '12m';
}
