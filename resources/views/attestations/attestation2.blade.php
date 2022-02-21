<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attestation de paiement de demande de carte consulaire</title>
</head>
<body>
	<div class="" style="text-align: center;">
		<img src="images/logo.png" style="margin-bottom: 2em;">
	</div>
	<div style="text-align: center">
		<h1 style="font-size: 28px;">Attestation de paiement de demande de carte consulaire</h1>
	</div>
	<hr style="height: 1px; background-color: black;">
	<p style="margin-top: 3em; font-size: 18px;">La demande suivante a été enregistrée par le système "Carte consulaire BENIN".</p>
	<div>
		<h2>Client</h2>
		<p><span style="font-weight: bold">Nom & Prénom(s)</span> : {{ isset($demand) ? $demand->documentForm->last_name . ' ' . $demand->documentForm->first_name : 'John DOE' }}</p>
		<p><span style="font-weight: bold">Nationalité</span> : {{ isset($demand) ? $demand->documentForm->origin_country : date('d/m/Y') }}</p>
	</div>
	<div>
		<h2>Références</h2>
		<p><span style="font-weight: bold">Numero Dossier</span> : {{ isset($demand) ? 'CC-'. date('Ymd', strtotime($demand->created_at)) . str_pad($demand->id, 5, '0', STR_PAD_LEFT) : 'CC2022120100008' }}</p>
		<p><span style="font-weight: bold">Date d'enregistrement</span> : {{ isset($demand) ? $demand->created_at->format('d/m/Y') : date('d/m/Y') }}</p>
		<p><span style="font-weight: bold">Code de suivi (confidentiel)</span> : {{ isset($demand) ? $demand->payment_token : 64545 }}</p>
	</div>
	<div>
		<h2>Infos supplémentaires</h2>
		<ul>
			@if($detail->rdv)
		        <li class="mt-4"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp;Vous avez pris un rendez-vous pour l'enrôlement le {{ $detail->demand->meeting->meeting_date->format('d/m/Y') }} à  {{ $detail->demand->meeting->meeting_time }}.</li>
		    @endif
		    @if($detail->ship)
		       	<li class="mt-4"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp;Vous avez demandé à vous faire livrer.</li>
		    @endif
	      	@if($detail->sms)
	        	<li class="mt-4"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp;Vous avez demandé à recevoir un message par SMS.</li>
	      	@endif
	      	@if($detail->mail)
	        	<li class="mt-4"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp;Vous avez demandé à recevoir un courriel par mail.</li>
	      	@endif
	    </ul>
	</div>
	<div style="text-align: center; margin-top: 3em;">
		@if(isset($demand))
			<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($demand->id . $demand->payment_token)) !!} ">
		@else
			<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('cool')) !!} ">
		@endif
	</div>
</body>
</html>