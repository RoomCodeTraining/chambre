<!DOCTYPE html>
<html lang="str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fiche des travaux {{$assignment->reference}} / BCA-CI</title>

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
                bottom: 0.5cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                margin-left: 1cm;
                margin-right: 1cm;
                font-size: 9px;

                /** Extra personal styles **/
                text-align: center;
            }

            .relative {
                position: relative;
            }

            .left {
                position: absolute;
                left: 0;
            }

            .center {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .right {
                position: absolute;
                right: 0;
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
        </footer>

        <table class="table text-center" style="border-spacing: 0px;">
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;" colspan="3">FICHE D'EXPERTISE AUTOMOBILE <span class="text-danger">N° {{$assignment->reference}}</span></th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;" colspan="2">
                        <img src="{{$logo ?? ''}}" alt="logo" style="text-align: center; width:120px; height:50px;">
                        <br>
                        <br>
                        <div style="text-align: left; padding-left: 10px; padding-bottom: 10px;">
                            <b>Expert : <span class="text-danger">{{$assignment?->directedBy?->last_name ?? ''}} {{$assignment?->directedBy?->first_name ?? ''}}</span></b><br>
                            <b>Réparateur : {{$assignment?->repairer?->name ?? ''}}</b><br>
                            <b>Avance en FCFA : {{number_format($payment?->amount ?? 0, 0, ',', ' ')}} FCFA</b><br>
                            <b>Point de choc : </b><br>
                        </div>
                    </th>
                    <th style="border: 1px solid; font-size: 12px; text-align: left; vertical-align: top;">
                        <div class="p-1 bd-highlight">Commetant : 
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
                        <div class="p-1 bd-highlight">Affaire : <b>{{$assignment?->client?->name ?? ''}}</b></div>
                        <div class="p-1 bd-highlight">Contact Client : <b>{{$assignment?->client?->phone_1 ?? ''}} {{$assignment?->client?->phone_2 ?? ''}}</b></div>
                        <div class="p-1 bd-highlight">N° Police : <b>{{$assignment?->policy_number ?? ''}}</b></div>
                        <div class="p-1 bd-highlight">N° Sinistre : <b>{{$assignment?->claim_number ?? ''}}</b></div>
                        <div class="p-1 bd-highlight">Date du sinistre : 
                            <b>
                                <span class="text-danger">
                                    @if($assignment?->claim_date)
                                        {{ \Carbon\Carbon::parse($assignment?->claim_date)->format('d/m/Y') ?? ''}}
                                    @endif
                                </span>
                            </b>
                        </div>
                        <div class="p-1 bd-highlight">Date d'expertise : 
                            <b>
                                <span class="text-danger">
                                    @if($assignment?->expertise_date)
                                        {{ \Carbon\Carbon::parse($assignment?->expertise_date)->format('d/m/Y') ?? ''}}
                                    @endif
                                </span>
                            </b>
                        </div>
                        <div class="p-1 bd-highlight">Lieu d'expertise : <b>{{$assignment?->expertise_place ?? ''}}</b></div>
                    </th>
                </tr>
            </thead>
            <tbody style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px;" colspan="3">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;" colspan="3">
                        <table width="100%" class="table text-left" style="border: 1px white; font-size: 12px;">
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <th width="33%" style="padding: 10px; border: 1px white; font-size: 12px; text-align: center;" colspan="3">
                                    <b>CARACTERISTIQUES DU VEHICULE</b>
                                </th>
                            </tr>
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <td width="33%" style="border: 1px white; font-size: 12px;">Immatriculation : <span class="text-danger">{{$assignment?->vehicle?->license_plate ?? ''}}</span></td>
                                <td width="33%" style="border: 1px white; font-size: 12px;">N° Série : {{$assignment?->vehicle?->serial_number ?? ''}}</td>
                                <td width="34%" style="border: 1px white; font-size: 12px;">Valeur neuve : </td>
                            </tr>
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <td width="33%" style="border: 1px white; font-size: 12px;">Marque - Modèle : {{ $assignment?->vehicle?->brand?->label ?? '' }} {{ $assignment?->vehicle?->vehicleModel?->label ?? '' }}</td>
                                <td width="33%" style="border: 1px white; font-size: 12px;">Genre : {{$assignment?->vehicle?->vehicleGenre?->label ?? ''}}</td>
                                <td width="34%" style="border: 1px white; font-size: 12px;">Dépréciation : </td>
                            </tr>
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <td width="33%" style="border: 1px white; font-size: 12px;">Nombre de places : {{$assignment?->vehicle?->nb_seats ?? ''}}</td>
                                <td width="33%" style="border: 1px white; font-size: 12px;">Couleur : {{$assignment?->vehicle?->color?->label ?? ''}}</td>
                                <td width="34%" style="border: 1px white; font-size: 12px;">Valeur vénale : </td>
                            </tr>
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <td width="33%" style="border: 1px white; font-size: 12px;">KM Compteur : {{$assignment?->vehicle?->mileage ?? ''}}</td>
                                <td width="33%" style="border: 1px white; font-size: 12px;">Puissance fiscale : {{$assignment?->vehicle?->fiscal_power ?? ''}}</td>
                                <td width="34%" style="border: 1px white; font-size: 12px;">État général : </td>
                            </tr>
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <td width="33%" style="border: 1px white; font-size: 12px;">Énergie : {{$assignment?->vehicle?->vehicleEnergy?->label ?? ''}}</td>
                                <td width="34%" style="border: 1px white; font-size: 12px;">Date de visite technique : @if($assignment?->vehicle?->technical_visit_date) {{ \Carbon\Carbon::parse($assignment?->vehicle?->technical_visit_date)->format('d/m/Y') ?? ''}} @endif</td>
                                <td width="33%" style="border: 1px white; font-size: 12px;">Mise en circulation : @if($assignment?->vehicle?->first_entry_into_circulation_date) {{ \Carbon\Carbon::parse($assignment?->vehicle?->first_entry_into_circulation_date)->format('d/m/Y') ?? ''}} @endif</td>
                            </tr>
                            <tr style="border: 1px white; font-size: 12px;" colspan="3">
                                <td width="33%" style="border: 1px white; font-size: 12px;">Vu avant travaux : @if($assignment?->seen_before_work_date) {{ \Carbon\Carbon::parse($assignment?->seen_before_work_date)->format('d/m/Y') ?? ''}} @endif</td>
                                <td width="34%" style="border: 1px white; font-size: 12px;">Vu pendant travaux : @if($assignment?->seen_during_work_date) {{ \Carbon\Carbon::parse($assignment?->seen_during_work_date)->format('d/m/Y') ?? ''}} @endif</td>
                                <td width="33%" style="border: 1px white; font-size: 12px;">Vu après travaux : @if($assignment?->seen_after_work_date) {{ \Carbon\Carbon::parse($assignment?->seen_after_work_date)->format('d/m/Y') ?? ''}} @endif</td>
                            </tr>
                        </table>
                    </th>
                    
                </tr>
            </tbody>
        </table>

        

        <table class="table table-bordered text-center" style="border-spacing: 0px;">
            <thead style="border: 1px solid;
                font-size: 10px;
                ">
                <tr style="border: 1px solid; font-size: 10px;">
                    <th style="border: 1px solid; font-size: 10px;">Fourniture</th>
                    <th style="border: 1px solid; font-size: 10px;">Demonter</th>
                    <th style="border: 1px solid; font-size: 10px;">Reparer</th>
                    <th style="border: 1px solid; font-size: 10px;">Remplacer</th>
                    <th style="border: 1px solid; font-size: 10px;">Peindre</th>
                    <th style="border: 1px solid; font-size: 10px;">Four (HT)</th>
                    <th style="border: 1px solid; font-size: 10px;">TTC ou occassion</th>
                    <th style="border: 1px solid; font-size: 10px;" colspan="2">Main d'oeuvre</th>
                </tr>
                </thead>
            <tbody style="border: 1px solid; font-size: 10px; border-spacing: 0px;">
                    <tr style="border: 1px solid; font-size: 10px; border-spacing: 0px;">
                        <td style="border: 1px solid; font-size: 10px;">
                            <span style="text-align: left; color: white;">
                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                            </span>
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px; text-align: left;" rowspan="22" colspan="2">
                            <div class="p-1 bd-highlight">
                                <b>
                                @foreach($workforce_types as $workforce_type)
                                    {{$workforce_type?->label ?? ''}} :<br>
                                @endforeach
                                </b>
                            </div>
                            <br>

                            <div class="p-1 bd-highlight">
                                <b>
                                    Total HT : <br>
                                    TVA {{config('services.settings.tax_rate')}}%  : <br>
                                    Total TTC MO :<br>
                                </b>
                            </div>

                            <div class="p-1 bd-highlight">
                                <b>
                                    s/r Garantie : <br>
                                    Remorquage : <br>
                                    Travaux ext : <br>
                                </b>
                            </div>

                            <div class="p-1 bd-highlight">
                                <b>
                                    Prejudice : <br>
                                    Réparateur : <br>
                                </b>
                            </div>
                            <div class="p-1 bd-highlight"><b>Abidjan le {{ \Carbon\Carbon::now()->format('d/m/Y') }} </b></div>
                        </td>
                    </tr>
                @for($i = 1; $i < 22; $i++)
                    <tr style="border: 1px solid; font-size: 10px; border-spacing: 0px;">
                        <td style="border: 1px solid; font-size: 10px;">
                            <span style="text-align: left; color: white;">
                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                            </span>
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        <td style="border: 1px solid; font-size: 10px;">
                            
                        </td>
                        
                    </tr>
                @endfor
                <tr style="border: 1px solid; font-size: 10px;">
                    <td style="border: 1px solid; font-size: 10px;" colspan="9">
                        <b>Accord définitif sur le montant des dommages, sous toutes réserves de fait et de droit quant aux responsabilités.</b>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
