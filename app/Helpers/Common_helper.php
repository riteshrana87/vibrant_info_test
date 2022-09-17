<?php

use App\Models\Subscription;

function enCodeVal($val){
    if(!empty($val)){
        $res = Hashids::encode($val);
        //$res = Hashids::encodeHex($val);
		return $res;
	}
}

function deCodeVal($val){
	if(!empty($val)){
		$res = Hashids::decode($val);
		//$res = Hashids::decodeHex($val);
		if(!empty($res)){
			return $res[0];
		}
	}
}

?>