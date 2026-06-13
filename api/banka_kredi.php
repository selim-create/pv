<?php
include 'api_helper.php';

$kredi_source = get_url_curl($ad = "https://www.hangikredi.com/kredi/" . $_GET['type'] . "/" . $_GET['banka'] . "?amount=" . $_GET['kredi_fiyat'] . "&maturity=" . $_GET['kredi_vade']);

preg_match_all('@aylikTaksit="(.*?)"@si', $kredi_source, $monthly);
preg_match_all('@toplam="(.*?)"@si', $kredi_source, $toplam);
preg_match_all('@faizOrani="(.*?)"@si', $kredi_source, $faizOrani);

if (empty($monthly[1][0])) {
	preg_match_all('@"MonthlyInstallment": (.*?),@si', $kredi_source, $monthly);
	preg_match_all('@"TotalAmount": (.*?),@si', $kredi_source, $toplam);
	preg_match_all('@"InterestRate": (.*?),@si', $kredi_source, $faizOrani);
}

if (empty($monthly[1][0])) {
	preg_match_all('@"metric2": "(.*?)",@si', $kredi_source, $monthly);
	preg_match_all('@"dimension12": "(.*?)",@si', $kredi_source, $toplam);
	preg_match_all('@"metric3": "(.*?)",@si', $kredi_source, $faizOrani);
}

if (empty($monthly[1][0])) {
	preg_match_all('@<p class="product-list-card_info__Na8Zr product-list-card_info__emphatic__hrdln" data-testid="monthlyInstallment">(.*?)<span class="text-xxs leading-3">@si', $kredi_source, $monthly);
	preg_match_all('@</div></div><p class="product-list-card_info__Na8Zr order-2 md:order-3" data-testid="totalAmount">(.*?)<span>@si', $kredi_source, $toplam);
	preg_match_all('@<p class="product-list-card_info__Na8Zr order-2 md:order-3">%(.*?)</p></div>@si', $kredi_source, $faizOrani);
}

if (!empty($monthly[1][0])) {
	$kredi['is_active'] = true;
}

$kredi['monthly'] = str_replace("TL", null, $monthly[1][0]);
$kredi['interest'] = $faizOrani[1][0];
$kredi['total'] =$toplam[1][0];

echo json_encode($kredi, true);
