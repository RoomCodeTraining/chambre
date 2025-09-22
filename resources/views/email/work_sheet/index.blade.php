<center><img src="{{ asset('images/logo_eg.jpg') }}" width="200" height="70" alt="logo"></center>
<p>Cher client, 
    <br> Nous vous prions de bien vouloir recevoir en pièce jointe votre fiche des travaux du véhicule immmatriculé <b>{{ $assignment['vehicle']['license_plate'] ?? '' }}</b>.

    <p>
    RÉFÉRENCE : <b>{{ $assignment['reference'] ?? '' }}</b><br>
    IMMATRICULATION : <b>{{ $assignment['vehicle']['license_plate'] ?? '' }}</b><br>
    MARQUE : <b>{{ $assignment['vehicle']['brand']['label'] ?? '' }}</b><br>
    MODÈLE : <b>{{ $assignment['vehicle']['vehicleModel']['label'] ?? '' }}</b><br>
    TYPE : <b>{{ $assignment['vehicle']['type'] ?? '' }}</b><br>
    OPTION : <b>{{ $assignment['vehicle']['option'] ?? '' }}</b><br>
    COULEUR : <b>{{ $assignment['vehicle']['color']['label'] ?? '' }}</b><br>
    KILOMETRAGE : <b>{{ $assignment['vehicle']['mileage'] ?? '' }}</b><br>
</p>
<p>

<p>BCA-CI vous remercie.</p>