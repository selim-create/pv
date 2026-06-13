<?php

function replaceBanka($bank)
{
    $bank = str_replace('kredi-ihtiyac-kredisi-', '', $bank);
    return str_replace(array("ceptecepteteb"), array("cepteteb"), str_replace(
        array("ing-bank", "garanti-bbva", "teb", "finansbank", "turkiye-is-bankasi", "yapi-kredi-bankasi", "cepteteb-cetelem", "qnb-qnb-finansbank", "vakif-katilim"),
        array("ing", "garanti-bankasi", "cepteteb", "qnb-finansbank", "is-bankasi", "yapi-kredi", "cepteteb", "qnb-finansbank", "vakifbank"),
        $bank
    ));
}

function kredi_data($kredi_type, $tutar, $vade)
{
    if ($kredi_type == 'kobi') {
        return kobi_kredi_data($kredi_type, $tutar, $vade);
    } elseif ($kredi_type == 'tasit') {
        $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/tasit-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
        preg_match_all('@<script id="__NEXT_DATA__" type="application/json">(.*?)</script>@si', $kaynak, $json);
        $json_datas = json_decode($json[1][0], true)['props']['pageProps']['initialConsumerLoanProducts'];
        $json_data = array_merge($json_datas['products'], $json_datas['otherProducts']);
    //return tasit_kredi_data($kredi_type, $tutar, $vade);
    } elseif ($kredi_type == 'ihtiyac') {
        return ihtiyac_kredi_data($kredi_type, $tutar, $vade);
    } else {
        $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/konut-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
        preg_match_all('@<script id="__NEXT_DATA__" type="application/json">(.*?)</script>@si', $kaynak, $json);
        $json_datas = json_decode($json[1][0], true)['props']['pageProps']['initialConsumerLoanProducts'];
        $json_data = array_merge($json_datas['products'], $json_datas['otherProducts']);
    }

    foreach ($json_data as $key => $value) {
        if (!empty($value['bank']['name'])) {
            $data[] = array(
                'id' => $value['bank']['id'],
                'banka' => $value['bank']['name'],
                'kredi' => $value['name'],
                'faiz' => $value['interestRate'],
                'tahsis_ucreti' => $value['expenseAmount'],
                'aylik_taksit' => $value['monthlyInstallment'],
                'toplam_odeme' => $value['totalAmount']
            );
        }
    }

    foreach ($data as $key => $value) {
        $json_data['faiz'][$key] = $value['faiz'];
        $json_data['banka'][$key] = $value['banka'];
        $json_data['kredi'][$key] = $value['kredi'];
        $json_data['tahsis_ucreti'][$key] = $value['tahsis_ucreti'];
        $json_data['aylik_taksit'][$key] = $value['aylik_taksit'];
        $json_data['toplam_odeme'][$key] = number_format($value['toplam_odeme'], 2, ",", ".");
        $json_data['id'][$key] = $value['id'];
    }

    return $json_data;
}

function kobi_kredi_data($kredi_type, $tutar, $vade)
{
    $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/kobi-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
    preg_match_all('@<tr(.*?) masraf="(.*?)" aylikTaksit="(.*?)" toplam="(.*?)" faizOrani="(.*?)">(.*?)</tr>@si', $kaynak, $tr);

    if (empty($tr[6])) {
        $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/kobi-kredisi/sorgulama?Tutar=$tutar&Vade=$vade");
        preg_match_all('@<tr(.*?) masraf="(.*?)" aylikTaksit="(.*?)" toplam="(.*?)" faizOrani="(.*?)">(.*?)</tr>@si', $kaynak, $tr);

        if (empty($tr[6])) {
            $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/kobi-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
            preg_match_all('@<tr(.*?) masraf="(.*?)" aylikTaksit="(.*?)" toplam="(.*?)" faizOrani="(.*?)">(.*?)</tr>@si', $kaynak, $tr);
        }
    }

    foreach ($tr[6] as $key => $value) {
        preg_match_all('@spacer.gif" alt="(.*?)" class="logo bankaSprite">@si', $value, $banka);
        preg_match_all('@<div style="text-transform:capitalize" class="textUrunAdi">(.*?)</div>@si', $value, $kredi);
        preg_match_all('@<strong>(.*?)</strong>@si', $value, $faiz);
        preg_match_all('@<span class="toolTipAmount pull-right text-right">(.*?)</span>@si', $value, $tahsis_ucreti);
        preg_match_all('@<div class="housingTaksit short">                    <div>                        <p>Aylık Taksit</p>                        <p><strong>(.*?)</strong></p>                    </div>@si', $value, $aylik_taksit);
        preg_match_all('@<p>Toplam Ödeme</p>                        <p><strong>(.*?)</strong></p>@si', $value, $toplam_odeme);
        preg_match_all('@  (.*?),    "Name"@si', $value, $id);

        if (!empty($banka[1][0])) {
            $tr[4][$key] = str_replace(array(".", ","), array(",", "."), $tr[4][$key]);
            $data[] = array(
                'id' => $banka[2][0],
                'banka' => html_entity_decode($banka[1][0]),
                'kredi' => $kredi[1][0],
                'faiz' => $tr[5][$key],
                'tahsis_ucreti' => $tr[2][$key],
                'aylik_taksit' => $tr[3][$key],
                'toplam_odeme' => number_format($tr[4][$key], 2, ",", ".")
            );
        }
    }

    foreach ($data as $key => $value) {
        $json_data['faiz'][$key] = $value['faiz'];
        $json_data['banka'][$key] = $value['banka'];
        $json_data['kredi'][$key] = $value['kredi'];
        $json_data['tahsis_ucreti'][$key] = $value['tahsis_ucreti'];
        $json_data['aylik_taksit'][$key] = $value['aylik_taksit'];
        $json_data['toplam_odeme'][$key] = $value['toplam_odeme'];
        $json_data['id'][$key] = $value['id'];
    }

    return $json_data;
}

function tasit_kredi_data($kredi_type, $tutar, $vade)
{
    $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/tasit-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
    preg_match_all('@<tr(.*?) masraf="(.*?)" aylikTaksit="(.*?)" toplam="(.*?)" faizOrani="(.*?)">(.*?)</tr>@si', $kaynak, $tr);

    if (empty($tr[6])) {
        $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/tasit-kredisi/sorgulama?Tutar=$tutar&Vade=$vade");
        preg_match_all('@<tr(.*?)masraf="(.*?)" aylikTaksit="(.*?)" toplam="(.*?)" faizOrani="(.*?)">(.*?)</tr>@si', $kaynak, $tr);

        if (empty($tr[6])) {
            $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/tasit-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
            preg_match_all('@<tr(.*?) masraf="(.*?)" aylikTaksit="(.*?)" toplam="(.*?)" faizOrani="(.*?)">(.*?)</tr>@si', $kaynak, $tr);
        }
    }

    foreach ($tr[6] as $key => $value) {
        preg_match_all('@spacer.gif" alt="(.*?)" class="logo bankaSprite">@si', $value, $banka);
        preg_match_all('@<div style="text-transform:capitalize" class="textUrunAdi">(.*?)</div>@si', $value, $kredi);
        preg_match_all('@<strong>(.*?)</strong>@si', $value, $faiz);
        preg_match_all('@<span class="toolTipAmount pull-right text-right">(.*?)</span>@si', $value, $tahsis_ucreti);
        preg_match_all('@<div class="housingTaksit short">                    <div>                        <p>Aylık Taksit</p>                        <p><strong>(.*?)</strong></p>                    </div>@si', $value, $aylik_taksit);
        preg_match_all('@<p>Toplam Ödeme</p>                        <p><strong>(.*?)</strong></p>@si', $value, $toplam_odeme);
        preg_match_all('@  (.*?),    "Name"@si', $value, $id);

        if (!empty($banka[1][0])) {
            $tr[4][$key] = str_replace(array(".", ","), array(",", "."), $tr[4][$key]);
            $data[] = array(
                'id' => $banka[2][0],
                'banka' => html_entity_decode($banka[1][0]),
                'kredi' => $kredi[1][0],
                'faiz' => $tr[5][$key],
                'tahsis_ucreti' => $tr[2][$key],
                'aylik_taksit' => $tr[3][$key],
                'toplam_odeme' => number_format($tr[4][$key], 2, ",", ".")
            );
        }
    }

    foreach ($data as $key => $value) {
        $json_data['faiz'][$key] = $value['faiz'];
        $json_data['banka'][$key] = $value['banka'];
        $json_data['kredi'][$key] = $value['kredi'];
        $json_data['tahsis_ucreti'][$key] = $value['tahsis_ucreti'];
        $json_data['aylik_taksit'][$key] = $value['aylik_taksit'];
        $json_data['toplam_odeme'][$key] = $value['toplam_odeme'];
        $json_data['id'][$key] = $value['id'];
    }

    return $json_data;
}

function ihtiyac_kredi_data($kredi_type, $tutar, $vade)
{
    $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/ihtiyac-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
    preg_match_all('@class="card__container"(.*?)<div class="card__footer">@si', $kaynak, $tr);
	
    if (empty($tr[1])) {
        $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/ihtiyac-kredisi/sorgulama?amount=$tutar&maturity=$vade");
        preg_match_all('@class="card__container"(.*?)<div class="card__footer">@si', $kaynak, $tr);

        if (empty($tr[1])) {
            $kaynak = get_url_curl($ad = "https://www.hangikredi.com/kredi/ihtiyac-kredisi/sorgulama/$vade-ay-$tutar-tl-kredi");
            preg_match_all('@class="card__container"(.*?)<div class="card__footer">@si', $kaynak, $tr);
        }
    }

    foreach ($tr[1] as $key => $value) {
	    preg_match_all('@<span class="bank" data-testid="bankName">(.*?)</span>@si', $value, $banka);
	    preg_match_all('@<span data-testid="name">(.*?)</span>@si', $value, $kredi);
	    preg_match_all('@<p class="title" data-testid="title">Faiz Oranı</p>                <div class="rates" data-testid="rate">                    (.*?)                </div>            </div>            <div class="monthly-installment">@si', $value, $faiz);
	    preg_match_all('@<td>Tahsis Ücreti</td>                                    <td data-testid="expenseAmount">(.*?)</td>@si', $value, $tahsis_ucreti);
	    preg_match_all('@<p class="rates" data-testid="monthlyInstallment">(.*?)</p>@si', $value, $aylik_taksit);
	    preg_match_all('@<div class="total-payment">                <p class="title">Toplam Ödeme</p>                <div class="rates" data-testid="totalAmount">                    (.*?)</span>@si', $value, $toplam_odeme);
	    preg_match_all('@  (.*?),    "Name"@si', $value, $id);
	    
	    if (empty($faiz[1][0])) {
		    preg_match_all('@<p class="title" data-testid="title">K&#xE2;r Pay&#x131; Oranı</p>                <div class="rates" data-testid="rate">                    (.*?)                </div>@si', $value, $faiz);
	    }

        if (empty($banka[1][0])) {
			
            preg_match_all('@<span class="bank" data-testid="bankName">(.*?)</span>@si', $value, $banka);
            preg_match_all('@<span data-testid="name">(.*?)</span>@si', $value, $kredi);
            preg_match_all('@<p class="title" data-testid="title">Faiz Oranı</p>                <div class="rates" data-testid="rate">                    (.*?)                </div>            </div>            <div class="monthly-installment">@si', $value, $faiz);
            preg_match_all('@<td>Tahsis Ücreti</td>                                    <td data-testid="expenseAmount">(.*?)</td>@si', $value, $tahsis_ucreti);
            preg_match_all('@<p class="rates" data-testid="monthlyInstallment">(.*?)</p>@si', $value, $aylik_taksit);
            preg_match_all('@<div class="total-payment">                <p class="title">Toplam Ödeme</p>                <div class="rates" data-testid="totalAmount">                    (.*?)</span>@si', $value, $toplam_odeme);
            preg_match_all('@  (.*?),    "Name"@si', $value, $id);
            if (empty($faiz[1][0])) {
                preg_match_all('@<p class="title">K&#xE2;r Pay&#x131; Oranı</p>                <div class="rates" data-testid="rate">                    (.*?)                </div>@si', $value, $faiz);
            }
        }

        if (!empty($banka[1][0])) {
            $data[] = array(
                'id' => str_replace('/kredi/ihtiyac-kredisi/', '', $banka[1][0]),
                'banka' => html_entity_decode(explode("?", $banka[1][0])[0]),
                'kredi' => $kredi[1][0],
                'faiz' => trim(str_replace("%", '', $faiz[1][0])),
                'tahsis_ucreti' => trim(strip_tags($tahsis_ucreti[1][0])),
                'aylik_taksit' => strip_tags($aylik_taksit[1][0]),
                'toplam_odeme' => trim(strip_tags($toplam_odeme[1][0])),
            );
        }
    }

    foreach ($data as $key => $value) {
        if (strstr($value['kredi'], "<img")) {
            $value['kredi'] = "HangiKredi'" . trim(strip_tags($value['kredi']));
        } else {
            $value['kredi'] = strip_tags($value['kredi']);
        }

        $json_data['faiz'][$key] = explode(" ", $value['faiz'])[0];
        $json_data['banka'][$key] = $value['banka'];
        $json_data['kredi'][$key] = $value['kredi'];
        $json_data['tahsis_ucreti'][$key] = $value['tahsis_ucreti'];
        $json_data['aylik_taksit'][$key] = $value['aylik_taksit'];
        $json_data['toplam_odeme'][$key] = $value['toplam_odeme'];
        $json_data['id'][$key] = $value['id'];
    }

    return $json_data;
}
