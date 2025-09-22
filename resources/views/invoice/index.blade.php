<!DOCTYPE html>
<html lang="str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
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
                padding: 0px;
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
        <div style="padding: 50px; padding-top: 220px; text-align: left;">
            
            <table class="table table-bordered text-left">
                <tbody>
                    <tr>
                        <td>
                            @if($assignment?->assignmentType?->code == 'insurer')
                            <b style="text-decoration: underline;">DOIT</b> 
                                @if($assignment?->additionalInsurer)
                                    <b> : 
                                        <span style="padding-left: 10px;">
                                            {{ $assignment?->insurer?->name ?? '' }} / {{ $assignment?->client?->name ?? '' }}
                                        </span>
                                    </b><br>
                                    <span style="font-style: italic; padding-left: 50px;">{{ $assignment?->insurer?->address ?? '' }}</span>
                                @else
                                    @if($assignment?->broker)
                                    <b> : 
                                        <span style="padding-left: 10px;">
                                            {{ $assignment?->broker?->name ?? '' }} / {{ $assignment?->client?->name ?? '' }}
                                        </span>
                                    </b><br>
                                    <span style="font-style: italic; padding-left: 50px;">{{ $assignment?->broker?->address ?? '' }}</span>                            
                                    @else
                                    <b> : 
                                        <span style="padding-left: 10px;">
                                            {{ $assignment?->insurer?->name ?? '' }} / {{ $assignment?->client?->name ?? '' }}
                                        </span>
                                    </b><br>
                                    <span style="font-style: italic; padding-left: 50px;">{{ $assignment?->insurer?->address ?? '' }}</span>
                                    @endif
                                @endif
                            @else
                            <b style="text-decoration: underline;">Client</b> 
                            <b> : 
                                <span style="padding-left: 10px;">
                                    {{ $assignment?->client?->name ?? '' }}
                                </span>
                            </b><br>
                            <span style="font-style: italic; padding-left: 50px;">{{ $assignment?->client?->address ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><hr style="border: 1px solid #888888;"></td>
                    </tr>
                    <tr>
                        <td>
                            <b style="text-decoration: underline;">FACTURE</b> <b> N° : <span style="padding-left: 10px;">{{ $invoice?->reference }}</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b style="text-decoration: underline;">Dossier</b> <b> N° : <span style="padding-left: 10px;">{{ $assignment?->reference }}</span></b><br>
                            <b style="text-decoration: underline;">Immatriculation</b> <b> : <span style="padding-left: 10px;">{{ $assignment?->vehicle?->license_plate ?? '' }}</span></b><br>
                            <b style="text-decoration: underline;">Numero de sinistre</b> <b> : <span style="padding-left: 10px;">{{ $assignment?->claim_number ?? '' }}</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td><hr style="border: 1px solid #888888;"></td>
                    </tr>
                    <tr>
                        <th>
                            <b style="text-decoration: underline;">OBJET</b> : <span style="padding-left: 10px;">{{ $invoice?->object ?? '' }}</span>
                        </th>
                    </tr>
                    <tr>
                        <td><hr style="border: 1px solid #888888;"></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-borderless text-center" style="margin: 0; padding: 0; border-collapse: collapse; width: 100%;">
                <thead style="border: 1px white; font-size: 10px;">
                    <tr>
                        <th colspan="2" style="border: 1px white; text-decoration: underline;">QUITANCES D'HONORAIRES</th>
                    </tr>
                </thead>
            </table>
            
            <table class="table table-bordered text-left" style="padding-left: 75px; padding-right: 75px;">
                <tbody>
                    @foreach($receipts as $receipt)
                        @if($receipt?->receiptType?->code == 'work_fee')
                        <tr>
                            <td style="text-align: left; font-size: 12px;">
                                {{ $receipt?->receiptType?->label ?? '' }}
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                .....................................................
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                {{ number_format($receipt?->amount_excluding_tax ?? 0, 0, ',', ' ') }}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    @foreach($receipts as $receipt)
                        @if($receipt?->receiptType?->code != 'work_fee')
                        <tr>
                            <td style="text-align: left; font-size: 12px;">
                                {{ $receipt?->receiptType?->label ?? '' }}
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                .....................................................
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                {{ number_format($receipt?->amount_excluding_tax ?? 0, 0, ',', ' ') }}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td colspan="3"><hr style="border: 1px solid #888888;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; font-size: 12px;">
                            TOTAL HT
                        </td>
                        <td style="text-align: left; font-size: 12px;">
                            .....................................................
                        </td>
                        <td style="text-align: left; font-size: 12px;">
                            {{ number_format($assignment?->receipt_amount_excluding_tax ?? 0, 0, ',', ' ') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; font-size: 12px;">
                            TVA {{ config('services.settings.tax_rate') }}%
                        </td>
                        <td style="text-align: left; font-size: 12px;">
                            .....................................................
                        </td>
                        <td style="text-align: left; font-size: 12px;">
                            {{ number_format($assignment?->receipt_amount_tax ?? 0, 0, ',', ' ') }}
                        </td>
                    </tr>
                    <tr style="background-color: rgb(209, 209, 209);">
                        <th style="text-align: left; font-size: 12px;">
                            NET À PAYER
                        </th>
                        <th style="text-align: left; font-size: 12px;">
                            .....................................................
                        </th>
                        <th style="text-align: left; font-size: 12px;">
                            {{ number_format($assignment?->receipt_amount ?? 0, 0, ',', ' ') }} FCFA
                        </th>
                    </tr>
                    
                </tbody>
            </table>

            <table class="table table-bordered text-left">
                <tbody>
                    <tr>
                        <td>
                            Arrêté la présente facture à la somme de :<br>
                            <b style="text-transform: uppercase;">{{ $numberTransformer->toWords($assignment?->receipt_amount) }} FRANCS CFA</b>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="text-align: right; font-size: 12px;">
                Fait à Abidjan, le {{ \Carbon\Carbon::parse(now())->format('d/m/Y') ?? '' }}
            </div>

            <div class="text-right" style="padding-left: 500px; padding-top: 10px;">
                <div style="font-size: 12px; text-align: center; vertical-align: middle;">
                    <b>
                        <div class="p-1 bd-highlight" style="text-decoration: underline;">L'expert</div>
                        <br><br><br>
                        <div class="p-1 bd-highlight">Bakary FANE</div>
                    </b>
                </div>
            </div>

        </div>

    </body>
</html>