@component('mail::message')
# Confirmation de la création de votre demande

Votre demande a été créée avec succès.
Voici le code de cette dernière: "{{ $demand->payment_token }}".
Il vous permettra de suivre l'avancement du traitement de votre demande.

Merci,<br /> {{ config('app.name') }}
@endcomponent
