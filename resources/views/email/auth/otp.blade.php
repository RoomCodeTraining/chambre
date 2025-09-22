<center><img src="{{ asset('images/logo.png') }}" width="200" height="70" alt="logo"></center>
<br>
<p>Cher utilisateur,</p>
<p>Votre code de vérification est : <b>{{ $user['pin_code'] }}</b></p>
<p>
    Veuillez l'utiliser pour vous connecter à votre compte. <br><br>
    <b>Attention :</b> Ce code est valide pendant {{ $expiry_minutes }} minutes.
</p>
<p>
    Si vous n'avez pas demandé de code de vérification, veuillez ignorer ce message.
</p>
