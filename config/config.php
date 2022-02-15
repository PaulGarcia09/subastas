<?php 
  $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
 
  
  
    define('HOME_URL', $protocol . $_SERVER['HTTP_HOST'] ."/");
    define('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] ."/");
    define('ASSETS_URL', $protocol . $_SERVER['HTTP_HOST'] ."/assets/");
    define('PUBLIC_URL', $protocol . $_SERVER['HTTP_HOST'] ."/public/");
 
	define('PAGE_TITLE', "Auction Broadcaster");
if(!isset($_SESSION)){
	session_start();
}
include('debe.php');
$dbMaster = new ConnectionDB();
$connect = $dbMaster->DBmaster();  
define ('datenow', date('Y-m-d H:i:s'));

function no_magic_quotes($query) {
         $data = explode("\\",$query);
         $cleaned = implode("",$data);
        return $cleaned;
}
	$countryListAllIsoData = array(
		array("code"=> "AF", "code3"=> "AFG", "name"=> "Afghanistan", "number"=> "004"),
		array("code"=> "AL", "code3"=> "ALB", "name"=> "Albania", "number"=> "008"),
		array("code"=> "DZ", "code3"=> "DZA", "name"=> "Algeria", "number"=> "012"),
		array("code"=> "AS", "code3"=> "ASM", "name"=> "American Samoa", "number"=> "016"),
		array("code"=> "AD", "code3"=> "AND", "name"=> "Andorra", "number"=> "020"),
		array("code"=> "AO", "code3"=> "AGO", "name"=> "Angola", "number"=> "024"),
		array("code"=> "AI", "code3"=> "AIA", "name"=> "Anguilla", "number"=> "660"),
		array("code"=> "AQ", "code3"=> "ATA", "name"=> "Antarctica", "number"=> "010"),
		array("code"=> "AG", "code3"=> "ATG", "name"=> "Antigua and Barbuda", "number"=> "028"),
		array("code"=> "AR", "code3"=> "ARG", "name"=> "Argentina", "number"=> "032"),
		array("code"=> "AM", "code3"=> "ARM", "name"=> "Armenia", "number"=> "051"),
		array("code"=> "AW", "code3"=> "ABW", "name"=> "Aruba", "number"=> "533"),
		array("code"=> "AU", "code3"=> "AUS", "name"=> "Australia", "number"=> "036"),
		array("code"=> "AT", "code3"=> "AUT", "name"=> "Austria", "number"=> "040"),
		array("code"=> "AZ", "code3"=> "AZE", "name"=> "Azerbaijan", "number"=> "031"),
		array("code"=> "BS", "code3"=> "BHS", "name"=> "Bahamas", "number"=> "044"),
		array("code"=> "BH", "code3"=> "BHR", "name"=> "Bahrain", "number"=> "048"),
		array("code"=> "BD", "code3"=> "BGD", "name"=> "Bangladesh", "number"=> "050"),
		array("code"=> "BB", "code3"=> "BRB", "name"=> "Barbados", "number"=> "052"),
		array("code"=> "BY", "code3"=> "BLR", "name"=> "Belarus", "number"=> "112"),
		array("code"=> "BE", "code3"=> "BEL", "name"=> "Belgium", "number"=> "056"),
		array("code"=> "BZ", "code3"=> "BLZ", "name"=> "Belize", "number"=> "084"),
		array("code"=> "BJ", "code3"=> "BEN", "name"=> "Benin", "number"=> "204"),
		array("code"=> "BM", "code3"=> "BMU", "name"=> "Bermuda", "number"=> "060"),
		array("code"=> "BT", "code3"=> "BTN", "name"=> "Bhutan", "number"=> "064"),
		array("code"=> "BO", "code3"=> "BOL", "name"=> "Bolivia (Plurinational State of)", "number"=> "068"),
		array("code"=> "BQ", "code3"=> "BES", "name"=> "Bonaire, Sint Eustatius and Saba", "number"=> "535"),
		array("code"=> "BA", "code3"=> "BIH", "name"=> "Bosnia and Herzegovina", "number"=> "070"),
		array("code"=> "BW", "code3"=> "BWA", "name"=> "Botswana", "number"=> "072"),
		array("code"=> "BV", "code3"=> "BVT", "name"=> "Bouvet Island", "number"=> "074"),
		array("code"=> "BR", "code3"=> "BRA", "name"=> "Brazil", "number"=> "076"),
		array("code"=> "IO", "code3"=> "IOT", "name"=> "British Indian Ocean Territory", "number"=> "086"),
		array("code"=> "BN", "code3"=> "BRN", "name"=> "Brunei Darussalam", "number"=> "096"),
		array("code"=> "BG", "code3"=> "BGR", "name"=> "Bulgaria", "number"=> "100"),
		array("code"=> "BF", "code3"=> "BFA", "name"=> "Burkina Faso", "number"=> "854"),
		array("code"=> "BI", "code3"=> "BDI", "name"=> "Burundi", "number"=> "108"),
		array("code"=> "CV", "code3"=> "CPV", "name"=> "Cabo Verde", "number"=> "132"),
		array("code"=> "KH", "code3"=> "KHM", "name"=> "Cambodia", "number"=> "116"),
		array("code"=> "CM", "code3"=> "CMR", "name"=> "Cameroon", "number"=> "120"),
		array("code"=> "CA", "code3"=> "CAN", "name"=> "Canada", "number"=> "124"),
		array("code"=> "KY", "code3"=> "CYM", "name"=> "Cayman Islands", "number"=> "136"),
		array("code"=> "CF", "code3"=> "CAF", "name"=> "Central African Republic", "number"=> "140"),
		array("code"=> "TD", "code3"=> "TCD", "name"=> "Chad", "number"=> "148"),
		array("code"=> "CL", "code3"=> "CHL", "name"=> "Chile", "number"=> "152"),
		array("code"=> "CN", "code3"=> "CHN", "name"=> "China", "number"=> "156"),
		array("code"=> "CX", "code3"=> "CXR", "name"=> "Christmas Island", "number"=> "162"),
		array("code"=> "CC", "code3"=> "CCK", "name"=> "Cocos (Keeling) Islands", "number"=> "166"),
		array("code"=> "CO", "code3"=> "COL", "name"=> "Colombia", "number"=> "170"),
		array("code"=> "KM", "code3"=> "COM", "name"=> "Comoros", "number"=> "174"),
		array("code"=> "CD", "code3"=> "COD", "name"=> "Congo (the Democratic Republic of the)", "number"=> "180"),
		array("code"=> "CG", "code3"=> "COG", "name"=> "Congo", "number"=> "178"),
		array("code"=> "CK", "code3"=> "COK", "name"=> "Cook Islands", "number"=> "184"),
		array("code"=> "CR", "code3"=> "CRI", "name"=> "Costa Rica", "number"=> "188"),
		array("code"=> "HR", "code3"=> "HRV", "name"=> "Croatia", "number"=> "191"),
		array("code"=> "CU", "code3"=> "CUB", "name"=> "Cuba", "number"=> "192"),
		array("code"=> "CW", "code3"=> "CUW", "name"=> "Curaçao", "number"=> "531"),
		array("code"=> "CY", "code3"=> "CYP", "name"=> "Cyprus", "number"=> "196"),
		array("code"=> "CZ", "code3"=> "CZE", "name"=> "Czechia", "number"=> "203"),
		array("code"=> "CI", "code3"=> "CIV", "name"=> "Côte d'Ivoire", "number"=> "384"),
		array("code"=> "DK", "code3"=> "DNK", "name"=> "Denmark", "number"=> "208"),
		array("code"=> "DJ", "code3"=> "DJI", "name"=> "Djibouti", "number"=> "262"),
		array("code"=> "DM", "code3"=> "DMA", "name"=> "Dominica", "number"=> "212"),
		array("code"=> "DO", "code3"=> "DOM", "name"=> "Dominican Republic", "number"=> "214"),
		array("code"=> "EC", "code3"=> "ECU", "name"=> "Ecuador", "number"=> "218"),
		array("code"=> "EG", "code3"=> "EGY", "name"=> "Egypt", "number"=> "818"),
		array("code"=> "SV", "code3"=> "SLV", "name"=> "El Salvador", "number"=> "222"),
		array("code"=> "GQ", "code3"=> "GNQ", "name"=> "Equatorial Guinea", "number"=> "226"),
		array("code"=> "ER", "code3"=> "ERI", "name"=> "Eritrea", "number"=> "232"),
		array("code"=> "EE", "code3"=> "EST", "name"=> "Estonia", "number"=> "233"),
		array("code"=> "SZ", "code3"=> "SWZ", "name"=> "Eswatini", "number"=> "748"),
		array("code"=> "ET", "code3"=> "ETH", "name"=> "Ethiopia", "number"=> "231"),
		array("code"=> "FK", "code3"=> "FLK", "name"=> "Falkland Islands array(Malvinas)", "number"=> "238"),
		array("code"=> "FO", "code3"=> "FRO", "name"=> "Faroe Islands", "number"=> "234"),
		array("code"=> "FJ", "code3"=> "FJI", "name"=> "Fiji", "number"=> "242"),
		array("code"=> "FI", "code3"=> "FIN", "name"=> "Finland", "number"=> "246"),
		array("code"=> "FR", "code3"=> "FRA", "name"=> "France", "number"=> "250"),
		array("code"=> "GF", "code3"=> "GUF", "name"=> "French Guiana", "number"=> "254"),
		array("code"=> "PF", "code3"=> "PYF", "name"=> "French Polynesia", "number"=> "258"),
		array("code"=> "TF", "code3"=> "ATF", "name"=> "French Southern Territories", "number"=> "260"),
		array("code"=> "GA", "code3"=> "GAB", "name"=> "Gabon", "number"=> "266"),
		array("code"=> "GM", "code3"=> "GMB", "name"=> "Gambia", "number"=> "270"),
		array("code"=> "GE", "code3"=> "GEO", "name"=> "Georgia", "number"=> "268"),
		array("code"=> "DE", "code3"=> "DEU", "name"=> "Germany", "number"=> "276"),
		array("code"=> "GH", "code3"=> "GHA", "name"=> "Ghana", "number"=> "288"),
		array("code"=> "GI", "code3"=> "GIB", "name"=> "Gibraltar", "number"=> "292"),
		array("code"=> "GR", "code3"=> "GRC", "name"=> "Greece", "number"=> "300"),
		array("code"=> "GL", "code3"=> "GRL", "name"=> "Greenland", "number"=> "304"),
		array("code"=> "GD", "code3"=> "GRD", "name"=> "Grenada", "number"=> "308"),
		array("code"=> "GP", "code3"=> "GLP", "name"=> "Guadeloupe", "number"=> "312"),
		array("code"=> "GU", "code3"=> "GUM", "name"=> "Guam", "number"=> "316"),
		array("code"=> "GT", "code3"=> "GTM", "name"=> "Guatemala", "number"=> "320"),
		array("code"=> "GG", "code3"=> "GGY", "name"=> "Guernsey", "number"=> "831"),
		array("code"=> "GN", "code3"=> "GIN", "name"=> "Guinea", "number"=> "324"),
		array("code"=> "GW", "code3"=> "GNB", "name"=> "Guinea-Bissau", "number"=> "624"),
		array("code"=> "GY", "code3"=> "GUY", "name"=> "Guyana", "number"=> "328"),
		array("code"=> "HT", "code3"=> "HTI", "name"=> "Haiti", "number"=> "332"),
		array("code"=> "HM", "code3"=> "HMD", "name"=> "Heard Island and McDonald Islands", "number"=> "334"),
		array("code"=> "VA", "code3"=> "VAT", "name"=> "Holy See", "number"=> "336"),
		array("code"=> "HN", "code3"=> "HND", "name"=> "Honduras", "number"=> "340"),
		array("code"=> "HK", "code3"=> "HKG", "name"=> "Hong Kong", "number"=> "344"),
		array("code"=> "HU", "code3"=> "HUN", "name"=> "Hungary", "number"=> "348"),
		array("code"=> "IS", "code3"=> "ISL", "name"=> "Iceland", "number"=> "352"),
		array("code"=> "IN", "code3"=> "IND", "name"=> "India", "number"=> "356"),
		array("code"=> "ID", "code3"=> "IDN", "name"=> "Indonesia", "number"=> "360"),
		array("code"=> "IR", "code3"=> "IRN", "name"=> "Iran (Islamic Republic of)", "number"=> "364"),
		array("code"=> "IQ", "code3"=> "IRQ", "name"=> "Iraq", "number"=> "368"),
		array("code"=> "IE", "code3"=> "IRL", "name"=> "Ireland", "number"=> "372"),
		array("code"=> "IM", "code3"=> "IMN", "name"=> "Isle of Man", "number"=> "833"),
		array("code"=> "IL", "code3"=> "ISR", "name"=> "Israel", "number"=> "376"),
		array("code"=> "IT", "code3"=> "ITA", "name"=> "Italy", "number"=> "380"),
		array("code"=> "JM", "code3"=> "JAM", "name"=> "Jamaica", "number"=> "388"),
		array("code"=> "JP", "code3"=> "JPN", "name"=> "Japan", "number"=> "392"),
		array("code"=> "JE", "code3"=> "JEY", "name"=> "Jersey", "number"=> "832"),
		array("code"=> "JO", "code3"=> "JOR", "name"=> "Jordan", "number"=> "400"),
		array("code"=> "KZ", "code3"=> "KAZ", "name"=> "Kazakhstan", "number"=> "398"),
		array("code"=> "KE", "code3"=> "KEN", "name"=> "Kenya", "number"=> "404"),
		array("code"=> "KI", "code3"=> "KIR", "name"=> "Kiribati", "number"=> "296"),
		array("code"=> "KP", "code3"=> "PRK", "name"=> "Korea (the Democratic People's Republic of)", "number"=> "408"),
		array("code"=> "KR", "code3"=> "KOR", "name"=> "Korea (the Republic of)", "number"=> "410"),
		array("code"=> "KW", "code3"=> "KWT", "name"=> "Kuwait", "number"=> "414"),
		array("code"=> "KG", "code3"=> "KGZ", "name"=> "Kyrgyzstan", "number"=> "417"),
		array("code"=> "LA", "code3"=> "LAO", "name"=> "Lao People's Democratic Republic", "number"=> "418"),
		array("code"=> "LV", "code3"=> "LVA", "name"=> "Latvia", "number"=> "428"),
		array("code"=> "LB", "code3"=> "LBN", "name"=> "Lebanon", "number"=> "422"),
		array("code"=> "LS", "code3"=> "LSO", "name"=> "Lesotho", "number"=> "426"),
		array("code"=> "LR", "code3"=> "LBR", "name"=> "Liberia", "number"=> "430"),
		array("code"=> "LY", "code3"=> "LBY", "name"=> "Libya", "number"=> "434"),
		array("code"=> "LI", "code3"=> "LIE", "name"=> "Liechtenstein", "number"=> "438"),
		array("code"=> "LT", "code3"=> "LTU", "name"=> "Lithuania", "number"=> "440"),
		array("code"=> "LU", "code3"=> "LUX", "name"=> "Luxembourg", "number"=> "442"),
		array("code"=> "MO", "code3"=> "MAC", "name"=> "Macao", "number"=> "446"),
		array("code"=> "MG", "code3"=> "MDG", "name"=> "Madagascar", "number"=> "450"),
		array("code"=> "MW", "code3"=> "MWI", "name"=> "Malawi", "number"=> "454"),
		array("code"=> "MY", "code3"=> "MYS", "name"=> "Malaysia", "number"=> "458"),
		array("code"=> "MV", "code3"=> "MDV", "name"=> "Maldives", "number"=> "462"),
		array("code"=> "ML", "code3"=> "MLI", "name"=> "Mali", "number"=> "466"),
		array("code"=> "MT", "code3"=> "MLT", "name"=> "Malta", "number"=> "470"),
		array("code"=> "MH", "code3"=> "MHL", "name"=> "Marshall Islands", "number"=> "584"),
		array("code"=> "MQ", "code3"=> "MTQ", "name"=> "Martinique", "number"=> "474"),
		array("code"=> "MR", "code3"=> "MRT", "name"=> "Mauritania", "number"=> "478"),
		array("code"=> "MU", "code3"=> "MUS", "name"=> "Mauritius", "number"=> "480"),
		array("code"=> "YT", "code3"=> "MYT", "name"=> "Mayotte", "number"=> "175"),
		array("code"=> "MX", "code3"=> "MEX", "name"=> "Mexico", "number"=> "484"),
		array("code"=> "FM", "code3"=> "FSM", "name"=> "Micronesia (Federated States of)", "number"=> "583"),
		array("code"=> "MD", "code3"=> "MDA", "name"=> "Moldova (the Republic of)", "number"=> "498"),
		array("code"=> "MC", "code3"=> "MCO", "name"=> "Monaco", "number"=> "492"),
		array("code"=> "MN", "code3"=> "MNG", "name"=> "Mongolia", "number"=> "496"),
		array("code"=> "ME", "code3"=> "MNE", "name"=> "Montenegro", "number"=> "499"),
		array("code"=> "MS", "code3"=> "MSR", "name"=> "Montserrat", "number"=> "500"),
		array("code"=> "MA", "code3"=> "MAR", "name"=> "Morocco", "number"=> "504"),
		array("code"=> "MZ", "code3"=> "MOZ", "name"=> "Mozambique", "number"=> "508"),
		array("code"=> "MM", "code3"=> "MMR", "name"=> "Myanmar", "number"=> "104"),
		array("code"=> "NA", "code3"=> "NAM", "name"=> "Namibia", "number"=> "516"),
		array("code"=> "NR", "code3"=> "NRU", "name"=> "Nauru", "number"=> "520"),
		array("code"=> "NP", "code3"=> "NPL", "name"=> "Nepal", "number"=> "524"),
		array("code"=> "NL", "code3"=> "NLD", "name"=> "Netherlands", "number"=> "528"),
		array("code"=> "NC", "code3"=> "NCL", "name"=> "New Caledonia", "number"=> "540"),
		array("code"=> "NZ", "code3"=> "NZL", "name"=> "New Zealand", "number"=> "554"),
		array("code"=> "NI", "code3"=> "NIC", "name"=> "Nicaragua", "number"=> "558"),
		array("code"=> "NE", "code3"=> "NER", "name"=> "Niger", "number"=> "562"),
		array("code"=> "NG", "code3"=> "NGA", "name"=> "Nigeria", "number"=> "566"),
		array("code"=> "NU", "code3"=> "NIU", "name"=> "Niue", "number"=> "570"),
		array("code"=> "NF", "code3"=> "NFK", "name"=> "Norfolk Island", "number"=> "574"),
		array("code"=> "MP", "code3"=> "MNP", "name"=> "Northern Mariana Islands", "number"=> "580"),
		array("code"=> "NO", "code3"=> "NOR", "name"=> "Norway", "number"=> "578"),
		array("code"=> "OM", "code3"=> "OMN", "name"=> "Oman", "number"=> "512"),
		array("code"=> "PK", "code3"=> "PAK", "name"=> "Pakistan", "number"=> "586"),
		array("code"=> "PW", "code3"=> "PLW", "name"=> "Palau", "number"=> "585"),
		array("code"=> "PS", "code3"=> "PSE", "name"=> "Palestine, State of", "number"=> "275"),
		array("code"=> "PA", "code3"=> "PAN", "name"=> "Panama", "number"=> "591"),
		array("code"=> "PG", "code3"=> "PNG", "name"=> "Papua New Guinea", "number"=> "598"),
		array("code"=> "PY", "code3"=> "PRY", "name"=> "Paraguay", "number"=> "600"),
		array("code"=> "PE", "code3"=> "PER", "name"=> "Peru", "number"=> "604"),
		array("code"=> "PH", "code3"=> "PHL", "name"=> "Philippines", "number"=> "608"),
		array("code"=> "PN", "code3"=> "PCN", "name"=> "Pitcairn", "number"=> "612"),
		array("code"=> "PL", "code3"=> "POL", "name"=> "Poland", "number"=> "616"),
		array("code"=> "PT", "code3"=> "PRT", "name"=> "Portugal", "number"=> "620"),
		array("code"=> "PR", "code3"=> "PRI", "name"=> "Puerto Rico", "number"=> "630"),
		array("code"=> "QA", "code3"=> "QAT", "name"=> "Qatar", "number"=> "634"),
		array("code"=> "MK", "code3"=> "MKD", "name"=> "Republic of North Macedonia", "number"=> "807"),
		array("code"=> "RO", "code3"=> "ROU", "name"=> "Romania", "number"=> "642"),
		array("code"=> "RU", "code3"=> "RUS", "name"=> "Russian Federation", "number"=> "643"),
		array("code"=> "RW", "code3"=> "RWA", "name"=> "Rwanda", "number"=> "646"),
		array("code"=> "RE", "code3"=> "REU", "name"=> "Réunion", "number"=> "638"),
		array("code"=> "BL", "code3"=> "BLM", "name"=> "Saint Barthélemy", "number"=> "652"),
		array("code"=> "SH", "code3"=> "SHN", "name"=> "Saint Helena, Ascension and Tristan da Cunha", "number"=> "654"),
		array("code"=> "KN", "code3"=> "KNA", "name"=> "Saint Kitts and Nevis", "number"=> "659"),
		array("code"=> "LC", "code3"=> "LCA", "name"=> "Saint Lucia", "number"=> "662"),
		array("code"=> "MF", "code3"=> "MAF", "name"=> "Saint Martin (French part)", "number"=> "663"),
		array("code"=> "PM", "code3"=> "SPM", "name"=> "Saint Pierre and Miquelon", "number"=> "666"),
		array("code"=> "VC", "code3"=> "VCT", "name"=> "Saint Vincent and the Grenadines", "number"=> "670"),
		array("code"=> "WS", "code3"=> "WSM", "name"=> "Samoa", "number"=> "882"),
		array("code"=> "SM", "code3"=> "SMR", "name"=> "San Marino", "number"=> "674"),
		array("code"=> "ST", "code3"=> "STP", "name"=> "Sao Tome and Principe", "number"=> "678"),
		array("code"=> "SA", "code3"=> "SAU", "name"=> "Saudi Arabia", "number"=> "682"),
		array("code"=> "SN", "code3"=> "SEN", "name"=> "Senegal", "number"=> "686"),
		array("code"=> "RS", "code3"=> "SRB", "name"=> "Serbia", "number"=> "688"),
		array("code"=> "SC", "code3"=> "SYC", "name"=> "Seychelles", "number"=> "690"),
		array("code"=> "SL", "code3"=> "SLE", "name"=> "Sierra Leone", "number"=> "694"),
		array("code"=> "SG", "code3"=> "SGP", "name"=> "Singapore", "number"=> "702"),
		array("code"=> "SX", "code3"=> "SXM", "name"=> "Sint Maarten (Dutch part)", "number"=> "534"),
		array("code"=> "SK", "code3"=> "SVK", "name"=> "Slovakia", "number"=> "703"),
		array("code"=> "SI", "code3"=> "SVN", "name"=> "Slovenia", "number"=> "705"),
		array("code"=> "SB", "code3"=> "SLB", "name"=> "Solomon Islands", "number"=> "090"),
		array("code"=> "SO", "code3"=> "SOM", "name"=> "Somalia", "number"=> "706"),
		array("code"=> "ZA", "code3"=> "ZAF", "name"=> "South Africa", "number"=> "710"),
		array("code"=> "GS", "code3"=> "SGS", "name"=> "South Georgia and the South Sandwich Islands", "number"=> "239"),
		array("code"=> "SS", "code3"=> "SSD", "name"=> "South Sudan", "number"=> "728"),
		array("code"=> "ES", "code3"=> "ESP", "name"=> "Spain", "number"=> "724"),
		array("code"=> "LK", "code3"=> "LKA", "name"=> "Sri Lanka", "number"=> "144"),
		array("code"=> "SD", "code3"=> "SDN", "name"=> "Sudan", "number"=> "729"),
		array("code"=> "SR", "code3"=> "SUR", "name"=> "Suriname", "number"=> "740"),
		array("code"=> "SJ", "code3"=> "SJM", "name"=> "Svalbard and Jan Mayen", "number"=> "744"),
		array("code"=> "SE", "code3"=> "SWE", "name"=> "Sweden", "number"=> "752"),
		array("code"=> "CH", "code3"=> "CHE", "name"=> "Switzerland", "number"=> "756"),
		array("code"=> "SY", "code3"=> "SYR", "name"=> "Syrian Arab Republic", "number"=> "760"),
		array("code"=> "TW", "code3"=> "TWN", "name"=> "Taiwan (Province of China)", "number"=> "158"),
		array("code"=> "TJ", "code3"=> "TJK", "name"=> "Tajikistan", "number"=> "762"),
		array("code"=> "TZ", "code3"=> "TZA", "name"=> "Tanzania, United Republic of", "number"=> "834"),
		array("code"=> "TH", "code3"=> "THA", "name"=> "Thailand", "number"=> "764"),
		array("code"=> "TL", "code3"=> "TLS", "name"=> "Timor-Leste", "number"=> "626"),
		array("code"=> "TG", "code3"=> "TGO", "name"=> "Togo", "number"=> "768"),
		array("code"=> "TK", "code3"=> "TKL", "name"=> "Tokelau", "number"=> "772"),
		array("code"=> "TO", "code3"=> "TON", "name"=> "Tonga", "number"=> "776"),
		array("code"=> "TT", "code3"=> "TTO", "name"=> "Trinidad and Tobago", "number"=> "780"),
		array("code"=> "TN", "code3"=> "TUN", "name"=> "Tunisia", "number"=> "788"),
		array("code"=> "TR", "code3"=> "TUR", "name"=> "Turkey", "number"=> "792"),
		array("code"=> "TM", "code3"=> "TKM", "name"=> "Turkmenistan", "number"=> "795"),
		array("code"=> "TC", "code3"=> "TCA", "name"=> "Turks and Caicos Islands", "number"=> "796"),
		array("code"=> "TV", "code3"=> "TUV", "name"=> "Tuvalu", "number"=> "798"),
		array("code"=> "UG", "code3"=> "UGA", "name"=> "Uganda", "number"=> "800"),
		array("code"=> "UA", "code3"=> "UKR", "name"=> "Ukraine", "number"=> "804"),
		array("code"=> "AE", "code3"=> "ARE", "name"=> "United Arab Emirates", "number"=> "784"),
		array("code"=> "GB", "code3"=> "GBR", "name"=> "United Kingdom of Great Britain and Northern Ireland", "number"=> "826"),
		array("code"=> "UM", "code3"=> "UMI", "name"=> "United States Minor Outlying Islands", "number"=> "581"),
		array("code"=> "US", "code3"=> "USA", "name"=> "United States of America", "number"=> "840"),
		array("code"=> "UY", "code3"=> "URY", "name"=> "Uruguay", "number"=> "858"),
		array("code"=> "UZ", "code3"=> "UZB", "name"=> "Uzbekistan", "number"=> "860"),
		array("code"=> "VU", "code3"=> "VUT", "name"=> "Vanuatu", "number"=> "548"),
		array("code"=> "VE", "code3"=> "VEN", "name"=> "Venezuela (Bolivarian Republic of)", "number"=> "862"),
		array("code"=> "VN", "code3"=> "VNM", "name"=> "Viet Nam", "number"=> "704"),
		array("code"=> "VG", "code3"=> "VGB", "name"=> "Virgin Islands (British)", "number"=> "092"),
		array("code"=> "VI", "code3"=> "VIR", "name"=> "Virgin Islands (U.S.)", "number"=> "850"),
		array("code"=> "WF", "code3"=> "WLF", "name"=> "Wallis and Futuna", "number"=> "876"),
		array("code"=> "EH", "code3"=> "ESH", "name"=> "Western Sahara", "number"=> "732"),
		array("code"=> "YE", "code3"=> "YEM", "name"=> "Yemen", "number"=> "887"),
		array("code"=> "ZM", "code3"=> "ZMB", "name"=> "Zambia", "number"=> "894"),
		array("code"=> "ZW", "code3"=> "ZWE", "name"=> "Zimbabwe", "number"=> "716"),
		array("code"=> "AX", "code3"=> "ALA", "name"=> "Åland Islands", "number"=> "248")
	);

	 
    function d($data)
    {
    	echo "<pre>";
    	print_r($data);
    	echo "</pre>";
    }
    function dd($data)
    {
    	echo "<pre>";
    	print_r($data);
    	echo "</pre>";
    	die();
    }

?>