<?php


namespace JAKOTA\SuitecrmConnector\Utility;


class SuiteCrmMappingUtillity {
	/**
	 * @param string $key
	 * @return mixed|string
	 */
	public static function getSalutationValue(string $key) {
		/**
		 * $salutations[Typo3 Value] = Suitecrm Value;
		 */

		$salutations = [];
		$salutations["Herr"] = "MR";
		$salutations["Herr Dr."] = "DR";
		$salutations["Herr Prof. Dr."] = "PROF.DR.";
		$salutations["Herr Prof."] = "PROF";
		$salutations["Frau"] = "MS";
		$salutations["Frau Dr."] = "DR Fr.";
		$salutations["Frau Prof. Dr."] = "PRO.DR.F";
		$salutations["Frau Prof."] = "PROFF";

		$salutations["Mr"] = "MR";
		$salutations["Ms"] = "MS";
		$salutations["Mrs"] = "MRS";
		$salutations["Dr."] = "DR";
		$salutations["Prof. Dr."] = "PROF.DR.";
		$salutations["Prof."] = "PROF";

		if (array_key_exists($key, $salutations)) {
			$salutation = $salutations[$key];
		} else {
			$salutation = $key;
		}

		return $salutation;
	}


	/**
	 * @param string $key
	 * @return string
	 */
	public static function getCountryValue(string $key) {
		/**
		 * Mapped deutsch -> englisch
		 * $countries[Typo3 Value] = Suitecrm Value;
		 */
		$countries = [];
		$countries["Afghanistan"] = "Afghanistan";
		$countries["Albanien"] = "Albania";
		$countries["Algerien"] = "Algeria";
		$countries["Amerikanisch Samoa"] = "American Samoa";
		$countries["Andorra"] = "Andorra";
		$countries["Angola"] = "Angola";
		$countries["Anguilla"] = "Anguilla";
		$countries["Antigua und Barbuda"] = "Antigua and Barbuda";
		$countries["Argentinien"] = "Argentina";
		$countries["Armenien"] = "Armenia";
		$countries["Aruba"] = "Aruba";
		$countries["Australien"] = "Australia";
		$countries["Österreich"] = "Austria";
		$countries["Aserbaidschan"] = "Azerbaijan";
		$countries["Bahrain"] = "Bahrain";
		$countries["Bangladesch"] = "Bangladesh";
		$countries["Barbados"] = "Barbados";
		$countries["Weißrussland"] = "Belarus";
		$countries["Belgien"] = "Belgium";
		$countries["Belize"] = "Belize";
		$countries["Benin"] = "Benin";
		$countries["Bermuda"] = "Bermuda";
		$countries["Bhutan"] = "Bhutan";
		$countries["Bolivien"] = "Bolivia";
		$countries["Bosnien und Herzegowina"] = "Bosnia and Herzegovina";
		$countries["Botsuana"] = "Botswana";
		$countries["Brasilien"] = "Brazil";
		$countries["Britische Jungferninseln"] = "British Virgin Islands";
		$countries["Brunei"] = "Brunei";
		$countries["Bulgarien"] = "Bulgaria";
		$countries["Burkina Faso"] = "Burkina Faso";
		$countries["Burundi"] = "Burundi";
		$countries["Kambodscha"] = "Cambodia";
		$countries["Kamerun"] = "Cameroon";
		$countries["Kanada"] = "Canada";
		$countries["Kap Verde"] = "Cape Verde";
		$countries["Cayman-Inseln"] = "Cayman Islands";
		$countries["Zentralafrikanische Republik"] = "Central African Republic";
		$countries["Tschad"] = "Chad";
		$countries["Chile"] = "Chile";
		$countries["China"] = "China";
		$countries["Weihnachtsinsel"] = "Christmas Island";
		$countries["Cocos-/Keeling-Inseln"] = "Cocos (Keeling) Islands";
		$countries["Kolumbien"] = "Colombia";
		$countries["Komoren"] = "Comoros";
		$countries["Kongo"] = "Congo";
		$countries["Cook-Inseln"] = "Cook Islands";
		$countries["Costa Rica"] = "Costa Rica";
		$countries["Kroatien"] = "Croatia";
		$countries["Kuba"] = "Cuba";
		$countries["Zypern"] = "Cyprus";
		$countries["Tschechien"] = "Czech Republic";
		$countries["Côte d'Ivoire"] = "Côte d'Ivoire";
		$countries["MASKIERT"] = "DISGUISED";
		$countries["Demokratische Republik Kongo"] = "Democratic Republic of the Congo";
		$countries["Dänemark"] = "Denmark";
		$countries["Dschibuti"] = "Djibouti";
		$countries["Dominikanische Republik"] = "Dominican Republic";
		$countries["Ecuador"] = "Ecuador";
		$countries["Ägypten"] = "Egypt";
		$countries["El Salvador"] = "El Salvador";
		$countries["Äquatorialguinea"] = "Equatorial Guinea";
		$countries["Eritrea"] = "Eritrea";
		$countries["Estland"] = "Estonia";
		$countries["Äthiopien"] = "Ethiopia";
		$countries["Färöer"] = "Faeroe Islands";
		$countries["Falkland-Inseln"] = "Falkland Islands";
		$countries["Fidschi"] = "Fiji";
		$countries["Finnland"] = "Finland";
		$countries["Frankreich"] = "France";
		$countries["Französisch Guyana"] = "French Guiana";
		$countries["Französisch Polynesien"] = "French Polynesia";
		$countries["Gabun"] = "Gabon";
		$countries["Georgien"] = "Georgia";
		$countries["Deutschland"] = "Germany";
		$countries["Ghana"] = "Ghana";
		$countries["Gibraltar"] = "Gibraltar";
		$countries["Griechenland"] = "Greece";
		$countries["Grönland"] = "Greenland";
		$countries["Grenada"] = "Grenada";
		$countries["Guadeloupe"] = "Guadeloupe";
		$countries["Guam"] = "Guam";
		$countries["Guatemala"] = "Guatemala";
		$countries["Guernsey"] = "Guernsey";
		$countries["Guinea"] = "Guinea";
		$countries["Guinea-Bissau"] = "Guinea-Bissau";
		$countries["Guyana"] = "Guyana";
		$countries["Haiti"] = "Haiti";
		$countries["Honduras"] = "Honduras";
		$countries["Hong Kong"] = "Hong Kong";
		$countries["Ungarn"] = "Hungary";
		$countries["Island"] = "Iceland";
		$countries["Indien"] = "India";
		$countries["Indonesien"] = "Indonesia";
		$countries["Iran"] = "Iran";
		$countries["Irak"] = "Iraq";
		$countries["Irland"] = "Ireland";
		$countries["Isle of Man"] = "Isle of Man";
		$countries["Israel"] = "Israel";
		$countries["Italien"] = "Italy";
		$countries["Jamaika"] = "Jamaica";
		$countries["Japan"] = "Japan";
		$countries["Jersey"] = "Jersey";
		$countries["Jordanien"] = "Jordan";
		$countries["Kasachstan"] = "Kazakhstan";
		$countries["Kenia"] = "Kenya";
		$countries["Kiribati"] = "Kiribati";
		$countries["Kuwait"] = "Kuwait";
		$countries["Kirgisistan"] = "Kyrgyzstan";
		$countries["Laos"] = "Laos";
		$countries["Lettland"] = "Latvia";
		$countries["Libanon"] = "Lebanon";
		$countries["Lesotho"] = "Lesotho";
		$countries["Liberia"] = "Liberia";
		$countries["Libyen"] = "Libya";
		$countries["Liechtenstein"] = "Liechtenstein";
		$countries["Litauen"] = "Lithuania";
		$countries["Luxemburg"] = "Luxembourg";
		$countries["Macau"] = "Macau";
		$countries["Mazedonien"] = "Macedonia";
		$countries["Madagaskar"] = "Madagascar";
		$countries["Malawi"] = "Malawi";
		$countries["Malaysia"] = "Malaysia";
		$countries["Malediven"] = "Maldives";
		$countries["Mali"] = "Mali";
		$countries["Malta"] = "Malta";
		$countries["Marshall-Inseln"] = "Marshall Islands";
		$countries["Martinique"] = "Martinique";
		$countries["Mauretanien"] = "Mauritania";
		$countries["Mauritius"] = "Mauritius";
		$countries["Mayotte"] = "Mayotte";
		$countries["Mexiko"] = "Mexico";
		$countries["Mikronesien"] = "Micronesia";
		$countries["Moldawien"] = "Moldova";
		$countries["Monaco"] = "Monaco";
		$countries["Mongolei"] = "Mongolia";
		$countries["Montenegro"] = "Montenegro";
		$countries["Marokko"] = "Morocco";
		$countries["Mosambik"] = "Mozambique";
		$countries["Myanmar"] = "Myanmar";
		$countries["Namibia"] = "Namibia";
		$countries["Nauru"] = "Nauru";
		$countries["Nepal"] = "Nepal";
		$countries["Niederlande"] = "Netherlands";
		$countries["Niederländische Antillen"] = "Netherlands Antilles";
		$countries["Neukaledonien"] = "New Caledonia";
		$countries["Neuseeland"] = "New Zealand";
		$countries["Nicaragua"] = "Nicaragua";
		$countries["Niger"] = "Niger";
		$countries["Nigeria"] = "Nigeria";
		$countries["Niue"] = "Niue";
		$countries["Norfolk-Insel"] = "Norfolk Island";
		$countries["Nordkorea"] = "North Korea";
		$countries["Nördliche Marianen"] = "Northern Mariana Islands";
		$countries["Norwegen"] = "Norway";
		$countries["Oman"] = "Oman";
		$countries["Pakistan"] = "Pakistan";
		$countries["Palau"] = "Palau";
		$countries["Palästina"] = "Palestinian Territory";
		$countries["Panama"] = "Panama";
		$countries["Papua-Neuguinea"] = "Papua New Guinea";
		$countries["Paraguay"] = "Paraguay";
		$countries["Peru"] = "Peru";
		$countries["Philippinen"] = "Philippines";
		$countries["Pitcairn-Inseln"] = "Pitcairn Islands";
		$countries["Polen"] = "Poland";
		$countries["Portugal"] = "Portugal";
		$countries["Puerto Rico"] = "Puerto Rico";
		$countries["Katar"] = "Qatar";
		$countries["Rumänien"] = "Romania";
		$countries["Russland"] = "Russia";
		$countries["Ruanda"] = "Rwanda";
		$countries["Réunion"] = "Réunion";
		$countries["St. Helena"] = "Saint Helena";
		$countries["St. Kitts und Nevis"] = "Saint Kitts and Nevis";
		$countries["St. Lucia"] = "Saint Lucia";
		$countries["St. Pierre und Miquelon"] = "Saint Pierre and Miquelon";
		$countries["St. Vincent und die Grenadinen"] = "Saint Vincent and the Grenadines";
		$countries["Samoa"] = "Samoa";
		$countries["San Marino"] = "San Marino";
		$countries["Saudi-Arabien"] = "Saudia Arabia";
		$countries["Senegal"] = "Senegal";
		$countries["Serbien"] = "Serbia";
		$countries["Seychellen"] = "Seychelles";
		$countries["Sierra Leone"] = "Sierra Leone";
		$countries["Singapur"] = "Singapore";
		$countries["Slowakei"] = "Slovakia";
		$countries["Slowenien"] = "Slovenia";
		$countries["Salomonen"] = "Solomon Islands";
		$countries["Somalia"] = "Somalia";
		$countries["Südafrika"] = "South Africa";
		$countries["Südkorea"] = "South Korea";
		$countries["Spanien"] = "Spain";
		$countries["Sri Lanka"] = "Sri Lanka";
		$countries["Sudan"] = "Sudan";
		$countries["Surinam"] = "Suriname";
		$countries["Swasiland"] = "Swaziland";
		$countries["Schweden"] = "Sweden";
		$countries["Schweiz"] = "Switzerland";
		$countries["Syrien"] = "Syria";
		$countries["São Tomé und Príncipe"] = "São Tomé and Príncipe";
		$countries["Taiwan"] = "Taiwan";
		$countries["Tadschikistan"] = "Tajikistan";
		$countries["Tansania"] = "Tanzania";
		$countries["Thailand"] = "Thailand";
		$countries["Bahamas"] = "The Bahamas";
		$countries["Gambia"] = "The Gambia";
		$countries["Timor-Leste"] = "Timor-Leste";
		$countries["Togo"] = "Togo";
		$countries["Tokelau"] = "Tokelau";
		$countries["Tonga"] = "Tonga";
		$countries["Trinidad und Tobago"] = "Trinidad and Tobago";
		$countries["Tunesien"] = "Tunisia";
		$countries["Türkei"] = "Turkey";
		$countries["Turkmenistan"] = "Turkmenistan";
		$countries["Turks- und Caicosinseln"] = "Turks and Caicos Islands";
		$countries["Tuvalu"] = "Tuvalu";
		$countries["Amerikanische Jungferninseln"] = "US Virgin Islands";
		$countries["Uganda"] = "Uganda";
		$countries["Ukraine"] = "Ukraine";
		$countries["Vereinigte Arabische Emirate"] = "United Arab Emirates";
		$countries["Großbritannien"] = "United Kingdom";
		$countries["United States of America"] = "United States of America";
		$countries["Uruguay"] = "Uruguay";
		$countries["Usbekistan"] = "Uzbekistan";
		$countries["Vanuatu"] = "Vanuatu";
		$countries["Venezuela"] = "Venezuela";
		$countries["Vietnam"] = "Vietnam";
		$countries["Wallis und Futuna"] = "Wallis and Futuna";
		$countries["Westsahara"] = "Western Sahara";
		$countries["Jemen"] = "Yemen";
		$countries["Sambia"] = "Zambia";
		$countries["Simbabwe"] = "Zimbabwe";
		$countries["Landesweit"] = "nationwide";
		$countries["Åland"] = "Åland Islands";


		if (array_key_exists($key, $countries)) {
			$country = $countries[$key];
		} else {
			$country = $key;
		}

		return $country;
	}

	/**
	 * @param string $key
	 * @return string
	 */
	public static function getBrochureValue(string $key) {
		/**
		 * $brochures[Typo3 Value] = Suitecrm Value;
		 */

		$brochures = [];
		$brochures["2022 Flusskreuzfahrten"] = "2022_Brochure";
		$brochures["2022 River Cruises"] = "2022_Brochure";
		$brochures["2022 Themenkreuzfahrten (Klassische Musik / Golf / Winter)"] = "2022_ThemeBrochure";
		$brochures["2022 Theme Cruises (Classical Music / Golf / Winter)"] = "2022_ThemeBrochure";
		$brochures["2021 Flusskreuzfahrten"] = "2021_Brochure";
		$brochures["2021 River Cruises"] = "2021_Brochure";
		$brochures["2021 Themenkreuzfahrten (Klassische Musik / Golf / Winter)"] = "2021_ThemeBrochure";
		$brochures["2021 Theme Cruises (Classical Music / Golf / Winter)"] = "2021_ThemeBrochure";

		if (array_key_exists($key, $brochures)) {
			$brochure = $brochures[$key];
		} else {
			$brochure = $key;
		}

		return $brochure;
	}

	/**
	 * @param string $key
	 * @return mixed|string
	 */
	public static function getLanguageValue(string $key){
		/**
		 * $language[Typo3 Value] = Suitecrm Value;
		 */

		$language = [];
		$language["Deutsch"] = "German";
		$language["Englisch"] = "English";
		$language["German"] = "German";
		$language["English"] = "English";


		if (array_key_exists($key, $language)) {
			$language = $language[$key];
		} else {
			$language = $key;
		}

		return $language;
	}
}