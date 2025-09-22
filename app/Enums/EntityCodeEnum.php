<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum EntityCodeEnum: string
{
    use UsefulEnums;

    case BCA_CI = 'BCA_CI';
    case NSIA = 'NSIA';
    case AXA = 'AXA';
    case SANLAM_ALLIANZ = 'SANLAM_ALLIANZ';
    case GNA = 'GNA';
    case ATLANTIQUE = 'ATLANTIQUE';
    case COMAR = 'COMAR';
    case AFG = 'AFG';
    case ATLANTA = 'ATLANTA';
    case ACTIVA = 'ACTIVA';
    case SIDAM = 'SIDAM';
    case SUNU = 'SUNU';
    case ASCOMA = 'ASCOMA';
    case OLEA = 'OLEA';
    case WTW = 'WTW';
    case CFAO = 'CFAO';
    case MATCA = 'MATCA';
    case FILHEL = 'FILHEL';
    case UNAP = 'UNAP';
    case SAAR = 'SAAR';
    case WAFA = 'WAFA';
    case SERENITY = 'SERENITY';
    case SONAM = 'SONAM';
    case AMSA = 'AMSA';
    case SCHIBA = 'SCHIBA';
    case LEADWAY = 'LEADWAY';
    case CORIS = 'CORIS';
    case BNICB = 'BNICB';
    case SMABTP = 'SMABTP';
    case LOYALE = 'LOYALE';

    case SONAR = 'SONAR';
}
