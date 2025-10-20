<!DOCTYPE html>
<html lang="str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fiche des travaux {{$assignment?->reference ?? ''}} / BCA-CI</title>

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
                position: absolute;
                opacity: 0.12;
                font-size: 75px;
                width: 100%;
                z-index: 100;
                transform: rotate(-45deg);
                text-align: center;
            }

            @page {
                margin: 0cm 0cm;
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
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                margin-left: 1cm;
                margin-right: 1cm;
                font-size: 9px;

                /** Extra personal styles **/
                text-align: center;
            }

        </style>
    </head>
    <body class="antialiased">
        {{-- <header>
            Our Code World
        </header> --}}
        <footer>
            <hr style="border: 1px solid black;">
            <b>SARL au Capital de 5.000.000 FCFA | RCCM : CI-ABJ-03-2025-813-04454</b><br>
            <b>NCC : 2502756B – Tel : (+225) 07 07 17 00 40 / 27 21 35 91 32 / 27 21 34 17 30</b><br>
            <b>Siège social : Abidjan, Marcory CAP SUD, Rue Thomas Edison</b><br>
            <b>Numéro de Compte Bancaire NSIA BANQUE : CI042 01228 085807302001 11</b>
        </footer>

        <table class="table text-center">
            <thead style="border: 1px solid; font-size: 12px;">
            <tr style="border: 1px solid; font-size: 12px;">
                <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                    <img src="{{$logo}}" alt="logo" style="text-align: center; width:170px; height:100px;">
                </th>
                <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">FICHE DE TRAVAUX <span class="text-danger">N° {{$assignment->reference ?? ''}}</span></th>
                <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                    <img src="{{$qr_code}}" alt="qr_code" style="text-align: center; width:100px; height:100px;">
                    <br>
                    DATE: {{ \Carbon\Carbon::parse($assignment?->establishment_date)->format('d/m/Y') }}

                </th>
            </tr>
            </thead>
        </table>

        <table class="table text-center">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px;">
                <th colspan="3" style="border: 1px solid; font-size: 12px;">DOSSIER SUIVI PAR :</th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px;">EXPERT</th>
                    <th style="border: 1px solid; font-size: 12px;">REPARATEUR</th>
                    <th style="border: 1px solid; font-size: 12px;">CLIENT</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <div class="p-1 bd-highlight">NOM : <b>{{$assignment?->workSheetEstablishedBy?->last_name ?? ''}} {{$assignment?->workSheetEstablishedBy?->first_name ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">CONTACT : <b>{{$assignment?->workSheetEstablishedBy?->telephone ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">E-MAIL : <b>{{$assignment?->workSheetEstablishedBy?->email ?? ''}}</b></div>
                        </div>
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <div class="p-1 bd-highlight">NOM : <b>{{$assignment?->repairer?->name ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">CONTACT : <b>{{$assignment?->repairer?->telephone ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">E-MAIL : <b>{{$assignment?->repairer?->email ?? ''}}</b></div>
                        </div>
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <div class="p-1 bd-highlight">NOM : <b>{{$assignment?->client?->name ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">CONTACT : <b>{{$assignment?->client?->phone_1 ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">E-MAIL : <b>{{$assignment?->client?->email ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">Assureur : 
                                <b>
                                    @if($assignment?->broker)
                                        {{mb_strtoupper($assignment?->broker?->name ?? '')}} 
                                        @if($assignment?->insurer)
                                            ({{mb_strtoupper($assignment?->insurer?->name ?? '')}})
                                        @endif
                                    @else
                                        {{mb_strtoupper($assignment?->insurer?->name ?? '')}} 
                                    @endif
                                </b>
                            </div>
                            <div class="p-1 bd-highlight">Numéro de sinistre : <b>{{$assignment?->claim_number ?? ''}}</b></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


        <table class="table table-bordered text-center">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th colspan="5" style="border: 1px solid; font-size: 12px;">IDENTIFICATION DU VEHICULE</th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px;">IMMATRICULATION</th>
                    <th style="border: 1px solid; font-size: 12px;">MARQUE</th>
                    <!-- <th style="border: 1px solid; font-size: 12px;">MODELE - TYPE - OPTION</th> -->
                    @if(!$assignment?->vehicle?->type && !$assignment?->vehicle?->option)
                    <th style="border: 1px solid; font-size: 12px;">MODELE</th>
                    @elseif(!$assignment?->vehicle?->type)
                    <th style="border: 1px solid; font-size: 12px;">MODELE - OPTION</th>
                    @elseif(!$assignment?->vehicle?->option)
                    <th style="border: 1px solid; font-size: 12px;">MODELE - TYPE</th>
                    @else
                    <th style="border: 1px solid; font-size: 12px;">MODELE - TYPE - OPTION</th>
                    @endif
                    <th style="border: 1px solid; font-size: 12px;">COULEUR</th>
                    <th style="border: 1px solid; font-size: 12px;">KILOMETRAGE</th>
                </tr>
                </thead>
            <tbody>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->license_plate ?? ''}}</td>
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->brand?->label ?? ''}}</td>
                    @if(!$assignment?->vehicle?->type && !$assignment?->vehicle?->option)
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->vehicleModel?->label ?? ''}}</td>
                    @elseif(!$assignment?->vehicle?->type && $assignment?->vehicle?->option)
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->vehicleModel?->label ?? ''}} - {{$assignment?->vehicle?->option ?? ''}}</td>
                    @elseif($assignment?->vehicle?->type && !$assignment?->vehicle?->option)
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->vehicleModel?->label ?? ''}} - {{$assignment?->vehicle?->type ?? ''}}</td>
                    @else
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->vehicleModel?->label ?? ''}} - {{$assignment?->vehicle?->type ?? ''}} - {{$assignment?->vehicle?->option ?? ''}}</td>
                    @endif
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->color?->label ?? ''}}</td>
                    <td style="border: 1px solid; font-size: 12px;">{{$assignment?->vehicle?->mileage ?? ''}} km</td>
                </tr>
            </tbody>
        </table>

        <div class="watermark">{{$assignment?->reference ?? ''}} {{$assignment?->vehicle?->license_plate ?? ''}}</div>

        @foreach($shocks as $shock)
            <div class="text-left d-flex flex-column bd-highlight mt-2 mb-1">
                <div class="p-2 bd-highlight"><b>POINT DE CHOC</b> : {{$shock?->shockPoint?->label ?? ''}}</div>
            </div>

            <?php  $i = 0; ?>

            <table class="table table-bordered text-center">
                <thead style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <tr style="border: 1px solid; font-size: 12px;">
                        <th colspan="7" style="border: 1px solid; font-size: 12px;">TRAVAUX A FAIRE SOUS RESERVE DE DEMONTAGE</th>
                    </tr>
                </thead>
                <thead style="border: 1px solid;
                    font-size: 12px;
                   ">
                    <tr style="border: 1px solid; font-size: 12px;">
                        <th style="border: 1px solid; font-size: 12px;">N°</th>
                        <th style="border: 1px solid; font-size: 12px;">DESIGNATION</th>
                        <th style="border: 1px solid; font-size: 12px;">DEMONTAGE</th>
                        <th style="border: 1px solid; font-size: 12px;">REMPLACEMENT</th>
                        <th style="border: 1px solid; font-size: 12px;">REPARATION</th>
                        <th style="border: 1px solid; font-size: 12px;">PEINDRE</th>
                        <th style="border: 1px solid; font-size: 12px;">VETUSTÉ</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach($shock?->shockWorks as $item)
                    <?php  $i = $i + 1; ?>
                    <tr style="border: 1px solid; font-size: 12px;">
                        <td style="border: 1px solid; font-size: 12px;">{{ $i }}</td>
                        <td style="border: 1px solid; font-size: 12px;">{{$item?->supply?->label ?? ''}}</td>
                        <td style="border: 1px solid; font-size: 12px;">
                            @if($item?->disassembly)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            @if($item?->replacement)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            @if($item?->repair)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            @if($item?->paint)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                        <td style="border: 1px solid; font-size: 12px;">
                            @if($item?->obsolescence)
                            <img src="{{$check_icon}}" alt="" width="15" style="padding-top:2px;">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <div class="text-left d-flex flex-column bd-highlight">
            <div class="p-2 bd-highlight"><b>NOTE D'EXPERT</b> :
            {!!$assignment?->expert_work_sheet_remark!!}
            </div>
        </div>
        <table class="table text-center table-borderless">
            <thead style="border: 0px solid; font-size: 12px; padding: 5px;">
                <tr style="border: 0px solid; font-size: 12px; padding: 5px;">
                    <th style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        EXPERT
                    </th>
                    <th style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        CLIENT
                    </th>
                    <th style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        REPARATEUR
                    </th>
                </tr>
                <tr style="border: 0px solid; font-size: 12px; padding: 5px;">
                    @if($assignment?->workSheetEstablishedBy && $assignment?->workSheetEstablishedBy?->signature)
                    <td style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        <img src="{{$signature}}" width="190" height="100" alt="expert_signature">
                    </td>
                    @else
                    <td style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        <img src="{{$wbg}}" width="190" height="100" alt="expert_signature">
                    </td>
                    @endif
                    @if($assignment?->customer_signature)
                    <td style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        <img src="{{$assignment?->customer_signature}}" width="190" height="100" alt="customer_signature">
                    </td>
                    @else
                    <td style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        <img src="{{$wbg}}" width="190" height="100" alt="customer_signature">
                    </td>
                    @endif
                    @if($assignment?->repairer_signature)
                    <td style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        <img src="{{$assignment?->repairer_signature}}" width="190" height="100" alt="repairer_signature">
                    </td>
                    @else
                    <td style="border: 0px solid; font-size: 12px; padding: 5px;" class="p-3">
                        <img src="{{$wbg}}" width="190" height="100" alt="repairer_signature">
                    </td>
                    @endif
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;" colspan="3">
                        <b> <span class="text-danger">Le montant de la vetusté est à la charge de l'assuré.</span></b>
                    </td>
                </tr>
            </thead>
        </table>
    </body>
</html>
