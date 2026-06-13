<?php
function get_url_curl($url,  $http_header = false )
{
	include __DIR__ . "/../lisans.php";
	if($lisans == '575cb86ee8b647b0ce6edddeb0d6edf9') {
		if(strstr($url, 'uzmanpara')) {
			$url = 'https://lisans.birtema.com/proxy/?url=' . $url;
		}
	}
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_TIMEOUT, 8);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
	if($http_header) {
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $http_header );
	}
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n", "\t", "\r"), '', $curlResult);
}

function get_data_service($parameter)
{
    include __DIR__ . "/../lisans.php";

    $domain = $_SERVER["HTTP_HOST"];
    $domain = str_replace('www.', '', $domain);

    $curl = curl_init("https://data.birtema.com/data/" . $parameter);
    curl_setopt($curl, CURLOPT_TIMEOUT, 2);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $source = "lisans=" . $lisans . "&domain=" . $domain);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $curlResult = curl_exec($curl);
    curl_close($curl);
    return json_decode($curlResult, true);
}

function get_bigpara($url)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_TIMEOUT, 2);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, explode("\n", 'Host: bigpara.hurriyet.com.tr
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:75.0) Gecko/20100101 Firefox/75.0
Accept: */*
Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate
VerificationToken: rZ9CAfZuIco1aYGHq3w6y0wULH0UlA1wL_j-fHnJcsvZYeqPhbcnUzyw8cf7dX07qe8ur_FUDVqy6qp7A8P_7A1Mx_M1,xmqTRCII3QhYwUH0D0HlNEXQatUbnHrWsLQySToN5tHWcmuvr9SZamMn5OsX2ZDJH-aIb0fGrbadHJnd131WlcXHAUo1
X-Requested-With: XMLHttpRequest
Connection: keep-alive
Referer: https://bigpara.hurriyet.com.tr/altin/yarim-altin-fiyati/3yil/
Cache-Control: max-age=0'));


    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n", "\t", "\r"), '', $curlResult);
}

function get_url_doviz_auth($url)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_TIMEOUT, "2");
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n", "\t", "\r"), '', $curlResult);
}

function get_url_doviz($url, $auth)
{
    preg_match_all('@/coins/(.*?)/daily@si', $url, $coin_name);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_TIMEOUT, "2");
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, explode("\n", 'Host: www.doviz.com
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:87.0) Gecko/20100101 Firefox/87.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate, br
Authorization: Basic ' . $auth . '
X-Requested-With: XMLHttpRequest
Connection: keep-alive
Referer: https://www.doviz.com/kripto-paralar/' . $coin_name[1][0] . '
Cookie: _ga=GA1.2.1463470579.1612299502; _pubcid=0bb351d5-0f86-4948-afa8-bcafc9fdd22f; cto_bundle=qVVeaF9na0ZFazFjRFdjb0FGYVpDellZbnVWSiUyQjlvMEtEU1l1eVZVandjR2owVDlORTNMeG50dWklMkZEdFFqQTZXNWRuanlXOU5qSFVNakZBQjRld1Y1NDNab24yQUFqQkVHcUk3V2kzbXRMY2R0NzclMkJQckJnMkpMRmlJdiUyRk9zQ0dFQSUyQkt1MTBWa1dwZlNjSUJJVEhKZVZqOTNPSlZCOHVyTCUyRm42Q3BJTjRZN2xrd1h2eVZqOXd0VkpVT3o5QkN3MW5aa0Y; custom-header-tooltip=hidden; __gads=ID=1cdfaf95534760f0-22fd70a154ba00ea:T=1612299519:S=ALNI_MaxqdqJK7T1JrwfLWpHLQlwT4WpNg; noktaId=vnet63bed40b-1e5c-4e39-9840-469f40efc10f; cto_bidid=7_s-nV9VZ3VxbGZXeXdjdGlTblk2TE9XSHhYMTl5U1lvY1N6RlhoS015QnQlMkYlMkZKc2RSVGIxdjl3WGt5VUY0MHUwTkpOdmo0RSUyRlRBelZZN0k4cFZ5RmxzRDByZyUzRCUzRA; cto_bundle=Qbc8bV9na0ZFazFjRFdjb0FGYVpDellZbnVSNE80dm1UR1FCR3piZ2xrOHQ2UGQ2MkE4TGh4NU8lMkZwZzIxQXAxJTJGbGt6blFXaW9FQ1hOeiUyRmRvQjZZT3VMTEhHYVpRNThWalhZY0o2MnROREhpb0FKNmVXalR5WDNXN3hYQW9Bam1RMGRqTjc3c1ZoOUhPY3F6akNQenc0QmFaOVElM0QlM0Q; cto_bundle=qVVeaF9na0ZFazFjRFdjb0FGYVpDellZbnVWSiUyQjlvMEtEU1l1eVZVandjR2owVDlORTNMeG50dWklMkZEdFFqQTZXNWRuanlXOU5qSFVNakZBQjRld1Y1NDNab24yQUFqQkVHcUk3V2kzbXRMY2R0NzclMkJQckJnMkpMRmlJdiUyRk9zQ0dFQSUyQkt1MTBWa1dwZlNjSUJJVEhKZVZqOTNPSlZCOHVyTCUyRm42Q3BJTjRZN2xrd1h2eVZqOXd0VkpVT3o5QkN3MW5aa0Y; cookie-disclaimer=1; userID=058ec54f-3417-405a-8998-2a4f2329f826; _pbjs_userid_consent_data=3524755945110770; -unifiedid=%7B%22TDID%22%3A%22de6c85e4-3aea-4dc0-a854-9706bcb0a78b%22%2C%22TDID_LOOKUP%22%3A%22FALSE%22%2C%22TDID_CREATED_AT%22%3A%222021-03-25T19%3A34%3A28%22%7D; _gid=GA1.2.1819917590.1616858567; watchID=575d9279-b40b-473e-90c3-1008125701ee; pId=vnet63bed40b-1e5c-4e39-9840-469f40efc10f; vrg_sitRef=https%3A%2F%2Fwww.izlesene.com%2F; reloadedpage=1; _gat_dovizcom_web=1; FCCDCF=[["AKsRol84aHNjY4wI3zZcqJe5SSTp7odb_VTtS5dSxoF8awHLn3EWOb5lgVs1ckaUf9JK-o5WbM4e7PhEMsRoWjvGEBoVBaiafe8RGPpnYnnFnf4naeqpSwZPTn93pMz3nZ_IZYsemRai58x3W_5sxqeWPzxpaIzfkg=="],null,["[[],[],[],[],null,null,true]",1616871342295],null]
TE: Trailers'));


    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n", "\t", "\r"), '', $curlResult);
}

function get_url_banka($url)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_TIMEOUT, "2");
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, explode("\n", "Host: kur.doviz.com
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:67.0) Gecko/20100101 Firefox/67.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate, br
Referer: https://kur.doviz.com/sekerbank/amerikan-dolari
Connection: keep-alive
Cookie: cookie-disclaimer=1; _ga=GA1.2.543312151.1555535187; __gfp_64b=2cgqS7CZ4axJCxtq3UmlGUv1tf4YBw3s41ne7k9HKBX.N7; __gads=ID=ec306235f60c7038:T=1555535190:S=ALNI_MY4i0KiBrjZNZvgkj1LvJ5qwOLqsw; cto_lwid=4fbc0281-8dd0-4d61-beb6-c09d04f39b42; cto_idcpy=c5e8606e-717c-4922-81b7-b4aa4775b302
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache
TE: Trailers"));

    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n", "\t", "\r"), '', $curlResult);
}


function permalink($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}
