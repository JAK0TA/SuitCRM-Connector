<?php

namespace JAKOTA\SuitecrmConnector\Utility;

class SlackMessagerUtility {
	/**
	 * @param string $message
	 */
	public static function sendMessage(string $message) {
		$data = json_encode(array('text' => 'Lueftner Typo3: ' . $message));
		$curl = curl_init();
		curl_setopt_array($curl, array(
			//Sample url
			CURLOPT_URL => "https://hooks.slack.com/services/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",
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_HTTPHEADER => array(
				"Content-Type:application/json"
			)
		));

		curl_exec($curl);
		curl_close($curl);
	}
}