@component('mail::message')
# Confirmation de la création de votre demande

Votre demande a été créée avec succès.
Voici le code de cette dernière: "{{ $demand->payment_token }}".
Il vous permettra de suivre l'avancement du traitement de votre demande.

Obtenez à travers le lien ci-dessous l'attestation de votre demande.

<a href="{{ route('download', $demand->attestation) }}">Lien vers votre attestation</a>

Merci,<br /> {{ config('app.name') }}
@endcomponent
