<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapport d'expertise {{$assignment?->reference ?? ''}} / BCA-CI</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>



        <style>



            <?php include(public_path().'/bootstrap/css/bootstrap.css');?>

            table, caption, th, td {
                border: 0px solid;
                font-size: 12px;
                padding: 2px;
                /* width: 100%; */
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

            .page-number::after {
                content: counter(page);
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

        <table class="table text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; border: 3px solid black; border-spacing: 0px; table-layout: fixed;">
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
                            <b>Experts : <span class="text-danger">{{$assignment->directedBy->code ?? ''}} / {{$assignment->editedBy->code ?? ''}}</span></b><br>
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
                        <div class="p-1 bd-highlight" style="text-align:left;">ASSURE : <b> <span class="text-danger">{{mb_strtoupper($assignment->client->name ?? '')}}</span></b></div>
                        <div class="p-1 bd-highlight" style="text-align:left;">N° Police : <b>{{mb_strtoupper($assignment->policy_number ?? '')}}</b></div>
                        <div class="p-1 bd-highlight" style="text-align:left;">N° Sinistre : <b> <span class="text-danger">{{mb_strtoupper($assignment->claim_number ?? '')}}</span></b></div>
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
            <tbody style="border: 3px solid black; font-size: 10px; margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                <tr style="border: 1px solid; font-size: 10px; margin: 0; padding: 0; border-spacing: 0px;">
                    <th style="border: 1px solid; font-size: 10px; vertical-align: middle; vertical-align: top;" colspan="2">
                        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                            <thead style="border: 1px solid; font-size: 10px;">
                                <tr style="border: 1px solid; font-size: 10px; background-color: rgb(223, 221, 218);">
                                    <th colspan="3" style="border: 1px solid; font-size: 10px;">CARACTERISTIQUES DU VEHICULE</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 10px;">
                                <tr style="border: 1px solid; font-size: 10px;">
                                    <th style="border: 1px solid; font-size: 10px;">IMMATRICULATION <br> <span class="text-danger" style="font-size: 12px;">{{ mb_strtoupper($assignment?->vehicle?->license_plate ?? '')}}</span></th>
                                    <th style="border: 1px solid; font-size: 10px;">GENRE <br> <span style="font-size: 12px;">{{ mb_strtoupper($assignment?->vehicle?->vehicleGenre?->label ?? '')}}</span></th>
                                    <th style="border: 1px solid; font-size: 10px;">MARQUE - MODELE - TYPE - CARROSSERIE <br> <span style="font-size: 12px;">{{ mb_strtoupper($assignment?->vehicle?->brand?->label ?? '')}} - {{ mb_strtoupper($assignment?->vehicle?->vehicleModel?->label ?? '')}} - {{ mb_strtoupper($assignment?->vehicle?->type ?? '')}} {{ mb_strtoupper($assignment?->vehicle?->option ?? '')}} - {{ mb_strtoupper($assignment?->vehicle?->bodywork?->label ?? '')}}</span></th>
                                </tr>
                                <tr style="border: 1px solid; font-size: 10px;">
                                    <th style="border: 1px solid; font-size: 10px;">N° SERIE <br> <span style="font-size: 12px;">{{mb_strtoupper($assignment?->vehicle?->serial_number ?? '')}}</span></th>
                                    <th style="border: 1px solid; font-size: 10px;">NOMBRE DE PLACES <br> <span style="font-size: 12px;">{{number_format($assignment?->vehicle?->nb_seats ?? 0, 0, ',', ' ')}}</span></th>
                                    <th style="border: 1px solid; font-size: 10px;">PUISSANCE FISCALE - ENERGIE <br> <span style="font-size: 12px;">{{number_format($assignment?->vehicle?->fiscal_power ?? 0, 0, ',', ' ')}} - {{ mb_strtoupper($assignment?->vehicle?->vehicleEnergy?->label ?? '')}}</span></th>
                                </tr>
                                <tr style="border: 1px solid; font-size: 10px;">
                                    <th style="border: 1px solid; font-size: 10px;">MISE EN CIRCULATION <br> <span style="font-size: 12px;"> @if($assignment?->vehicle?->first_entry_into_circulation_date) {{ \Carbon\Carbon::parse($assignment?->vehicle?->first_entry_into_circulation_date)->format('d/m/Y') ?? ''}} @else <span></span> @endif</span></th>
                                    <th style="border: 1px solid; font-size: 10px;">COULEUR <br> <span style="font-size: 12px;">{{ mb_strtoupper($assignment?->vehicle?->color?->label ?? '')}}</span></th>
                                    <th style="border: 1px solid; font-size: 10px;">KMS - ETAT GENERAL <br> <span style="font-size: 12px;">{{number_format($assignment?->vehicle?->mileage ?? 0, 0, ',', ' ')}} - {{ mb_strtoupper($assignment?->generalState?->label ?? '')}}</span></th>
                                </tr>
                                <tr style="border: 1px solid; font-size: 10px;">
                                    <th style="border: 1px solid; font-size: 10px;">VALEUR NEUVE <br> 
                                        <span class="text-danger" style="font-size: 12px;">
                                            @if($assignment?->vehicle_new_market_value_option == 'fa' || $assignment?->vehicle_new_market_value_option == 'nc' || $assignment?->vehicle_new_market_value_option == 'nci')
                                                {{ mb_strtoupper($assignment?->vehicle_new_market_value_option)}}
                                            @else
                                                {{number_format($assignment?->new_market_value ?? 0, 0, ',', ' ')}}
                                            @endif
                                        </span>
                                    </th>
                                    <th style="border: 1px solid; font-size: 10px;">DEPRECIATION <br> 
                                    <span style="font-size: 12px;">
                                        @if($assignment?->vehicle_new_market_value_option == 'fa' || $assignment?->vehicle_new_market_value_option == 'nc' || $assignment?->vehicle_new_market_value_option == 'nci')
                                            
                                        @else
                                            @if($assignment?->depreciation_rate > 0)
                                                {{number_format($assignment?->depreciation_rate ?? 0, 2, ',', ' ')}}
                                            @else
                                                
                                            @endif
                                        @endif
                                    </span></th>
                                    <th style="border: 1px solid; font-size: 10px;">VALEUR VENALE <br> 
                                        <span class="text-danger" style="font-size: 12px;">
                                            {{number_format($assignment?->market_value ?? 0, 0, ',', ' ')}}
                                        </span>
                                    </th>                                
                                </tr>
                                <tr style="border: 1px solid; font-size: 10px;">
                                    <th style="border: 1px solid; font-size: 10px;">NATURE DU SINISTRE : <br> <span style="font-size: 10px;">{{ mb_strtoupper($assignment->claimNature->label ?? '')}}</span></th>
                                    <th style="border: 1px solid; font-size: 10px;" colspan="2">POINTS DE CHOCS : <br> 
                                        <span style="font-size: 10px;">
                                        @foreach($shocks as $shock)
                                            {{ mb_strtoupper($shock?->shockPoint?->label ?? '')}} / 
                                        @endforeach
                                        </span>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                    <th style="border: 1px solid; font-size: 9px; vertical-align: top;">
                        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                            <thead style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; background-color: rgb(223, 221, 218);">
                                    <th colspan="3" style="border: 1px solid; font-size: 9px;">DATE D'EXPERTISE / VU AVANT TRAVAUX</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; text-align: left;">
                                    <th class="text-center" style="border: 1px solid; font-size: 9px;" colspan="3">
                                        <b>
                                            <span style="font-size: 12px;">
                                                @if($assignment?->expertise_date)
                                                    {{ \Carbon\Carbon::parse($assignment?->expertise_date)->format('d/m/Y') ?? ''}}
                                                @else
                                                    <span></span>
                                                @endif
                                            </span>
                                        </b>
                                    </th>
                                </tr>
                            </tbody>

                            <thead style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; background-color: rgb(223, 221, 218);">
                                    <th colspan="3" style="border: 1px solid; font-size: 9px;">VU PENDANT TRAVAUX</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; text-align: left;">
                                    <th class="text-center" style="border: 1px solid; font-size: 9px;" colspan="3">
                                            <span style="font-size: 12px;">@if($assignment?->seen_during_work_date){{ \Carbon\Carbon::parse($assignment?->seen_during_work_date)->format('d/m/Y') }} @else <span></span> @endif</span>
                                    </th>
                                </tr>
                            </tbody>

                            <thead style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; background-color: rgb(223, 221, 218);">
                                    <th colspan="3" style="border: 1px solid; font-size: 9px;">VU APRES TRAVAUX</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; text-align: left;">
                                    <th class="text-center" style="border: 1px solid; font-size: 9px;" colspan="3">
                                        <span style="font-size: 12px;">@if($assignment?->seen_after_work_date){{ \Carbon\Carbon::parse($assignment?->seen_after_work_date)->format('d/m/Y') }} @else <span></span> @endif</span>
                                    </th>
                                </tr>
                            </tbody>

                            <thead style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; background-color: rgb(223, 221, 218);">
                                    <th colspan="3" style="border: 1px solid; font-size: 9px;">DURÉE DES TRAVAUX</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; text-align: left;">
                                    <th class="text-center" style="border: 1px solid; font-size: 9px;" colspan="3">
                                        <span style="font-size: 12px;">{{ mb_strtoupper($assignment?->work_duration ?? '')}}</span>
                                    </th>
                                </tr>
                            </tbody>

                            <thead style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; background-color: rgb(223, 221, 218);">
                                    <th colspan="3" style="border: 1px solid; font-size: 9px;">CONCLUSION TECHNIQUE</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 9px;">
                                <tr style="border: 1px solid; font-size: 9px; text-align: left;">
                                    <th style="border: 1px solid; font-size: 9px;" colspan="3">
                                        <div><span class="text-danger" style="font-size: 12px;">{{ mb_strtoupper($assignment?->technicalConclusion?->label ?? '')}}</span></div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
            </tbody>
            <tbody style="border: 3px solid black; font-size: 10px; margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                <tr style="border: 1px solid; font-size: 10px; margin: 0; padding: 0; border-spacing: 0px;">
                    <td style="border: 1px solid; font-size: 10px; vertical-align: middle; vertical-align: top;" colspan="2">
                        @if($cover_photo)
                            <img src="{{ $cover_photo }}" style="width: 100%; height: 30%; object-fit: cover; display: block;">
                        @else
                            <img src="{{ $wbg }}" style="width: 100%; height: 30%; object-fit: cover; display: block;">
                        @endif
                    </td>
                    <td style="border: 1px solid; font-size: 10px; vertical-align: middle; text-align: center;">
                        <table class="table table-borderless text-center" style="margin: 0; padding-bottom: 50px; border-collapse: collapse; width: 100%; border-color: white;">
                            <tbody style="border: 1px white; font-size: 10px;">
                                <tr style="border: 1px white; font-size: 10px; text-align: left;">
                                    <th style="border: 1px white; font-size: 12px;">
                                        <div>REPARATEUR : <span class="text-danger">{{ mb_strtoupper($assignment?->repairer?->name ?? '')}}</span></div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <b style="text-align: center;">
                            <div class="p-1 bd-highlight" style="font-size: 20px;">PRÉJUDICE <br> <span class="text-danger">
                                @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code != 'TC001')
                                    {{number_format(($assignment?->market_value - $assignment?->salvage_value + $assignment?->other_cost_amount) ?? 0, 0, ',', ' ')}} FCFA
                                @else
                                    {{number_format($assignment?->total_amount ?? 0, 0, ',', ' ')}} FCFA
                                @endif
                            </span></div>
                        </b>
                        <br>
                        @if($assignment->expert_report_remark)
                            @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code == 'TC001')
                                <p style="font-size: 12px; text-align: left; margin-top: 100px;">
                                    <b>Note d'expert :</b> Voir page 2
                                </p>
                            @else
                                <p style="font-size: 10px; text-align: left; margin-top: 100px;">
                                    <b>Note d'expert :</b> Voir la section <b>"NOTE D'EXPERT"</b>
                                </p>
                            @endif
                        @endif
                    </td>
                </tr>
            </tbody>
            <tbody style="border: 3px solid black; font-size: 10px; margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                <tr style="border: 1px solid; font-size: 10px; margin: 0; padding: 0; border-spacing: 0px;">
                    <th style="border: 1px solid; font-size: 10px; vertical-align: middle; vertical-align: top;" colspan="2">
                        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                            <thead style="border: 1px solid; font-size: 10px;">
                                <tr style="border: 1px solid; font-size: 10px; background-color: rgb(223, 221, 218);">
                                    <th colspan="2" style="border: 1px solid; font-size: 10px;">QUITTANCE</th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid; font-size: 11px;">
                                @foreach($receipts as $receipt)
                                @if($receipt?->receiptType?->code == 'work_fee')
                                <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                    <th style="border: 1px solid; font-size: 11px;">
                                        {{ mb_strtoupper($receipt?->receiptType?->label ?? '')}}
                                    </th>
                                    <th style="border: 1px solid; font-size: 11px;">
                                        {{number_format($receipt?->amount_excluding_tax ?? 0, 0, ',', ' ')}}
                                    </th>
                                </tr>
                                @endif
                                @endforeach
                                @foreach($receipts as $receipt)
                                @if($receipt?->receiptType?->code != 'work_fee')
                                <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                    <th style="border: 1px solid; font-size: 11px;">
                                        {{ mb_strtoupper($receipt?->receiptType?->label ?? '')}}
                                    </th>
                                    <th style="border: 1px solid; font-size: 11px;">
                                        {{number_format($receipt?->amount_excluding_tax ?? 0, 0, ',', ' ')}}
                                    </th>
                                </tr>
                                @endif
                                @endforeach
                                <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                    <th style="border: 1px solid; font-size: 11px;">
                                        TOTAL HT
                                    </th>
                                    <th style="border: 1px solid; font-size: 11px;">
                                        <span class="text-danger">{{number_format($assignment?->receipt_amount_excluding_tax ?? 0, 0, ',', ' ')}}</span>
                                    </th>
                                </tr>
                                <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                    <th style="border: 1px solid; font-size: 11px;">
                                        TVA
                                    </th>
                                    <th style="border: 1px solid; font-size: 11px;">
                                        <span class="text-danger">{{number_format($assignment?->receipt_amount_tax ?? 0, 0, ',', ' ')}}</span>
                                    </th>
                                </tr>
                                <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                    <th style="border: 1px solid; font-size: 11px;">
                                        TOTAL TTC
                                    </th>
                                    <th style="border: 1px solid; font-size: 11px;">
                                        <span class="text-danger">{{number_format($assignment?->receipt_amount ?? 0, 0, ',', ' ')}}</span>
                                    </th>
                                </tr>
                                @if($assignment?->status_id == 3 || $assignment?->status_id == 4 || $assignment?->status_id == 5)
                                    <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                        <th style="border: 1px solid; font-size: 11px;">
                                            AVANCE
                                        </th>
                                        <th style="border: 1px solid; font-size: 11px;">
                                            <span class="text-danger">{{number_format($total_payment ?? 0, 0, ',', ' ')}}</span>
                                        </th>
                                    </tr>
                                    <tr style="border: 1px solid; font-size: 11px; text-align: left;">
                                        <th style="border: 1px solid; font-size: 11px;">
                                            SOLDE
                                        </th>
                                        <th style="border: 1px solid; font-size: 11px;">
                                            <span class="text-danger">{{number_format(($assignment?->receipt_amount - $total_payment) ?? 0, 0, ',', ' ')}}</span>
                                        </th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </th>
                    <th style="border: 1px solid; font-size: 12px; text-align: center; vertical-align: middle;">
                        <b>
                            <div class="p-1 bd-highlight" style="text-decoration: underline;">L'expert</div>
                            <br><br>
                            <div class="p-1 bd-highlight">Bakary FANE</div>
                        </b>
                    </th>
                </tr>
            </tbody>
        </table>
        
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
        @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code == 'TC001' && $assignment?->expert_report_remark)
        <table id="note-expert" class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">NOTE D'EXPERT</th>
                </tr>
            </thead>
        </table>
        <div class="text-left" style="padding-top: 5px;">
            {!!$assignment?->expert_report_remark ?? ''!!}
        </div>
        @endif

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">REMISE EN ÉTAT</th>
                </tr>
            </thead>
        </table>
        @if(count($shocks) > 0)
            @foreach($shocks as $shock)
                <div class="text-left d-flex flex-column bd-highlight mt-2 mb-1">
                    <div class="p-2 bd-highlight"><b style="text-decoration: underline;">
                        @if($assignment?->claimNature?->code == 'accident_collision' || $assignment?->claimNature?->code == 'ice_break' || $assignment?->claimNature?->code == 'vandalism')
                            POINT DE CHOC
                        @elseif($assignment?->claimNature?->code == 'fire')
                            POINT DE FEU
                        @else
                            
                        @endif
                    </b> : {{ mb_strtoupper($shock?->shockPoint?->label ?? '')}}</div>
                </div>
                @if(count($shock?->shockWorks) > 0)
                <table class="table table-bordered text-center">
                    <thead style="border: 1px solid;
                        font-size: 12px;
                    ">
                        <tr style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px; width:250px; vertical-align: middle;">Fourniture</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Dépose / pose</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Remp</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Rep</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Peint</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Montant HT</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Remise</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Montant Calculé</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Vétuste (%)</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Montant Calculé</th>
                            <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">Montant TTC</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($shock?->shockWorks as $item)
                        <tr style="border: 1px solid; font-size: 12px;">
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{ mb_strtoupper($item?->supply?->label ?? '')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                @if($item?->disassembly)
                                <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                                @endif
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                @if($item?->replacement)
                                <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                                @endif
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                @if($item?->repair)
                                <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                                @endif
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                @if($item?->paint)
                                <img src="{{$check_icon}}" alt="" width="12" style="padding-top:3px;">
                                @endif
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{number_format($item?->amount ?? 0, 0, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{number_format($item?->discount ?? 0, 2, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{number_format(($item?->amount ?? 0) - ($item?->discount_amount_excluding_tax ?? 0), 0, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{number_format($item?->obsolescence_rate ?? 0, 2, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{number_format($item?->new_amount_excluding_tax ?? 0, 0, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                                {{number_format($item?->recovery_amount ?? 0, 0, ',', ' ')}}
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
                                    <div class="p-1 bd-highlight">MONTANT PIÈCE NEUVES HT : {{number_format($shock?->shock_work_new_amount_excluding_tax ?? 0, 0, ',', ' ')}} FCFA</div>
                                    <div class="p-1 bd-highlight">MONTANT PIÈCE NEUVES TTC : {{number_format($shock?->shock_work_new_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                                    <div class="p-1 bd-highlight">MONTANT TOTAL REMISSE TTC : {{number_format($shock?->shock_work_discount_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                                    <div class="p-1 bd-highlight" style="color: red;">MONTANT TOTAL VETUSTÉ TTC : {{number_format($shock?->shock_work_obsolescence_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                                    <div class="p-1 bd-highlight">MONTANT PIÈCE RÉCUPÉRATION TTC : {{number_format($shock?->shock_work_recovery_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                                </b>
                            </div>
                        </tr>
                    </thead>                    
                </table>
                <br>
                @endif
                @if(count($shock?->workforces) > 0)
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
                                {{ mb_strtoupper($item->workforceType->label ?? '')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px;">
                                {{number_format($item->nb_hours ?? 0, 2, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px;">
                                {{number_format($item->work_fee ?? 0, 0, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px;">
                                {{number_format($item->discount ?? 0, 2, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px;">
                                {{number_format($item->amount_excluding_tax ?? 0, 0, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px;">
                                {{number_format($item->amount_tax ?? 0, 0, ',', ' ')}}
                            </td>
                            <td style="border: 1px solid; font-size: 12px;">
                                {{number_format($item->amount ?? 0, 0, ',', ' ')}}
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
                                    <div class="p-1 bd-highlight">TOTAL MAIN D'OEUVRE HT : {{number_format($shock?->workforce_amount_excluding_tax ?? 0, 0, ',', ' ')}} FCFA</div>
                                    <div class="p-1 bd-highlight">TOTAL MAIN D'OEUVRE TVA : {{number_format($shock?->workforce_amount_tax ?? 0, 0, ',', ' ')}} FCFA</div>
                                    <div class="p-1 bd-highlight">TOTAL MAIN D'OEUVRE TTC : {{number_format($shock?->workforce_amount ?? 0, 0, ',', ' ')}} FCFA</div>
                                </b>
                            </div>
                        </tr>
                    </thead>                    
                </table>
                @endif
                <table class="table table-bordered text-left">
                    <thead style="border: 1px solid; font-size: 12px;">
                        <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                            <th class="text-center" style="border: 1px solid; font-size: 12px;" colspan="2">RECAPITULATIF</th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                TOTAL MAIN D'OEUVRE
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                {{number_format($shock?->workforce_amount ?? 0, 0, ',', ' ')}}
                            </th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                TOTAL FOURNITURES NEUVES
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                {{number_format($shock->shock_work_new_amount ?? 0, 0, ',', ' ')}}
                            </th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                TOTAL FOURNITURES RÉCUPÉRATION
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                {{number_format($shock->shock_work_recovery_amount ?? 0, 0, ',', ' ')}}
                            </th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                TOTAL FOURNITURES VETUSTÉ
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                {{number_format($shock->shock_work_obsolescence_amount ?? 0, 0, ',', ' ')}}
                            </th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                PRODUITS DE PEINTURE
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                {{number_format($shock->paint_product_amount ?? 0, 0, ',', ' ')}}
                            </th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                PETITES FOURNITURES
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                {{number_format($shock->small_supply_amount ?? 0, 0, ',', ' ')}}
                            </th>
                        </tr>
                        <tr  style="border: 1px solid; font-size: 12px;">
                            <th style="border: 1px solid; font-size: 12px;">
                                TOTAL {{$shock?->shockPoint?->label}}
                            </th>
                            <th style="border: 1px solid; font-size: 12px;">
                                <span class="text-danger">{{number_format($shock?->amount ?? 0, 0, ',', ' ')}} FCFA</span>
                            </th>
                        </tr>
                    </thead>                    
                </table>
            @endforeach
        @endif

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">CONCLUSION MONTANT DES PRÉJUDICES</th>
                </tr>
            </thead>
            <tbody style="border: 1px solid; font-size: 12px;">
                @foreach($shocks as $shock)
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        {{ mb_strtoupper($shock?->shockPoint?->label ?? '')}}
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($shock?->amount ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
                @endforeach
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        AUTRES CHARGES
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($assignment?->other_cost_amount ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code == 'TC001')
                            PRÉJUDICE
                        @else
                            MONTANT TOTAL POINTS DE CHOC
                        @endif
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($assignment?->total_amount ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
            </tbody>
        </table>

        @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code != 'TC001' && $assignment?->expert_report_remark)
        <br>
        <table id="note-expert" class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">NOTE D'EXPERT</th>
                </tr>
            </thead>
        </table>
        <div class="text-left" style="padding-top: 5px;">
            {!!$assignment?->expert_report_remark ?? ''!!}
        </div>
        @endif

        @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code != 'TC001')
        <br>
        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">{{ mb_strtoupper($assignment?->technicalConclusion?->label ?? '')}}</th>
                </tr>
            </thead>
            <tbody style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        VALEUR VÉNALE AVANT SINISTRE
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($assignment?->market_value ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        VALEUR VÉNALE APRÈS SINISTRE (SAUVETAGE)
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format($assignment?->salvage_value ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px; text-align: left;">
                    <th style="border: 1px solid; font-size: 12px;">
                        PRÉJUDICE
                    </th>
                    <th style="border: 1px solid; font-size: 12px;">
                        <span class="text-danger">{{number_format(($assignment?->market_value - $assignment?->salvage_value) ?? 0, 0, ',', ' ')}} FCFA</span>
                    </th>
                </tr>
            </tbody>
        </table>
        @endif

        @if($assignment?->technicalConclusion && $assignment?->technicalConclusion?->code == 'TC001')
        <div class="text-center" style="padding-top: 15px;">
            <h4 style="text-transform: uppercase;">{{$numberTransformer->toWords($assignment?->total_amount)}} FRANCS CFA</h4>
            <p>En foi de, nous delivrons le présent rapport d'expertise pour servir et valoir ce que de droit.</p>
        </div>
        @else
        <div class="text-center" style="padding-top: 15px;">
            <h4 style="text-transform: uppercase;">{{$numberTransformer->toWords($assignment?->market_value - $assignment?->salvage_value)}} FRANCS CFA</h4>
            <p>En foi de, nous delivrons le présent rapport d'expertise pour servir et valoir ce que de droit.</p>
        </div>
        @endif

        @if($photos_before_works && count($photos_before_works) > 0)
        <div style="page-break-after: always;"></div>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">PHOTOS DU VÉHICULE AVANT TRAVAUX</th>
                </tr>
            </thead>
        </table>

        <div style="padding-top: 20px; margin: 10px;">
        @foreach($photos_before_works as $photo)
            @if($photo)
                <img src="{{ $photo }}" style="width: 100%; height: 48%; object-fit: cover; display: block; padding-bottom: 5px;">
            @endif
        @endforeach
        </div>
        @endif

        @if($photos_during_works && count($photos_during_works) > 0)
        <div style="page-break-after: always;"></div>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">PHOTOS DU VÉHICULE PENDANT TRAVAUX</th>
                </tr>
            </thead>
        </table>

        <div style="padding-top: 20px; margin: 10px;">
        @foreach($photos_during_works as $photo)
            @if($photo)
                <img src="{{ $photo }}" style="width: 100%; height: 48%; object-fit: cover; display: block; padding-bottom: 5px;">
            @endif
        @endforeach
        </div>
        @endif

        @if($photos_after_works && count($photos_after_works) > 0)
        <div style="page-break-after: always;"></div>

        <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%; padding-top: 10px;">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th colspan="2" style="border: 1px solid; font-size: 12px;">PHOTOS DU VÉHICULE APRÈS TRAVAUX</th>
                </tr>
            </thead>
        </table>

        <div style="padding-top: 20px; margin: 10px;">
        @foreach($photos_after_works as $photo)
            @if($photo)
                <img src="{{ $photo }}" style="width: 100%; height: 48%; object-fit: cover; display: block; padding-bottom: 5px;">
            @endif
        @endforeach
        </div>
        @endif
    </body>
</html>
