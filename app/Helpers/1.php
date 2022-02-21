<?php
	use App\Models\Ethnic;

	function getEthnics() {
		$ethnics = Ethnic::orderBy('name')->get();
        return $ethnics;
    }