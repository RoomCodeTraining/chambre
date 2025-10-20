<!DOCTYPE html>
<html lang="str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapport d'expertise {{$assignment->reference}} / BCA-CI</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link href="asset('css/app.css') }}" rel="stylesheet">
        <script src="asset('js/app.js') }}" defer></script>



        <style>



            <?php include(public_path().'/bootstrap/css/bootstrap.css');?>

            table, caption, th, td {
                border: 0px solid;
                font-size: 12px;
                padding: 2px;
                table-layout: fixed;
                width: 100%;
            }

            body{
                font-family: "Times New Roman", Times, serif;
                font-size: 12px;
                margin-top: 1cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 3cm;
            }

            .watermark {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(-45deg);
                opacity: 0.12;
                font-size: 180px !important;
                width: 100vw;
                height: 100vh;
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none;
                text-align: center;
                white-space: pre-line;
            }

            @page {
                margin: 0cm 0cm;
            }

            .pagenum:before {
                content: counter(page);
            }

            .total-pages:before {
                content: counter(pages);
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                text-align: center;
                line-height: 1.5cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: 0.8cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                margin-left: 1cm;
                margin-right: 1cm;
                font-size: 8px;

                /** Extra personal styles **/
                text-align: center;
            }

        </style>
    </head>
    <body class="antialiased">
        <header>
            
        </header>
        <footer>
            <hr style="border: 1px solid black;">
            <b>SARL au Capital de 5.000.000 FCFA | RCCM : CI-ABJ-03-2025-813-04454</b><br>
            <b>NCC : 2502756B – Tel : (+225) 07 07 17 00 40 / 27 21 35 91 32 / 27 21 34 17 30</b><br>
            <b>Siège social : Abidjan, Marcory CAP SUD, Rue Thomas Edison</b><br>
            <b>Numéro de Compte Bancaire NSIA BANQUE : CI042 01228 085807302001 11</b>

            <div style="text-align: right;">
                Page <span class="pagenum"></span>
            </div>
        </footer>

        <div class="text-right" style="align: right; text-align:right;">
            <span style="align: right; text-align:right;">Imprimé le : {{ \Carbon\Carbon::parse(now())->format('d/m/Y') }}</span>
        </div>

        <table class="table text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; border: 3px solid black; border-spacing: 0px;">
            <thead style="border: 1px solid; font-size: 12px margin: 0; padding: 0; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                    <th style="border: 1px solid; font-size: 12px;" colspan="3">RAPPORT D'EXPERTISE AUTOMOBILE</th>
                </tr>
            </thead>
            <thead style="border: 3px solid black; font-size: 10px; margin: 0; padding: 0; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 5px; margin: 0; padding: 0; border-spacing: 0px;">
                    <th style="border: 1px solid; font-size: 12px; margin: 0; padding: 0; border-spacing: 0px; vertical-align: top;">
                        <img src="{{$logo}}" alt="logo" style="text-align: center; width:160px; height:60px; margin-top: 10px; padding-bottom: 0; border-spacing: 0px; vertical-align: top;">
                        <ul style="text-align: left; font-size: 12px; padding-left: 50px; padding-top: 0; margin-top: 10px;">
                            <li style="font-size: 12px;">Expertise Automobile</li>
                            <li style="font-size: 12px;">Assistance Technique - Conseils</li>
                            <li style="font-size: 12px;">Risque Divers</li>
                            <li style="font-size: 12px;">Préformation Mécanique</li>
                        </ul>
                        <div style="text-align: left; font-size: 12px; padding-left: 40px; vertical-align: top; margin-top: -12px;">
                            <b>Experts : <span class="text-danger">{{$assignment?->directedBy?->code ?? ''}} / {{$assignment?->editedBy?->code ?? ''}}</span></b><br>
                        </div>
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: top;" style="text-align:left;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;"> 
                            <div class="p-1 bd-highlight" style="background-color: rgb(223, 221, 218);"> N° <span class="text-danger">{{$assignment->reference}}</span></div>
                        </div>
                        <div class="p-1 bd-highlight" style="text-align:left;">COMMETTANT : 
                            <b> 
                                <span class="text-danger">
                                    @if($assignment?->additionalInsurer)
                                        {{mb_strtoupper($assignment?->insurer?->name ?? '')}} ({{mb_strtoupper($assignment?->additionalInsurer?->name ?? '')}})
                                    @else
                                        @if($assignment?->broker)
                                            {{mb_strtoupper($assignment?->broker?->name ?? '')}} 
                                            @if($assignment?->insurer)
                                                ({{mb_strtoupper($assignment?->insurer?->name ?? '')}})
                                            @endif
                                        @else
                                            {{mb_strtoupper($assignment?->insurer?->name ?? '')}} 
                                        @endif
                                    @endif
                                </span>
                            </b>
                        </div>
                        <div class="p-1 bd-highlight" style="text-align:left;">ASSURE : <b> <span class="text-danger">{{mb_strtoupper($assignment?->client?->name ?? '')}}</span></b></div>
                        <div class="p-1 bd-highlight" style="text-align:left;">N° Police : <b>{{mb_strtoupper($assignment?->policy_number ?? '')}}</b></div>
                        <div class="p-1 bd-highlight" style="text-align:left;">N° Sinistre : <b> <span class="text-danger">{{mb_strtoupper($assignment?->claim_number ?? '')}}</span></b></div>
                        <div class="p-1 bd-highlight" style="text-align:left;">Date du sinistre : 
                            <b>
                                <span class="text-danger">
                                    @if($assignment?->claim_starts_at)
                                        {{ \Carbon\Carbon::parse($assignment?->claim_starts_at)->format('d/m/Y') ?? ''}}
                                    @endif
                                </span>
                            </b>
                        </div>
                        <div class="p-1 bd-highlight" style="text-align:left;">Lieu d'expertise : <b>{{$assignment?->expertise_place ?? ''}}</b></div>
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <img src="{{$qr_code ?? ''}}" alt="qr_code" style="text-align: center; width:125px; height:125px; margin-top: 5px;">
                        <br>
                        <span style="font-size: 12px;">
                            <b>Code du dossier : <br> {{$assignment?->reference ?? ''}} </b>
                        </span>
                    </th>
                </tr>
            </thead>
        </table>

        <h1 style="text-align: center; font-family: 'Times New Roman'; font-size: 30px; padding-top: 10px; text-decoration: underline;">ÉVALUATION DE VALEUR VENALE</h1>

        <table class="table text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; border: 3px solid white; border-spacing: 0px;">
            <tbody style="border: 3px solid white; font-size: 10px; margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                <tr style="border: 1px solid; font-size: 10px; margin: 0; padding: 0; border-spacing: 0px;">
                    <td style="border: 1px solid; font-size: 10px; vertical-align: middle; vertical-align: top;" colspan="3">
                    @if($cover_photo)
                        <img src="{{ $cover_photo ?? '' }}" style="width: 95%; height: 48%; object-fit: cover; display: block;">
                    @else
                        <img src="{{ $wbg ?? '' }}" style="width: 95%; height: 48%; object-fit: cover; display: block;">
                    @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="text-align: center; font-size: 12px;">
            <h2 style="text-decoration: underline; text-align: center;">VEHICULE</h2>
            <h2 style="text-align: center;">{{mb_strtoupper($assignment?->vehicle?->brand?->label ?? '')}} - {{mb_strtoupper($assignment?->vehicle?->vehicleModel?->label ?? '') }}</h2>
            <br>
            <h2 style="text-decoration: underline; text-align: center;">IMMATRICULATION</h2>
            <h2 style="text-align: center;">{{ mb_strtoupper($assignment?->vehicle?->license_plate ?? '')}}</h2>
        </p>

        @if($assignment?->status_id == 3 || $assignment?->status_id == 4 || $assignment?->status_id == 5)
            <div class="watermark">Provisoire</div>
        @endif

        @if($assignment?->status_id == 8)
            <div class="watermark">Annulé</div>
        @endif

        @if($assignment?->status_id == 10)
            <div class="watermark">Supprimé</div>
        @endif

        <div style="page-break-after: always;"></div>

        <p style="text-align: justify; font-size: 12px;">
            Nous  soussigné,  Bakary FANE,  Directeur-Gérant  du  Cabinet GERENTHON  ET CIE  01 B.P.  2173  ABIDJAN  01. Expert agréé  en  Automobile et matériels Industriels auprès de L'ASACI, avons été mandatés par <b>{{$assignment->client->name ?? ''}}</b> afin de :
            {!! $assignment->instructions !!}
        </p>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">IDENTIFICATION DE VEHICULE</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Numéro d'immatriculation
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->license_plate ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Marque
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->brand?->label ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Modèle
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->vehicleModel?->label ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Genre
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->vehicleGenre?->label ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Couleur
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->color?->label ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Type
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->type ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        N° de série
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->serial_number ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Puissance fiscale / Énergie
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($assignment?->vehicle?->fiscal_power ?? 0, 0, ',', ' ')}} / {{mb_strtoupper($assignment?->vehicle?->vehicleEnergy?->label ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Date de mise en circulation
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{ \Carbon\Carbon::parse($assignment?->vehicle?->first_entry_into_circulation_date)->format('d/m/Y') ?? ''}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Nombre de place / Charge utile
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($assignment?->vehicle?->nb_seats ?? 0, 0, ',', ' ')}} / {{number_format($assignment?->vehicle?->payload ?? 0, 0, ',', ' ')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Kilométrage
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($assignment?->vehicle?->mileage ?? 0, 0, ',', ' ')}} KMS
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Option
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($assignment?->vehicle?->option ?? '')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Date de visite technique
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{ \Carbon\Carbon::parse($assignment?->vehicle?->technical_visit_date)->format('d/m/Y') ?? ''}}
                    </td>   
                </tr>
            </tbody>
        </table>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 20px; table-layout: auto">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="8" style="border: 1px solid; font-size: 12px;">CONSTATATIONS</th>
                </tr>
            </thead>
            <thead style="border: 1px solid;
                font-size: 12px;
                ">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; width:120px; vertical-align: middle;">Libellé</th>
                    <th style="border: 1px solid; font-size: 12px; width:69px; vertical-align: middle;">Très bon</th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Bon</th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Acceptable</th>
                    <th style="border: 1px solid; font-size: 12px; width:69px; vertical-align: middle;">Moins bon</th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Mauvais</th>
                    <th style="border: 1px solid; font-size: 12px; width:69px; vertical-align: middle;">Très mauvais</th>
                    <th style="border: 1px solid; font-size: 12px; width:230px; vertical-align: middle;">Observation</th>
                </tr>
                </thead>
            <tbody>
                @foreach($ascertainments as $item)
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        {{mb_strtoupper($item?->ascertainmentType?->label ?? '')}}
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        @if($item->very_good)
                        <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        @if($item->good)
                        <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        @if($item->acceptable)
                        <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        @if($item->less_good)
                        <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        @if($item->bad)
                        <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        @if($item->very_bad)
                        <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        {{$item->comment ?? ''}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 20px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">ÉVALUATION DE LA REMISE EN ÉTAT</th>
                </tr>
            </thead>
        </table>

        @foreach($shocks as $shock)
            <div class="text-left d-flex flex-column bd-highlight mt-2 mb-1">
                <div class="p-2 bd-highlight"><b style="text-decoration: underline;">POINT DE CHOC</b> : {{$shock->shockPoint->label ?? ''}}</div>
            </div>
            <table class="table table-bordered text-center">
                <thead style="border: 1px solid;
                    font-size: 12px;
                   ">
                    <tr style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px; width:250px; vertical-align: middle;">Désignation</th>
                        <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Remplacement</th>
                        <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Réparation</th>
                        <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Peinture</th>
                        <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Contrôle</th>
                        <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Montant TTC</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach($shock->shockWorks as $item)
                    <tr style="border: 1px solid; font-size: 12px;">
                        <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                            {{mb_strtoupper($item?->supply?->label ?? '')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                            @if($item->replacement)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                            @if($item->repair)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                            @if($item->paint)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                            @if($item->control)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                            {{number_format($item->new_amount ?? 0, 0, ',', ' ')}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-bordered text-center">
                <thead style="border: 1px solid; font-size: 12px;">
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <b>
                                <div class="p-1 bd-highlight">Montant pièce Neuves TTC : {{number_format($shock->shock_work_new_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                            </b>
                        </div>
                    </tr>
                </thead>                    
            </table>
            <br>
            <table class="table table-bordered text-center">
                <thead style="border: 1px solid; font-size: 12px;">
                    <tr style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">Main d'oeuvre</th>
                        <th style="border: 1px solid; font-size: 12px;">Tps(h)</th>
                        <th style="border: 1px solid; font-size: 12px;">Tx horr (FCFA)</th>
                        <th style="border: 1px solid; font-size: 12px;">Remise</th>
                        <th style="border: 1px solid; font-size: 12px;">Montant HT</th>
                        <th style="border: 1px solid; font-size: 12px;">Montant TVA</th>
                        <th style="border: 1px solid; font-size: 12px;">Montant TTC</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($shock->workforces as $item)
                    <tr style="border: 1px solid; font-size: 12px;">
                        <td style="border: 1px solid; font-size: 12px;">
                            {{mb_strtoupper($item?->workforceType?->label ?? '')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            {{number_format($item?->nb_hours ?? 0, 2, ',', ' ')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            {{number_format($item?->work_fee ?? 0, 0, ',', ' ')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            {{number_format($item?->discount ?? 0, 2, ',', ' ')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            {{number_format($item?->amount_excluding_tax ?? 0, 0, ',', ' ')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            {{number_format($item?->amount_tax ?? 0, 0, ',', ' ')}}
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            {{number_format($item?->amount ?? 0, 0, ',', ' ')}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-bordered text-center">
                <thead style="border: 1px solid; font-size: 12px;">
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <b>
                                <div class="p-1 bd-highlight">Total main d'oeuvre TTC : {{number_format($shock?->workforce_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                            </b>
                        </div>
                    </tr>
                </thead>                    
            </table>
            <table class="table table-bordered text-left">
                <thead style="border: 1px solid; font-size: 12px;">
                    <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                        <th class="text-center" style="border: 1px solid; font-size: 12px;" colspan="2">RECAPITULATIF</th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Total Main d'Oeuvre
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            {{number_format($shock?->workforce_amount ?? 0, 0, ',', ' ')}}
                        </th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Total Fournitures Neuves
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            {{number_format($shock?->shock_work_new_amount ?? 0, 0, ',', ' ')}}
                        </th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Total Fournitures Récupération
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            {{number_format($shock?->shock_work_recovery_amount ?? 0, 0, ',', ' ')}}
                        </th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Total Fournitures Vetusté
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            {{number_format($shock?->shock_work_obsolescence_amount ?? 0, 0, ',', ' ')}}
                        </th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Produits de peinture
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            {{number_format($shock?->paint_product_amount ?? 0, 0, ',', ' ')}}
                        </th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Petites fournitures
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            {{number_format($shock?->small_supply_amount ?? 0, 0, ',', ' ')}}
                        </th>
                    </tr>
                    <tr  style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">
                            Total {{$shock?->shockPoint?->label}}
                        </th>
                        <th style="border: 1px solid; font-size: 12px;">
                            <span class="text-danger">{{number_format($shock?->amount ?? 0, 0, ',', ' ')}} FCFA</span>
                        </th>
                    </tr>
                </thead>                    
            </table>
        @endforeach

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">CONCLUSION MONTANT DES RÉPARATIONS TTC</th>
                </tr>
            </thead>
            <tbody style="border: 1px solid; font-size: 12px;">
                @foreach($shocks as $shock)
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        {{mb_strtoupper($shock?->shockPoint?->label ?? '')}}
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($shock?->amount ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
                @endforeach
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        Autres charges
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($assignment?->other_cost_amount ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        Montant total
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($assignment?->total_amount ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
            </tbody>
        </table>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">EVALUATION DE LA VALEUR VENALE</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Date d’expertise
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{ \Carbon\Carbon::parse($assignment?->expertise_date)->format('d/m/Y') ?? ''}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Valeur neuve ou valeur d’achat
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($assignment?->vehicle?->new_market_value ?? 0, 0, ',', ' ')}} FCFA
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Âge à la date d’expertise
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($evaluations?->diff_month ?? 0, 0, ',', ' ')}} mois
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Coefficient de dépréciation théorique
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($evaluations?->theorical_depreciation_rate ?? 0, 2, ',', ' ')}}
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Valeur vénale théorique
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($evaluations?->theorical_vehicle_market_value ?? 0, 0, ',', ' ')}} FCFA
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Moins-value travaux de remise en état
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($evaluations?->less_value_work ?? 0, 0, ',', ' ')}} FCFA
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        @if($evaluations?->is_up)
                            Plus-value incidence kilométrique
                        @else
                            Moins-value incidence kilométrique
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($evaluations?->kilometric_incidence ?? 0, 0, ',', ' ')}} FCFA
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <td style="border: 1px solid; font-size: 12px;">
                        Plus-value incident du marché
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        {{number_format($evaluations?->market_incidence ?? 0, 0, ',', ' ')}} FCFA
                    </td>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        VALEUR VENALE
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">
                            {{number_format($evaluations?->vehicle_market_value ?? 0, 0, ',', ' ')}} FCFA
                        </span>
                    </th>
                </tr>
            </tbody>
        </table>

        <div class="text-center" style="padding-top: 15px;">
            <h4 style="text-transform: uppercase;">{{$numberTransformer->toWords($evaluations?->vehicle_market_value ?? 0)}} FRANCS CFA</h4>
            <p>En foi de, nous delivrons le présent rapport d'expertise pour servir et valoir ce que de droit.</p>
        </div>

        <div class="text-right" style="padding-left: 500px; padding-top: 30px;">
            <div style="font-size: 14px; text-align: center; vertical-align: middle;">
                <b>
                    <div class="p-1 bd-highlight" style="text-decoration: underline;">L'expert</div>
                    <br><br>
                    <div class="p-1 bd-highlight">Bakary FANE</div>
                </b>
            </div>
        </div>

    </body>
</html>
