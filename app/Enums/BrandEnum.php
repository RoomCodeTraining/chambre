<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum BrandEnum: string
{
    use UsefulEnums;

    case PEUGEOT = 'peugeot';
    case RENAULT = 'renault';
    case CITROEN = 'citroen';
    case FORD = 'ford';
    case VOLKSWAGEN = 'volkswagen';
    case OPEL = 'opel';
    case MERCEDES = 'mercedes';
    case BMW = 'bmw';
    case AUDI = 'audi';
    case SEAT = 'seat';
    case SKODA = 'skoda';
    case LANDROVER = 'landrover';
    case JAGUAR = 'jaguar';
    case HYUNDAI = 'hyundai';
    case KIA = 'kia';
    case MAZDA = 'mazda';
    case MITSUBISHI = 'mitsubishi';
    case NISSAN = 'nissan';
    case TOYOTA = 'toyota';
    case VOLVO = 'volvo';
}
