<?php
/**
 * ************************************************
 *
 * Do not Change Anything Form Here
 * This use For Internal App Configuration
 * Here We will Define The Associated Info
 *
 * ************************************************
 **/

# Set The Table name and its associate Foreign key Here
function foreign_table_name() {
	return array(
		"users" => array(
			"user_id",
			"client_id",
			"assign_user_id",
		),

		"groups" => array(
			"group_id",
		),

		"options" => array(
			"job_type_id",
			"job_format_id",
			"job_status_id",
			"comment_id",
			"instruction_id",
			"download_status_id",
			"upload_status_id",
			"importance_id",
			"billing_period_id",
			"invoice_status_id",
			"turn_around_time_id",
			"quote_status_id"
		),
		"mail_templates" => array(
			"mail_template_id",
		),

	);

}

/**
 * ************************************************
 * This Function is Used for Getting The Name Of
 * The Foregin Key Table
 * @package arafat framework
 * @param foreign_key name
 * @return foregin_key_table name
 * ************************************************
 */
function foreign_key_table_name($foreign_key_name) {
	$foreign_table_name = foreign_table_name();

	if ($foreign_table_name) {
		foreach ($foreign_table_name as $k => $v) {
			foreach ($v as $kk => $vv) {
				if ($vv == $foreign_key_name) {
					# If Found Return The Table Name
					return $k;
				}
			}
		}
	}

	# No such key set Return False
	return false;

}

/*===================================================
=            App client and Job ID setup            =
===================================================*/

define("CLIENT_START_ID", 101);
define("JOB_START_ID", 1111);
define("QUOTE_START_ID", 921);

/*=====  End of App client and Job ID setup  ======*/

/*===================================================
=            invoice code and invoice no            =
===================================================*/
define("INVOICE_CODE", 3000);
define("INVOICE_NO", 9000);
/*=====  End of invoice code and invoice no  ======*/


global $crm_config_data_key;
$crm_config_data_key = array(
    "job_type" => "job_type",
    "job_format" => "job_format",
    "job_status" => "job_status",
    "comment" => "comment",
    "instruction" => "instruction",
    "download_status" => "download_status",
    "upload_status" => "upload_status",
    "contact_person_company_importances" => "contact_person_company_importances",
    "billing_periods" => "billing_periods",
    "invoice_status" => "invoice_status",
    "job_turn_around_time" => "job_turn_around_time",
    "quote_status" => "quote_status",
);

global $currency_arr;

$currency_arr = array(
	'ALL' => 'Albania Lek',
	'AFN' => 'Afghanistan Afghani',
	'ARS' => 'Argentina Peso',
	'AWG' => 'Aruba Guilder',
	'AUD' => 'Australia Dollar',
	'AZN' => 'Azerbaijan New Manat',
	'BSD' => 'Bahamas Dollar',
	'BBD' => 'Barbados Dollar',
	'BDT' => 'Bangladeshi taka',
	'BYR' => 'Belarus Ruble',
	'BZD' => 'Belize Dollar',
	'BMD' => 'Bermuda Dollar',
	'BOB' => 'Bolivia Boliviano',
	'BAM' => 'Bosnia and Herzegovina Convertible Marka',
	'BWP' => 'Botswana Pula',
	'BGN' => 'Bulgaria Lev',
	'BRL' => 'Brazil Real',
	'BND' => 'Brunei Darussalam Dollar',
	'KHR' => 'Cambodia Riel',
	'CAD' => 'Canada Dollar',
	'KYD' => 'Cayman Islands Dollar',
	'CLP' => 'Chile Peso',
	'CNY' => 'China Yuan Renminbi',
	'COP' => 'Colombia Peso',
	'CRC' => 'Costa Rica Colon',
	'HRK' => 'Croatia Kuna',
	'CUP' => 'Cuba Peso',
	'CZK' => 'Czech Republic Koruna',
	'DKK' => 'Denmark Krone',
	'DOP' => 'Dominican Republic Peso',
	'XCD' => 'East Caribbean Dollar',
	'EGP' => 'Egypt Pound',
	'SVC' => 'El Salvador Colon',
	'EEK' => 'Estonia Kroon',
	'EUR' => 'Euro Member Countries',
	'FKP' => 'Falkland Islands (Malvinas) Pound',
	'FJD' => 'Fiji Dollar',
	'GHC' => 'Ghana Cedis',
	'GIP' => 'Gibraltar Pound',
	'GTQ' => 'Guatemala Quetzal',
	'GGP' => 'Guernsey Pound',
	'GYD' => 'Guyana Dollar',
	'HNL' => 'Honduras Lempira',
	'HKD' => 'Hong Kong Dollar',
	'HUF' => 'Hungary Forint',
	'ISK' => 'Iceland Krona',
	'INR' => 'India Rupee',
	'IDR' => 'Indonesia Rupiah',
	'IRR' => 'Iran Rial',
	'IMP' => 'Isle of Man Pound',
	'ILS' => 'Israel Shekel',
	'JMD' => 'Jamaica Dollar',
	'JPY' => 'Japan Yen',
	'JEP' => 'Jersey Pound',
	'KZT' => 'Kazakhstan Tenge',
	'KPW' => 'Korea (North) Won',
	'KRW' => 'Korea (South) Won',
	'KGS' => 'Kyrgyzstan Som',
	'LAK' => 'Laos Kip',
	'LVL' => 'Latvia Lat',
	'LBP' => 'Lebanon Pound',
	'LRD' => 'Liberia Dollar',
	'LTL' => 'Lithuania Litas',
	'MKD' => 'Macedonia Denar',
	'MYR' => 'Malaysia Ringgit',
	'MUR' => 'Mauritius Rupee',
	'MXN' => 'Mexico Peso',
	'MNT' => 'Mongolia Tughrik',
	'MZN' => 'Mozambique Metical',
	'NAD' => 'Namibia Dollar',
	'NPR' => 'Nepal Rupee',
	'ANG' => 'Netherlands Antilles Guilder',
	'NZD' => 'New Zealand Dollar',
	'NIO' => 'Nicaragua Cordoba',
	'NGN' => 'Nigeria Naira',
	'NOK' => 'Norway Krone',
	'OMR' => 'Oman Rial',
	'PKR' => 'Pakistan Rupee',
	'PAB' => 'Panama Balboa',
	'PYG' => 'Paraguay Guarani',
	'PEN' => 'Peru Nuevo Sol',
	'PHP' => 'Philippines Peso',
	'PLN' => 'Poland Zloty',
	'QAR' => 'Qatar Riyal',
	'RON' => 'Romania New Leu',
	'RUB' => 'Russia Ruble',
	'SHP' => 'Saint Helena Pound',
	'SAR' => 'Saudi Arabia Riyal',
	'RSD' => 'Serbia Dinar',
	'SCR' => 'Seychelles Rupee',
	'SGD' => 'Singapore Dollar',
	'SBD' => 'Solomon Islands Dollar',
	'SOS' => 'Somalia Shilling',
	'ZAR' => 'South Africa Rand',
	'LKR' => 'Sri Lanka Rupee',
	'SEK' => 'Sweden Krona',
	'CHF' => 'Switzerland Franc',
	'SRD' => 'Suriname Dollar',
	'SYP' => 'Syria Pound',
	'TWD' => 'Taiwan New Dollar',
	'THB' => 'Thailand Baht',
	'TTD' => 'Trinidad and Tobago Dollar',
	'TRY' => 'Turkey Lira',
	'TRL' => 'Turkey Lira',
	'TVD' => 'Tuvalu Dollar',
	'UAH' => 'Ukraine Hryvna',
	'GBP' => 'United Kingdom Pound',
	'UGX' => 'Uganda Shilling',
	'USD' => 'United States Dollar',
	'UYU' => 'Uruguay Peso',
	'UZS' => 'Uzbekistan Som',
	'VEF' => 'Venezuela Bolivar',
	'VND' => 'Viet Nam Dong',
	'YER' => 'Yemen Rial',
	'ZWD' => 'Zimbabwe Dollar',
);

# Client need only the below 5 currency
$currency_arr = array(
	'USD' => 'United States Dollar',
	'AUD' => 'Australia Dollar',
	'CAD' => 'Canada Dollar',
	'GBP' => 'United Kingdom Pound',
	'EUR' => 'Euro Member Countries',
);

global $countries_arr;
$countries_arr = array("Afghanistan" => "Afghanistan", "Albania" => "Albania", "Algeria" => "Algeria", "American Samoa" => "American Samoa", "Andorra" => "Andorra", "Angola" => "Angola", "Anguilla" => "Anguilla", "Antarctica" => "Antarctica", "Antigua and Barbuda" => "Antigua and Barbuda", "Argentina" => "Argentina", "Armenia" => "Armenia", "Aruba" => "Aruba", "Australia" => "Australia", "Austria" => "Austria", "Azerbaijan" => "Azerbaijan", "Bahamas" => "Bahamas", "Bahrain" => "Bahrain", "Bangladesh" => "Bangladesh", "Barbados" => "Barbados", "Belarus" => "Belarus", "Belgium" => "Belgium", "Belize" => "Belize", "Benin" => "Benin", "Bermuda" => "Bermuda", "Bhutan" => "Bhutan", "Bolivia" => "Bolivia", "Bosnia and Herzegowina" => "Bosnia and Herzegowina", "Botswana" => "Botswana", "Bouvet Island" => "Bouvet Island", "Brazil" => "Brazil", "British Indian Ocean Territory" => "British Indian Ocean Territory", "Brunei Darussalam" => "Brunei Darussalam", "Bulgaria" => "Bulgaria", "Burkina Faso" => "Burkina Faso", "Burundi" => "Burundi", "Cambodia" => "Cambodia", "Cameroon" => "Cameroon", "Canada" => "Canada", "Cape Verde" => "Cape Verde", "Cayman Islands" => "Cayman Islands", "Central African Republic" => "Central African Republic", "Chad" => "Chad", "Chile" => "Chile", "China" => "China", "Christmas Island" => "Christmas Island", "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands", "Colombia" => "Colombia", "Comoros" => "Comoros", "Congo" => "Congo", "Congo, the Democratic Republic of the" => "Congo, the Democratic Republic of the", "Cook Islands" => "Cook Islands", "Costa Rica" => "Costa Rica", "Cote d'Ivoire" => "Cote d'Ivoire", "Croatia (Hrvatska)" => "Croatia (Hrvatska)", "Cuba" => "Cuba", "Cyprus" => "Cyprus", "Czech Republic" => "Czech Republic", "Denmark" => "Denmark", "Djibouti" => "Djibouti", "Dominica" => "Dominica", "Dominican Republic" => "Dominican Republic", "East Timor" => "East Timor", "Ecuador" => "Ecuador", "Egypt" => "Egypt", "El Salvador" => "El Salvador", "Equatorial Guinea" => "Equatorial Guinea", "Eritrea" => "Eritrea", "Estonia" => "Estonia", "Ethiopia" => "Ethiopia", "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)", "Faroe Islands" => "Faroe Islands", "Fiji" => "Fiji", "Finland" => "Finland", "France" => "France", "France Metropolitan" => "France Metropolitan", "French Guiana" => "French Guiana", "French Polynesia" => "French Polynesia", "French Southern Territories" => "French Southern Territories", "Gabon" => "Gabon", "Gambia" => "Gambia", "Georgia" => "Georgia", "Germany" => "Germany", "Ghana" => "Ghana", "Gibraltar" => "Gibraltar", "Greece" => "Greece", "Greenland" => "Greenland", "Grenada" => "Grenada", "Guadeloupe" => "Guadeloupe", "Guam" => "Guam", "Guatemala" => "Guatemala", "Guinea" => "Guinea", "Guinea-Bissau" => "Guinea-Bissau", "Guyana" => "Guyana", "Haiti" => "Haiti", "Heard and Mc Donald Islands" => "Heard and Mc Donald Islands", "Holy See (Vatican City State)" => "Holy See (Vatican City State)", "Honduras" => "Honduras", "Hong Kong" => "Hong Kong", "Hungary" => "Hungary", "Iceland" => "Iceland", "India" => "India", "Indonesia" => "Indonesia", "Iran (Islamic Republic of)" => "Iran (Islamic Republic of)", "Iraq" => "Iraq", "Ireland" => "Ireland", "Israel" => "Israel", "Italy" => "Italy", "Jamaica" => "Jamaica", "Japan" => "Japan", "Jordan" => "Jordan", "Kazakhstan" => "Kazakhstan", "Kenya" => "Kenya", "Kiribati" => "Kiribati", "Korea, Democratic People's Republic of" => "Korea, Democratic People's Republic of", "Korea, Republic of" => "Korea, Republic of", "Kuwait" => "Kuwait", "Kyrgyzstan" => "Kyrgyzstan", "Lao, People's Democratic Republic" => "Lao, People's Democratic Republic", "Latvia" => "Latvia", "Lebanon" => "Lebanon", "Lesotho" => "Lesotho", "Liberia" => "Liberia", "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya", "Liechtenstein" => "Liechtenstein", "Lithuania" => "Lithuania", "Luxembourg" => "Luxembourg", "Macau" => "Macau", "Macedonia, The Former Yugoslav Republic of" => "Macedonia, The Former Yugoslav Republic of", "Madagascar" => "Madagascar", "Malawi" => "Malawi", "Malaysia" => "Malaysia", "Maldives" => "Maldives", "Mali" => "Mali", "Malta" => "Malta", "Marshall Islands" => "Marshall Islands", "Martinique" => "Martinique", "Mauritania" => "Mauritania", "Mauritius" => "Mauritius", "Mayotte" => "Mayotte", "Mexico" => "Mexico", "Micronesia, Federated States of" => "Micronesia, Federated States of", "Moldova, Republic of" => "Moldova, Republic of", "Monaco" => "Monaco", "Mongolia" => "Mongolia", "Montserrat" => "Montserrat", "Morocco" => "Morocco", "Mozambique" => "Mozambique", "Myanmar" => "Myanmar", "Namibia" => "Namibia", "Nauru" => "Nauru", "Nepal" => "Nepal", "Netherlands" => "Netherlands", "Netherlands Antilles" => "Netherlands Antilles", "New Caledonia" => "New Caledonia", "New Zealand" => "New Zealand", "Nicaragua" => "Nicaragua", "Niger" => "Niger", "Nigeria" => "Nigeria", "Niue" => "Niue", "Norfolk Island" => "Norfolk Island", "Northern Mariana Islands" => "Northern Mariana Islands", "Norway" => "Norway", "Oman" => "Oman", "Pakistan" => "Pakistan", "Palau" => "Palau", "Panama" => "Panama", "Papua New Guinea" => "Papua New Guinea", "Paraguay" => "Paraguay", "Peru" => "Peru", "Philippines" => "Philippines", "Pitcairn" => "Pitcairn", "Poland" => "Poland", "Portugal" => "Portugal", "Puerto Rico" => "Puerto Rico", "Qatar" => "Qatar", "Reunion" => "Reunion", "Romania" => "Romania", "Russian Federation" => "Russian Federation", "Rwanda" => "Rwanda", "Saint Kitts and Nevis" => "Saint Kitts and Nevis", "Saint Lucia" => "Saint Lucia", "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines", "Samoa" => "Samoa", "San Marino" => "San Marino", "Sao Tome and Principe" => "Sao Tome and Principe", "Saudi Arabia" => "Saudi Arabia", "Senegal" => "Senegal", "Seychelles" => "Seychelles", "Sierra Leone" => "Sierra Leone", "Singapore" => "Singapore", "Slovakia (Slovak Republic)" => "Slovakia (Slovak Republic)", "Slovenia" => "Slovenia", "Solomon Islands" => "Solomon Islands", "Somalia" => "Somalia", "South Africa" => "South Africa", "South Georgia and the South Sandwich Islands" => "South Georgia and the South Sandwich Islands", "Spain" => "Spain", "Sri Lanka" => "Sri Lanka", "St. Helena" => "St. Helena", "St. Pierre and Miquelon" => "St. Pierre and Miquelon", "Sudan" => "Sudan", "Suriname" => "Suriname", "Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands", "Swaziland" => "Swaziland", "Sweden" => "Sweden", "Switzerland" => "Switzerland", "Syrian Arab Republic" => "Syrian Arab Republic", "Taiwan, Province of China" => "Taiwan, Province of China", "Tajikistan" => "Tajikistan", "Tanzania, United Republic of" => "Tanzania, United Republic of", "Thailand" => "Thailand", "Togo" => "Togo", "Tokelau" => "Tokelau", "Tonga" => "Tonga", "Trinidad and Tobago" => "Trinidad and Tobago", "Tunisia" => "Tunisia", "Turkey" => "Turkey", "Turkmenistan" => "Turkmenistan", "Turks and Caicos Islands" => "Turks and Caicos Islands", "Tuvalu" => "Tuvalu", "Uganda" => "Uganda", "Ukraine" => "Ukraine", "United Arab Emirates" => "United Arab Emirates", "United Kingdom" => "United Kingdom", "United States" => "United States", "United States Minor Outlying Islands" => "United States Minor Outlying Islands", "Uruguay" => "Uruguay", "Uzbekistan" => "Uzbekistan", "Vanuatu" => "Vanuatu", "Venezuela" => "Venezuela", "Vietnam" => "Vietnam", "Virgin Islands (British)" => "Virgin Islands (British)", "Virgin Islands (U.S.)" => "Virgin Islands (U.S.)", "Wallis and Futuna Islands" => "Wallis and Futuna Islands", "Western Sahara" => "Western Sahara", "Yemen" => "Yemen", "Yugoslavia" => "Yugoslavia", "Zambia" => "Zambia", "Zimbabwe" => "Zimbabwe");


global $job_staus_id_for_remain_time;
$job_staus_id_for_remain_time = array(24, 26, 27);