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
            <b>{{$assignment?->expertFirm?->footer_description ?? ''}}</b><br>
        </footer>

        <table class="table text-center">
            <thead style="border: 1px solid; font-size: 12px;">
            <tr style="border: 1px solid; font-size: 12px;">
                <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                    <img src="{{$logo}}" alt="logo" style="text-align: center; width:170px; height:100px;">
                </th>
                <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">FICHE D'INFORMATIONS <span class="text-danger">N° {{$assignment->reference ?? ''}}</span></th>
                <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                    <img src="{{$qr_code}}" alt="qr_code" style="text-align: center; width:100px; height:100px;">
                    <br>
                    DATE: {{ \Carbon\Carbon::parse($assignment?->establishment_date)->format('d/m/Y') }}

                </th>
            </tr>
            </thead>
        </table>

        <table class="table text-center" style="border-spacing: 0px;">
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;" colspan="2">INFORMATIONS</span></th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Gestionnaire du dossier
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->openedBy?->last_name ?? ''}} {{$assignment?->openedBy?->first_name ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Source de la mission
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->source_of_mission ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Assureur / Courtier
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->insurer?->name ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Nom de l'assuré
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->client?->name ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Contact de l'assuré
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->client?->phone_1 ?? '-'}} / {{$assignment?->client?->phone_2 ?? '-'}} / {{$assignment?->client?->email ?? '-'}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        N° de police
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->policy_number ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        N° de sinistre
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->claim_number ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Date du sinistre
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>
                            @if($assignment?->claim_starts_at)
                                {{ \Carbon\Carbon::parse($assignment?->claim_starts_at)->format('d/m/Y') ?? ''}}
                            @endif
                        </b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Circonstances du sinistre
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->claim_circumstances ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Dégâts déclarés
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->damage_declared ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Observation mission
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->observation ?? ''}}</b>
                    </th>
                </tr>
            </thead>
        </table>

        <table class="table text-center">
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th colspan="2" style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">CHARGE DE LA MISSION</th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px;">EXPERT</th>
                    <th style="border: 1px solid; font-size: 12px;">REPARATEUR</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border: 1px solid; font-size: 12px;">
                    <td style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <div class="p-1 bd-highlight">NOM : <b>{{$assignment?->directedBy?->last_name ?? ''}} {{$assignment?->directedBy?->first_name ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">CONTACT : <b>{{$assignment?->directedBy?->telephone ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">E-MAIL : <b>{{$assignment?->directedBy?->email ?? ''}}</b></div>
                        </div>
                    </td>
                    <td style="border: 1px solid; font-size: 12px;">
                        <div class="text-left d-flex flex-column bd-highlight" style="text-align:left;">
                            <div class="p-1 bd-highlight">NOM : <b>{{$assignment?->repairer?->name ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">CONTACT : <b>{{$assignment?->repairer?->telephone ?? ''}}</b></div>
                            <div class="p-1 bd-highlight">E-MAIL : <b>{{$assignment?->repairer?->email ?? ''}}</b></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table text-center" style="border-spacing: 0px;">
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;" colspan="2">SITUATION DU VEHICULE</th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        État général
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->vehicle?->general_state ?? ''}}</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Conformité du point de choc à la déclaration
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->point_noted ?? ''}}</b>
                    </th>
                </tr>
            </thead>
        </table>

        <table class="table text-center" style="border-spacing: 0px;">
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px; background-color: rgb(223, 221, 218);">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;" colspan="2">MONTANT AVANT DEMONTAGE OU REPARATION SOUS TOUTES RESERVES D'USAGE</th>
                </tr>
            </thead>
            <thead style="border: 1px solid; font-size: 12px; border-spacing: 0px;">
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Montant approximatif en chiffres
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{number_format($assignment?->assured_value ?? 0, 0, ',', ' ') ?? ''}} FCFA</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Montant approximatif en lettres
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$numberTransformer->toWords($assignment?->assured_value ?? 0)}} FRANCS CFA</b>
                    </th>
                </tr>
                <tr style="border: 1px solid; font-size: 12px;">
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        Delai d'immobilisation technique
                    </th>
                    <th style="border: 1px solid; font-size: 12px; vertical-align: middle;">
                        <b>{{$assignment?->work_duration ?? ''}}</b>
                    </th>
                </tr>
            </thead>
        </table>
    </body>
</html>
