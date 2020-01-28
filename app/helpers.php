<?php

use App\NewsModel;
use Goutte\Client;
use App\Result;
use App\RegionCompany;



function crawlUrl($url=null){

    if($url == null){
        return "404";
    }
    $client = new Client();
    $crawler = $client->request('GET', $url);
    $elements = array();
    $elements = $crawler->filter('.class-title-list-link a:last-child')->each(function($node){
        $resultSplitVal = explode(' ',$node->text());

        $arrayName = str_replace(' ','',$node->text());

        $resultsArray['lottery_region'] = $resultSplitVal[0];
        $resultsArray['lottery_company'] = $resultSplitVal[0];
        $resultsArray['result_day_time'] = $resultSplitVal[1];
        return $resultsArray;
    });

    $links_count = $crawler->filter('table')->count();
    $all_links = [];
    if($links_count > 0){
        $links = $crawler->filter('table tr td');

        foreach ($links as $link) {
            $all_links[] = $link->textContent;
        }

        $newValues = [];
        $new = [];
        $list = 0;
        $i = 0;
        foreach ($all_links as $key=>$details) {

            $list++;
            if($key == 1 || $key == 39 || $key == 77 || $key == 115 || $key == 153 || $key == 191 || $key == 229) {
                $newValues[] = json_encode($details);
                //$arr =  explode(" ", $details);
                if(isset($newValues[0])){
                    $val = strval($newValues[0]);
                    $newValues[$all_links[$key-1]] = array_filter(explode(' ', $details));
                    unset($newValues[$key]);
                    unset($newValues[0]);
                }else{
                    $val = $key-1;
                    $newValues[$all_links[$val]] = array_filter(explode(' ', $details));
                    unset($newValues[$key]);
                    unset($newValues[$key-1]);
                }

            }
            if($key == 0 || $key == 38 || $key == 76 || $key == 114 || $key == 152 || $key == 189 || $key == 228) {
                $newValues[$details] = $details;
            }
            if($details=='G.DB' || $details == 'G.1' || $details == 'G.2' || $details == 'G.3' || $details == 'G.4' || $details == 'G.5' || $details == 'G.6' || $details == 'G.7') {

                $newValues[$details] = $details;
            }

            if($key == 3 || $key == 41 || $key == 79 || $key == 117 || $key == 155 || $key == 193 || $key == 231) {
                $first400 = array(substr($details, 0, 400));
                $newValues['G.DB'] = $first400[0];
            }

            if($key == 5 || $key == 43 || $key == 81 || $key == 119 || $key == 157 || $key == 195 || $key == 233 ) {
                $first400 = array(substr($details, 0, 400));
                $newValues['G.1'] = $first400[0];
            }

            if($key == 7 || $key == 9 || $key ==  45 || $key == 47 ||
                $key == 83  || $key == 85  || $key == 121  || $key == 123  || $key == 159
                || $key == 161 || $key == 197  || $key == 199  || $key == 235  || $key == 237
            ) {

                $mainValue = str_split($details, 5);
                if($key == 7 || $key == 45 || $key == 83 || $key == 121 || $key == 159 || $key == 197 || $key == 235) {
                    $newValues['G.2'] = $mainValue;
                } else {
                    $newValues['G.3'] = $mainValue;
                }
            }

            if($key == 11 || $key == 13 || $key == 49 || $key == 51
                || $key == 87 || $key == 89
                || $key == 125 || $key == 127
                || $key == 163 || $key == 165
                || $key == 201 || $key == 203
                || $key == 239 || $key == 241
            ) {
                $mainValue = str_split($details, 4);
                if($key == 11 || $key == 49 || $key == 87 || $key == 125 || $key == 163 || $key == 201 || $key == 239 ) {
                    $newValues['G.4'] = $mainValue;
                } else {
                    $newValues['G.5'] = $mainValue;
                }
            }

            if($key == 15 || $key == 53 || $key == 91 || $key == 129 || $key == 167 || $key == 205 || $key == 243) {
                $mainValue = str_split($details, 3);
                $newValues['G.6'] = $mainValue;
            }

            if($key == 17 || $key == 55 || $key == 93 || $key == 131 || $key == 169 || $key == 207 || $key == 245) {
                $mainValue = str_split($details, 2);
                $newValues['G.7'] = $mainValue;
            }

            //New details for one
            if($key == 19 || $key == 21 || $key == 23 || $key == 25 || $key == 27 || $key == 29
                || $key == 31 || $key == 33 || $key == 35 || $key == 37
                || $key == 57 || $key == 59 || $key == 61 || $key == 63 || $key == 65 || $key == 67  || $key == 69
                || $key == 71 || $key == 73 || $key == 75
                || $key == 95 || $key == 97 || $key == 99 || $key == 101 || $key == 103 || $key == 105 || $key == 107 || $key == 109 || $key == 111
                || $key == 113
                || $key == 133 || $key == 135 || $key == 137 || $key == 139 || $key == 141 || $key == 143 || $key == 145 || $key == 147 || $key == 149 || $key == 151

                || $key == 171 || $key == 173 || $key == 175 || $key == 177 || $key == 179 || $key == 181 || $key == 183 || $key == 185 || $key == 187 || $key == 189

                || $key == 209 || $key == 211 || $key == 213 || $key == 215 || $key == 217 || $key == 219 || $key == 221 || $key == 223 || $key == 225 || $key == 227

                || $key == 247 || $key == 249 || $key == 251 || $key == 253 || $key == 255 || $key == 257 || $key == 259 || $key == 261 || $key == 263 || $key == 265

            ) {

                if($key == 21 || $key == 97 || $key == 135 || $key == 173 || $key == 211 || $key == 249) {
                    $newValues['board']['first'] = $details;
                } else {
                    $newValues['board'][] = $details;
                }
            }


            if ($list == 38 || $list == 76 || $list == 114 || $list == 152 || $list == 190 || $list == 228 || $list == 270) {

                $new[] = $newValues;
                $newValues = [];
                //break;

            }

            $i++;
        }

        foreach ($elements as $key=>$rs){
            if(isset($elements[$key]) && isset($new[$key])){
                $elements[$key]['data'] = $new[$key];
            }

        }
    }
    return $elements;
}

function crawlUrlModified($url=null){

    $html = file_get_contents($url);
    $dom = new DOMDocument;

    @$dom->loadHTML($html);

    $links = $dom->getElementsByTagName('table');
    $finder = new DomXPath($dom);
    $date3 = '';
    $regionName = $finder->query("//*[contains(@class, 'list-link')]")->item(0);
    $date = $finder->query("//*[contains(@class, 'class-title-list-link')]")->item(0);

    $regionName = explode(' ',$regionName->getElementsByTagName('a')->item(0)->nodeValue);
    //echo $regionName;
    $regionName = $regionName[0];
    if(isset($regionName) && $regionName == 'XSMB'){

        $d = explode(' ',$date->getElementsByTagName('a')->item(2)->nodeValue);
        $date = $d[2];

      /*  $date2 = explode(' ',$date1->getElementsByTagName('a')->item(2)->nodeValue);
      $date3 = $date2[2];*/
    }


    $res = [];
    $i = 0;
    foreach ($links as $link){
        $res1 = [];
    if(stripos($link->getAttribute('class'),'table-loto') !== false){

        foreach ($link->getElementsByTagName('tr') as $key => $value) {
            $idElem = $value->getElementsByTagName('td');

            if($idElem->length > 0){
                $res[$i-1]['data']['board'][] = preg_replace('/\s+/', '',  $idElem->item(1)->nodeValue);
            }

        }
    }elseif(stripos($link->getAttribute('class'),'table-award') !== false){
        continue;
    }else{

        foreach ($link->getElementsByTagName('tr') as $key => $value) {
            $idElem = $value->getElementsByTagName('td');

            if($idElem->length > 0){

                $res1[$idElem->item(0)->nodeValue] = array_filter(explode(',',preg_replace('/\s+/', ',',  $idElem->item(1)->nodeValue)));
            }

        }
    }

        if(count($res1) > 0){
            $res[]['data'] = $res1;
            if(isset($res1['Giải'])){

                $res[$i]['lottery_region'] = $regionName;
                $res[$i]['lottery_company'] = $res1['Giải'][5] ? $res1['Giải'][5] : '';
                $res[$i]['result_day_time'] = $res1['Giải'][6] ? $res1['Giải'][6] : '';
                unset($res[$i]['data']['Giải']);

            }else{

                $res[$i]['lottery_region'] = $regionName;
                $res[$i]['lottery_company'] = $regionName;
                $res[$i]['result_day_time'] = $date;
            }

            $i++;
        }



    }

    return array_filter($res);
}

//New function added by us crawlUrlModifiedVitXoSoPower.....................................
function crawlUrlModifiedVitXoSoPower($url=null){

    $html = file_get_contents($url);
    $dom = new DOMDocument;
    @$dom->loadHTML($html);
    $links = $dom->getElementsByTagName('table');
    $finder = new DomXPath($dom);
    $date3 = '';

    $regionName = $finder->query("//*[contains(@class, 'list-link')]")->item(0);
    $blockmainheading = $finder->query("//*[contains(@class, 'block-main-heading')]")->item(0)->textContent;
    $date = $finder->query("//*[contains(@class, 'class-title-list-link')]");

    //$bb =  $finder->query("//*[contains(@class, 'text-black-bold')]")->item(0);
    $resultTitle =  $finder->query("//*[contains(@class, 'title-result-jackpot')]")->item(0)->nodeValue;
    // first
    $titleItem = $finder->query("//*[contains(@class, 'open-next')]")->item(0)->nodeValue;
    $titleItemValue =  $finder->query("//*[contains(@class, 'itle-prize')]")->item(0)->nodeValue;
    $jackpotResult =  $finder->query("//*[contains(@class, 'result-jackpot')]")->item(2)->nodeValue;
    // second
    $titleItemValue1 = $finder->query("//*[contains(@class, 'title-prize')]")->item(1)->nodeValue;
    $jackpotResult1 =  $finder->query("//*[contains(@class, 'result-jackpot')]")->item(3)->nodeValue;

    //working ...
    $itemForValues =  $finder->query("//*[contains(@class, 'para')]");
    $megadetail = $finder->query("//*[contains(@class, 'power-detail')]");

    if(isset($regionName)){
        $dateReturn = array();
        $regionName_first = array();
        $regionName_second = array();
        $regionName_third = array();
        foreach ($date as $key => $value) {

            if($value->getElementsByTagName('a')->item(2)) {
                $getDate = $value->getElementsByTagName('a')->item(2)->nodeValue;
            } else {
                $getDate = $value->getElementsByTagName('span')->item(2)->nodeValue;
            }

            $explodDate = explode(' ', $getDate);
            $explodDateFinal = end($explodDate);
            $dateReturn[] = $explodDateFinal;

            $regionName_first[] = $value->getElementsByTagName('a')->item(0)->nodeValue;
            $regionName_second[] = $value->getElementsByTagName('a')->item(1)->nodeValue;


            if($value->getElementsByTagName('a')->item(2)) {
                $regionName_third[] = $value->getElementsByTagName('a')->item(2)->nodeValue;
            } else {
                $regionName_third[] = $value->getElementsByTagName('span')->item(2)->nodeValue;
            }
        }

        $itemForValues_New = array();
        foreach ($itemForValues as $key => $value) {
            $itemForValues_New[] = $value->nodeValue;
        }

        // loping for changes........
        $megadetailValue = array();
        foreach ($megadetail as $key => $value) {
            $megadetailValue[] = $value->nodeValue ? array_filter(explode(',',preg_replace('/\s+/', ',',  $value->nodeValue))) : '';
        }
    }
    
    $res = [];
    $i = 0;
    foreach ($links as $link){
        $res1 = [];
        if(stripos($link->getAttribute('class'),'table-sign') !== false){
            foreach ($link->getElementsByTagName('tr') as $key => $value) {
                $idElem = $value->getElementsByTagName('td');

                if($idElem->length > 0){
                    if($idElem->item(1)){
                        $res[$i-1]['data']['board'][] = preg_replace('/\s+/', '',  $idElem->item(1)->textContent); //preg_replace('/\s+/', '',  $idElem->item(1)->nodeValue);
                    }
                    if($idElem->item(3)){
                        $res[$i-1]['data']['board'][] = preg_replace('/\s+/', '',  $idElem->item(3)->textContent); //preg_replace('/\s+/', '',  $idElem->item(1)->nodeValue);
                    }
                }
            }
        } elseif(stripos($link->getAttribute('class'),'table-award') !== false){
            continue;
        } else {
            foreach ($link->getElementsByTagName('tr') as $key => $value) {
                $idElem = $value->getElementsByTagName('td');
                if($idElem->length > 0){
                    if($idElem->item(2)){
                        $res1[$idElem->item(0)->nodeValue][] = $idElem->item(2)->textContent;
                        $res1[$idElem->item(0)->nodeValue][] = $idElem->item(3)->textContent;
                    }
                }
            }
        }
            
        if(count($res1) > 0){
                $res[]['data'] = $res1;
                if(isset($dateReturn[$i])){
                    $res[$i]['result_day_time'] = $dateReturn[$i] ? $dateReturn[$i] : '';
                }
                if(isset($regionName_first[$i])){
                    $res[$i]['lottery_company'] = $regionName_first[$i];
                }
                if(isset($regionName_second[$i])){
                    $res[$i]['lottery_region'] = 'Vietlott';
                }
                if(isset($itemForValues_New[$i])){
                    $res[$i]['main'] = $itemForValues_New[$i];
                }
                $res[0]['resultTitle'] = $resultTitle;

                $res[0]['jackpotResult'][$titleItemValue] = $jackpotResult;
                $res[0]['jackpotResult'][$titleItemValue1] = $jackpotResult1;

                $res[0]['titleItem'] = $titleItem;
                if(isset($dateReturn[$i])){
                    $res[$i]['mega-detail'] = $megadetailValue[$i] ? $megadetailValue[$i] : '';
                }               
            $i++;
        }
    }
    return array_filter($res);
}


function crawlUrlModifiedVitXoSoMega($url=null){

    $html = file_get_contents($url);
    $dom = new DOMDocument;

    @$dom->loadHTML($html);

    $links = $dom->getElementsByTagName('table');
    $finder = new DomXPath($dom);
    $date3 = '';

    $regionName = $finder->query("//*[contains(@class, 'list-link')]")->item(0);
    $blockmainheading = $finder->query("//*[contains(@class, 'block-main-heading')]")->item(0)->textContent;
    $date = $finder->query("//*[contains(@class, 'class-title-list-link')]");

    $resultTitle =  $finder->query("//*[contains(@class, 'title-result-jackpot')]")->item(0)->nodeValue;
    $jackpotResult =  $finder->query("//*[contains(@class, 'result-jackpot')]")->item(2)->nodeValue;
    $titleItem = $finder->query("//*[contains(@class, 'open-next')]")->item(0)->nodeValue;

    //working ...
    $itemForValues =  $finder->query("//*[contains(@class, 'para')]");
    $megadetail = $finder->query("//*[contains(@class, 'mega-detail')]");

    if(isset($regionName)){
        $dateReturn = array();
        $regionName_first = array();
        $regionName_second = array();
        $regionName_third = array();
        foreach ($date as $key => $value) {

            if($value->getElementsByTagName('a')->item(2)) {
                $getDate = $value->getElementsByTagName('a')->item(2)->nodeValue;
            } else {
                $getDate = $value->getElementsByTagName('span')->item(2)->nodeValue;
            }

            $explodDate = explode(' ', $getDate);
            $explodDateFinal = end($explodDate);
            $dateReturn[] = $explodDateFinal;

            $regionName_first[] = $value->getElementsByTagName('a')->item(0)->nodeValue;
            $regionName_second[] = $value->getElementsByTagName('a')->item(1)->nodeValue;


            if($value->getElementsByTagName('a')->item(2)) {
                $regionName_third[] = $value->getElementsByTagName('a')->item(2)->nodeValue;
            } else {
                $regionName_third[] = $value->getElementsByTagName('span')->item(2)->nodeValue;
            }
        }

        $itemForValues_New = array();
        foreach ($itemForValues as $key => $value) {
            $itemForValues_New[] = $value->nodeValue;
        }

        $megadetailValue = array();
        foreach ($megadetail as $key => $value) {
            $megadetailValue[] = $value->nodeValue ? array_filter(explode(',',preg_replace('/\s+/', ',',  $value->nodeValue))) : ''; //$value->nodeValue;
        }
    }
    
    $res = [];
    $i = 0;
    foreach ($links as $link){
        $res1 = [];
        if(stripos($link->getAttribute('class'),'table-sign') !== false){
            foreach ($link->getElementsByTagName('tr') as $key => $value) {
                $idElem = $value->getElementsByTagName('td');

                if($idElem->length > 0){
                    if($idElem->item(1)){
                        $res[$i-1]['data']['board'][] = preg_replace('/\s+/', '',  $idElem->item(1)->textContent); //preg_replace('/\s+/', '',  $idElem->item(1)->nodeValue);
                    }
                    if($idElem->item(3)){
                        $res[$i-1]['data']['board'][] = preg_replace('/\s+/', '',  $idElem->item(3)->textContent); //preg_replace('/\s+/', '',  $idElem->item(1)->nodeValue);
                    }
                }
            }
        } elseif(stripos($link->getAttribute('class'),'table-award') !== false){
            continue;
        } else {
            foreach ($link->getElementsByTagName('tr') as $key => $value) {
                $idElem = $value->getElementsByTagName('td');
                if($idElem->length > 0){
                    if($idElem->item(1)){
                        //$res1[$idElem->item(0)->nodeValue][] = $idElem->item(1)->textContent;
                        $res1[$idElem->item(0)->nodeValue][] = $idElem->item(2)->textContent;
                        $res1[$idElem->item(0)->nodeValue][] = $idElem->item(3)->textContent;
                    }
                }
            }
        }
            
        if(count($res1) > 0){
                $res[]['data'] = $res1;
                if(isset($dateReturn[$i])){
                    $res[$i]['result_day_time'] = $dateReturn[$i] ? $dateReturn[$i] : '';
                }
                if(isset($regionName_first[$i])){
                    $res[$i]['lottery_company'] = $regionName_first[$i];
                }
                if(isset($regionName_second[$i])){
                    $res[$i]['lottery_region'] = 'Vietlott';
                }
                if(isset($itemForValues_New[$i])){
                    $res[$i]['data']['main'] = $itemForValues_New[$i+1];
                }
                $res[$i]['data']['resultTitle'] = $resultTitle;
                $res[$i]['data']['jackpotResult'] = $jackpotResult;
                $res[$i]['data']['titleItem'] = $titleItem;
                if(isset($dateReturn[$i])){
                    $res[$i]['data']['board'] = $megadetailValue[$i] ? $megadetailValue[$i] : '';
                }               
            $i++;
        }
    }
    return array_filter($res);
}

// function for tow tabs crawlUrlModifiedVit................
function crawlUrlModifiedVit($url=null){

    $html = file_get_contents($url);
    $dom = new DOMDocument;
    @$dom->loadHTML($html);

    $links = $dom->getElementsByTagName('table');
    $finder = new DomXPath($dom);
    $date3 = '';

    $regionName = $finder->query("//*[contains(@class, 'list-link')]")->item(0);
    $blockmainheading = $finder->query("//*[contains(@class, 'block-main-heading')]")->item(0)->textContent;
    $date = $finder->query("//*[contains(@class, 'class-title-list-link')]");

    if(isset($regionName)){
        $dateReturn = array();
        $regionName_first = array();
        $regionName_second = array();
        $regionName_third = array();
        foreach ($date as $key => $value) {

            if($value->getElementsByTagName('a')->item(2)) {
                $getDate = $value->getElementsByTagName('a')->item(2)->nodeValue;
            } else {
                $getDate = $value->getElementsByTagName('span')->item(2)->nodeValue;
            }

            $explodDate = explode(' ', $getDate);
            $explodDateFinal = end($explodDate);
            $dateReturn[] = $explodDateFinal;

            $regionName_first[] = $value->getElementsByTagName('a')->item(0)->nodeValue;
            $regionName_second[] = $value->getElementsByTagName('a')->item(1)->nodeValue;


            if($value->getElementsByTagName('a')->item(2)) {
                $regionName_third[] = $value->getElementsByTagName('a')->item(2)->nodeValue;
            } else {
                $regionName_third[] = $value->getElementsByTagName('span')->item(2)->nodeValue;
            }

        }
    }

    $res = [];
    $i = 0;
    foreach ($links as $link){
        $res1 = [];
        if(stripos($link->getAttribute('class'),'table-sign') !== false){
            foreach ($link->getElementsByTagName('tr') as $key => $value) {
                $idElem = $value->getElementsByTagName('td');

                if($idElem->length > 0){
                    if($idElem->item(1)){
                        $res[$i-1]['data']['board'][] =  preg_replace('/\s+/', '',  $idElem->item(1)->textContent);
                    }
                    if($idElem->item(3)){
                        $res[$i-1]['data']['board'][] =  preg_replace('/\s+/', '',  $idElem->item(3)->textContent);
                    }
                }
            }
        } elseif(stripos($link->getAttribute('class'),'table-award') !== false){
            continue;
        } else {
            foreach ($link->getElementsByTagName('tr') as $key => $value) {
                $idElem = $value->getElementsByTagName('td');

                if($idElem->length > 0){
                    //echo "<pre>";
                    //print_r($idElem->item(0)->nodeValue);
                    if($idElem->item(1)){
                        $res1[$idElem->item(0)->nodeValue] = $idElem->item(1)->nodeValue ? array_filter(explode(',',preg_replace('/\s+/', ',',  $idElem->item(1)->nodeValue))) : '';
                    }
                }
            }
        }
        if(count($res1) > 0){
               $res[]['data'] = $res1;
               if(isset($dateReturn[$i])){
                    $res[$i]['result_day_time'] = $dateReturn[$i] ? $dateReturn[$i] : '';
                }
                if(isset($regionName_first[$i])){
                    $res[$i]['lottery_company'] = $regionName_first[$i];
                }
                if(isset($regionName_second[$i])){
                    $res[$i]['lottery_region'] = 'Vietlott';
                }
            $i++;
        }
    }
    return array_filter($res);
}

function getRegionsCompany(){

    $html = file_get_contents('https://xosodaiphat.com/xsmn-xo-so-mien-nam.html');
    $dom = new DOMDocument;

    @$dom->loadHTML($html);

    $finder = new DomXPath($dom);
    $companyRegion = array();
    $regionName = $finder->query("//*[contains(@class, 'table-xsmn')]");
    $t = 0;
    foreach ($regionName as $res){
        $regionName1 = $res->getElementsByTagName('th');

        foreach ($regionName1 as $res1){
            $gf = $res1->getElementsByTagName('a');

            foreach ($gf as $rf){
                 $name = explode('-', $rf->getAttribute('href') );
                $companyRegion[$t]['name'] = $rf->nodeValue;
                $companyRegion[$t]['url'] = $rf->getAttribute('href');
                $companyRegion[$t]['code'] = strtoupper(str_replace('/','',current($name)));

                $t++;
            }


        }

    }
    return $companyRegion;


}

function getRegionsCompanyVitlot(){

    $html = file_get_contents('https://xosodaiphat.com/xo-so-vietlott');
    $dom = new DOMDocument;

    @$dom->loadHTML($html);

    $finder = new DomXPath($dom);
    $companyRegion = array();
    $regionName = $finder->query("//*[contains(@class, 'block-main-heading')]");
    $t = 0;
    foreach ($regionName as $res){
        $regionName1 = $res->getElementsByTagName('h2');

        foreach ($regionName1 as $res1){
            $gf = $res1->getElementsByTagName('a');

            foreach ($gf as $rf){ 
                 $name = explode('-', $rf->getAttribute('href') );
                $companyRegion[$t]['name'] = strtoupper(str_replace('/','',str_replace('Xổ Số ','',$rf->nodeValue)));
                $companyRegion[$t]['url'] = $rf->getAttribute('href');
                $companyRegion[$t]['code'] = strtoupper(str_replace('/','',str_replace('Xổ Số ','',$rf->nodeValue)));
                $companyRegion[$t]['lottery_company'] = strtoupper(str_replace('/','',str_replace('Xổ Số ','',$rf->nodeValue)));
                $companyRegion[$t]['lottery_region'] = 'Vietlott';

                $t++;
            }


        }

    }
    return $companyRegion;


}

function checkList($region='XSMN'){
    $all = RegionCompany::where('lottery_region', $region)->get();
    return $all;
}

function getCompanyName($code=''){
    $all = RegionCompany::where('lottery_company', $code)->get();
    if($all->count() > 0) {
        return collect($all)->first()->lottery_company_names;
    }
}

function getCompanyUrl($code=''){

      if(strtoupper($code) == 'XSMB' || strtoupper($code) == 'XSMT' || strtoupper($code) == 'XSMN'){
       return '/'.$code;
    }else{
        $all = RegionCompany::where('lottery_company', $code)->get();
        if($all->count() > 0){
            return collect($all)->first()->lottery_company_url;
        }
    }
}

function getCompanyUrlHead($code=''){

      if(strtoupper($code) == 'XSMB' || strtoupper($code) == 'XSMT' || strtoupper($code) == 'XSMN'){
       return '/'.$code;
    }else{
          $code = str_replace('kqxsmn-','',$code);
          $code = str_replace('kqxsmb-','',$code);
          $code = str_replace('kqxsmt-','',$code);
        $all = RegionCompany::where('lottery_company_slug', $code)->get();
        if($all->count() > 0){
            return collect($all)->first()->lottery_company_url;
        }
    }
}

function getCompanyCode($slug){

    if(strtoupper($slug) == 'XSMB' || strtoupper($slug) == 'XSMT' || strtoupper($slug) == 'XSMN'){
        return '/'.$code;
    }else{
        $all = RegionCompany::where('lottery_company_slug', $slug)->get();
        if($all->count() > 0){
            return collect($all)->first()->lottery_company;
        }

    }
}

function getCompanySlug($code){

    if(strtoupper($code) == 'XSMB' || strtoupper($code) == 'XSMT' || strtoupper($code) == 'XSMN'){
        return '/'.$code;
    }else{
        $all = RegionCompany::where('lottery_company', $code)->get();
        if($all->count() > 0){
            return collect($all)->first()->lottery_company_slug;
        }

    }
}

function dayWiseArray($day='all'){
    $bindArray = array();
    $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
    $bindArray = arrayDayBind();
    return $bindArray[$bindArrayDay[$day]];
}

function dayWiseVietlottArray($day='all'){
    $bindArray = array();
    $bindArrayDay = array('power-655'=>'Power 6/55','mega-645'=>'XS Mega', 'pmax-4d'=>'XS Max 4D','xo-so-max-3d'=>'XS Max 3D');
    return $bindArrayDay;
}

function dayWiseVietlottValue($day){
    $bindArray = array();
    $bindArrayDay = array('power-655'=>'Power 6/55','mega-645'=>'XS Mega', 'max-4d'=>'XS Max 4D','xo-so-max-3d'=>'XS Max 3D');
    return array($bindArrayDay[$day]);
}


function getDayofCompany($companyCode){
    $data = arrayDayBind();
    $arrayDay = array();
    foreach ($data as $k=>$val){
        if(array_search($companyCode,$val)){
            $arrayDay[] = $k;
        }
    }
    return $arrayDay;
}

function arrayDayBind(){
    $bindArray = array();

    $result  = RegionCompany::all();
    foreach ($result as $d){
        if(in_array($d->lottery_company,array('XSKG','XSTG','XSDL','XSKT','XSKH'))){
            $bindArray['Sunday']  = array('XSKG','XSTG','XSDL','XSKT','XSKH','XSMB');
        }elseif (in_array($d->lottery_company,array('XSLA','XSHCM','XSBP','XSHG','XSQNG','XSDNA','XSDNO'))){
            $bindArray['Saturday']  = array('XSLA','XSHCM','XSBP','XSHG','XSQNG','XSDNA','XSDNO','XSMB');
        }elseif (in_array($d->lottery_company,array('XSVL','XSBD','XSTV','XSNT','XSGL'))){
            $bindArray['Friday']  = array('XSVL','XSBD','XSTV','XSNT','XSGL','XSMB');
        }elseif (in_array($d->lottery_company,array('XSAG','XSTN','XSQB','XSBTH','XSBDI','XSQT'))){
            $bindArray['Thursday']  = array('XSAG','XSTN','XSQB','XSBTH','XSBDI','XSQT','XSMB');
        }elseif (in_array($d->lottery_company,array('XSDN','XSST','XSCT','XSKH','XSDNA'))){
            $bindArray['Wednesday']  = array('XSDN','XSST','XSCT','XSKH','XSDNA','XSMB');
        }elseif (in_array($d->lottery_company,array('XSVT','XSBTR','XSBL','XSDLK','XSQNA'))){
            $bindArray['Tuesday']  = array('XSVT','XSBTR','XSBL','XSDLK','XSQNA','XSMB');
        }elseif (in_array($d->lottery_company,array('XSTTH','XSPY','XSDT','XSHCM','XSCM'))){
            $bindArray['Monday']  = array('XSTTH','XSPY','XSDT','XSHCM','XSCM','XSMB');
        }
    }
    return $bindArray;
}

function seoUrl($string)
{
    $string = stripVN($string);
    // Remove HTML Tags if found
    $string=strip_tags($string);
    // Replace special characters with white space
   // $string=preg_replace('/[^A-Za-z0-9-]+/', ' ', $string);
    // Trim White Spaces and both sides
    $string=trim($string);
    header('Content-Type: text/html; charset=utf-8');
    $string =  utf8_encode($string);
    // Replace whitespaces with Hyphen (-)
    $string=preg_replace('/[^A-Za-z0-9-]+/','-', $string);
    // Conver final string to lowercase
    $slug=strtolower($string);
    return $slug;
}

function stripVN($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);

    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
}


function getTodayResultCompany(){

    $mytime = Carbon\Carbon::now();
    $dayName = $mytime->toDateTime()->format('l');
    $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
    $key = array_search($dayName,$bindArrayDay);
    $list = dayWiseArray($key);
    $all = RegionCompany::whereIn('lottery_company', $list)->get();
    return $all;

}

function getTodayResultCompanyRegion($region){

    $mytime = Carbon\Carbon::now();
    $dayName = $mytime->toDateTime()->format('l');
    $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
    $key = array_search($dayName,$bindArrayDay);
    $list = dayWiseArray($key);
    $all = RegionCompany::where('lottery_region',$region)->whereIn('lottery_company', $list)->get();
    return $all;

}

function getDaySlug($dayName){
$bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
return array_search($dayName,$bindArrayDay);
}
function getRegionSlug($code){
    $reg = array('XSMN'=>'ket-qua-xsmn','XSMT'=>'ket-qua-xsmt','XSMB'=>'ket-qua-xsmb', 'Vietlott'=>'ket-qua-xsmb');
    return $reg[$code];
}

function getRegionLotoSlug($code){
    $reg = array('XSMN'=>'ket-qua-lo-to-mien-nam','XSMT'=>'ket-qua-lo-to-mien-trung','XSMB'=>'ket-qua-lo-to-mien-bac', 'Vietlott'=>'ket-qua-xsmb');
    return $reg[$code];
}

function engToVit($day){
    $bindVitDay = array('Monday'=>'Thứ hai','Tuesday'=>'Thứ ba','Wednesday'=>'Thứ tư','Thursday'=>'Thứ năm','Friday'=>'Thứ sáu','Saturday'=>'Thứ bảy','Sunday'=>'Chủ Nhật');
    return $bindVitDay[$day];
}

function metaData($key='home'){
    $metaData = array();
    $keyup = Request::path();
    $path = explode('/',$keyup);
    $mainPage = current($path);
    $mainPage2 = current($path);
    $path = end($path);
    $region = current(explode('-',$path));
    $region = str_replace('kq','',$region);
    if($region){
        $region = strtoupper($region);
    }else{
        $region = 'KQXS';
    }
    $path = str_replace('kqxsmb-','',$path);
    $path = str_replace('kqxsmn-','',$path);
    $path = str_replace('kqxsmt-','',$path);
    if(Request::is('/')) {
        $key = 'home';
    }

    if($mainPage == 'ket-qua-xsmb'){
        $mainPage = 'Xổ Số Miền Bắc';
    }elseif($mainPage == 'ket-qua-xsmt'){
        $mainPage = 'Xổ Số Miền Trung';
    }elseif($mainPage == 'ket-qua-xsmn'){
        $mainPage = 'Xổ Số Miền Nam';
    }elseif($mainPage == 'tin-xo-so'){

        // $key = $mainPage;
        $mainPage == 'Tin tức';
    }else{
        $mainPage = 'Xổ Số 3 Miền';
    }

    $key = $path;
    $d = new Carbon\Carbon();
    if(strpos($key,'qxs-') > 0 ){
        $date = str_replace('kqxs-','',$key);
        $date =  $d::parse(strtotime($date))->format('d/m/Y');
        $date2 = $d::parse(strtotime($date))->format('d/m');
        $key = 'date';
    }else{
        $date = $d::today()->format('!d/m/Y');
        $date2 = $d::today()->format('!d/m');
    }

    if($key == 'truc-tiep'){
        $key = strtolower($region).'-'.$key;
    }

    $all = RegionCompany::where('lottery_company_slug', $key)->get();
    if($all->count() > 0){
        $data = $all->toArray();
        if(count($data) > 0 ){
            $data = $data[0];
        }
       $company = $data['lottery_company_names'];
        $companyCode =  $data['lottery_company'];
        $key = 'single';
    }else{
        $company = '';
        $companyCode =  '';
    }

    $days = getDayofCompany($companyCode);
    if(count($days) > 0 && is_array($days)){
        $days1 = engToVit(current($days));
        $days2 = engToVit(end($days));
    }else{
        $days1 = '';
        $days2 = '';
    }

    if($mainPage2 == 'tin-xo-so' && $key == 'tin-xo-so'){
        $key = 'news';
        $metaData['news']['title'] = 'Tin tức xổ số - Tin xổ số hôm nay';
        $metaData['news']['keywords'] = 'tin tuc xo so, tin tuc xo so hom nay, tin xổ số, tin tức xổ số hôm nay'; ;
        $metaData['news']['description'] = 'Tin Tức Về Xổ Số - Cập Nhật Thông Tin Về KQXS Mới Nhất Mỗi Ngày - Tổng hợp tin về xổ số kiến thiết, tin hot nhất tại cổng thông tin của '.url('/');
    }elseif($mainPage2 == 'tin-xo-so' && $key != 'tin-xo-so'){

        $newsMeta = getNewsbySlug($key);
        $key = 'news-single';
        $metaData['news-single']['title'] = $newsMeta->meta_title;
        $metaData['news-single']['keywords'] = $newsMeta->meta_keywords;
        $metaData['news-single']['description'] = $newsMeta->meta_description;
    }

    $metaData['home']['title'] = 'KQXS - Kết Quả Xổ Số 3 Miền Hôm Nay - Tường thuật trực tiếp kqxs';
    $metaData['home']['keywords'] = 'kqxs, xo so, ket qua xo so, xoso, xskt, kết quả xổ số, xo so hom nay, xo so truc tiep';
    $metaData['home']['description'] = 'KQXS - Xo So - Tường thuật kết quả xổ số hôm nay trực tiếp từ trường quay, nhanh chóng, chính xác cho cả 3 miền Bắc, Trung, Nam và XS Mega. XSKT, Dự đoán xổ số, Soi cầu hàng ngày.';


    $metaData['single']['title'] = "$companyCode - Xo So $company - Kết Quả Xổ Số $company";
    $metaData['single']['keywords'] = "$companyCode,Xo So $company,S$companyCode,KQ$companyCode,Kết Quả Xổ Số $companyCode";
    $metaData['single']['description'] = "$companyCode - $companyCode - Xo So $company - Cập nhật kết quả xổ số $company trực tiếp nhanh chóng, chính xác. KQ$companyCode, xổ số TP.HCM, $companyCode hom nay";

    $metaData['date']['title'] = "KQXS - Kết Quả Xổ Số 3 Miền Ngày $date";
    $metaData['date']['keywords'] = "kqxs, xo so, ket qua xo so, xoso, xskt, kết quả xổ số, xo so hom nay, xo so truc tiep,kqxs ngày $date2";
    $metaData['date']['description'] = 'KQXS - Xo So - Tường thuật kết quả xổ số hôm nay trực tiếp từ trường quay, nhanh chóng, chính xác cho cả 3 miền Bắc, Trung, Nam và XS Mega. XSKT, Dự đoán xổ số, Soi cầu hàng ngày.';

    $metaData['xsmn-truc-tiep']['title'] = "XSMN Trực Tiếp - Trực Tiếp Xổ Số Miền Nam Hôm Nay Nhanh, Chính Xác";
    $metaData['xsmn-truc-tiep']['keywords'] = "xsmn, xo so mien nam, sxmn, xổ số miền nam, xs mn, xs mien nam, xosomien nam, xo so truc tiep mien nam, xsmn hom nay";
    $metaData['xsmn-truc-tiep']['description'] = "XSMN Trực Tiếp - Trực tiếp xổ số miền Nam hôm nay nhanh, chính xác nhất. KQXS miền Nam được tường thuật trực tiếp lúc 16h10 hàng ngày - truc tiep xsmn";


    $metaData['xsmb-truc-tiep']['title'] = "XSMB Trực Tiếp - Trực Tiếp Xổ Số Miền Bắc Hôm Nay Nhanh, Chính Xác";
    $metaData['xsmb-truc-tiep']['keywords'] = "xsmb truc tiep, truc tiep xsmb, truc tiep xo so mien bac, xo so truc tiep mien bac, xo so mien bac truc tiep, xsmb truc tiep hom nay";
    $metaData['xsmb-truc-tiep']['description'] = "XSMB Trực Tiếp - Trực tiếp xổ số miền Bắc hôm nay nhanh, chính xác nhất. KQXS miền Nam được tường thuật trực tiếp lúc 18h15 hàng ngày - truc tiep xsmb";


    $metaData['xsmt-truc-tiep']['title'] = "XSMT Trực Tiếp - Trực Tiếp Xổ Số Miền Trung Hôm Nay Nhanh, Chính Xác";
    $metaData['xsmt-truc-tiep']['keywords'] = "xsmt truc tiep, xo so mien trung truc tiep, xo so truc tiep mien trung, truc tiep xsmt, xo so mien trung hom nay truc tiep";
    $metaData['xsmt-truc-tiep']['description'] = "XSMT Trực Tiếp - Trực tiếp xổ số miền Trung nhanh chóng, chính xác nhất. KQXSMT được tường thuật trực tiếp lúc 17h15 hàng ngày - xo so mien trung truc tiep";

    $metaData['ket-qua-xsmn']['title'] = 'XSMN - Kết Quả Xổ Số Miền Nam Hôm Nay - KQXSMN';
    $metaData['ket-qua-xsmn']['keywords'] = 'xsmn, xo so mien nam, sxmn, xổ số miền nam, xs mn, xs mien nam, xosomien nam, xo so truc tiep mien nam, xsmn hom nay';
    $metaData['ket-qua-xsmn']['description'] = 'XSMN - Xổ Số Miền Nam được cập nhật trực tiếp lúc 16h10 hàng ngày nhanh chóng, chính xác. SXMN, ket qua xo so mien nam, xs mien nam, xsmn hom nay, XSMN';

    $metaData['ket-qua-xsmb']['title'] = 'XSMB - Kết Quả Xổ Số Miền Bắc Hôm Nay - KQXSMB';
    $metaData['ket-qua-xsmb']['keywords'] = 'xsmb, sxmb, kqxsmb, xstd, xổ số miền bắc, ket qua xsmb, xo so mien bac, xsmb hom nay, kết quả xổ số miền bắc';
    $metaData['ket-qua-xsmb']['description'] = 'XSMB - Kết quả xổ số miền Bắc hôm nay - KQXSMB - Tường thuật trực tiếp lúc 18h15 hàng ngày nhanh chóng, chính xác, cập nhật liên tục.';

    $metaData['ket-qua-xsmt']['title'] = 'XSMT - Kết Quả Xổ Số Miền Trung Hôm Nay - KQXSMT';
    $metaData['ket-qua-xsmt']['keywords'] = 'xsmt, sxmt, xs mien trung, xổ số miền trung, xo so mien trung hom nay, kqxs mien trung';
    $metaData['ket-qua-xsmt']['description'] = 'XSMT - SXMT - Kết quả xổ số miền Trung được cập nhật trực tiếp lúc 17h15 hàng ngày nhanh chóng, chính xác. XS Mien Trung, Xo so mien Trung hom nay.';

    $metaData['thu-hai']['title'] = "$region Thứ hai - Kết Quả $mainPage Thứ hai Hàng Tuần - KQ$region Thứ hai";
    $metaData['thu-hai']['keywords'] = "$region Thứ hai, $region Thứ hai Hang Tuan, $region Thứ hai, KQ$region Thứ hai";
    $metaData['thu-hai']['description'] = "$region Thứ hai - Kết quả $mainPage Thứ hai hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    $metaData['thu-ba']['title'] = "$region Thứ ba - Kết Quả $mainPage Thứ ba Hàng Tuần - KQ$region Thứ ba";
    $metaData['thu-ba']['keywords'] = "$region Thứ ba, $region Thứ ba Hang Tuan, $region Thứ ba, KQ$region Thứ ba";
    $metaData['thu-ba']['description'] = "$region Thứ ba - Kết quả $mainPage Thứ ba hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    $metaData['thu-tu']['title'] = "$region Thứ tư - Kết Quả $mainPage Thứ tư Hàng Tuần - KQ$region Thứ tư";
    $metaData['thu-tu']['keywords'] = "$region Thứ tư, $region Thứ tư Hang Tuan, $region Thứ tư, KQ$region Thứ tư";
    $metaData['thu-tu']['description'] = "$region Thứ tư - Kết quả $mainPage Thứ tư hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    $metaData['thu-nam']['title'] = "$region Thứ năm - Kết Quả $mainPage Thứ năm Hàng Tuần - KQ$region Thứ năm";
    $metaData['thu-nam']['keywords'] = "$region Thứ năm, $region Thứ năm Hang Tuan, $region Thứ năm, KQ$region Thứ năm";
    $metaData['thu-nam']['description'] = "$region Thứ năm - Kết quả $mainPage Thứ năm hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    $metaData['thu-sau']['title'] = "$region Thứ sáu - Kết Quả $mainPage Thứ sáu Hàng Tuần - KQ$region Thứ sáu";
    $metaData['thu-sau']['keywords'] = "$region Thứ sáu, $region Thứ sáu Hang Tuan, $region Thu 2, KQ$region Thứ sáu";
    $metaData['thu-sau']['description'] = "$region Thứ sáu - Kết quả $mainPage Thứ sáu hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    $metaData['thu-bay']['title'] = "$region Thứ bảy - Kết Quả $mainPage Thứ bảy Hàng Tuần - KQ$region Thứ ba";
    $metaData['thu-bay']['keywords'] = "$region Thứ bảy, $region Thu 2 Hang Tuan, $region Thứ bảy, KQ$region Thứ bả";
    $metaData['thu-bay']['description'] = "$region Thứ bảy - Kết quả $mainPage Thứ bảy hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    $metaData['chu-nhat']['title'] = "$region Chủ Nhật - Kết Quả $mainPage Chủ Nhật Hàng Tuần - KQ$region Chủ Nhật";
    $metaData['chu-nhat']['keywords'] = "$region Chủ Nhật, $region Thu 2 Hang Tuan, $region Chủ Nhật, KQ$region Chủ Nhật";
    $metaData['chu-nhat']['description'] = "$region Chủ Nhật - Kết quả $mainPage Chủ Nhật hàng tuần được tường thuật trực tiếp lúc 16h15 hàng ngày";

    if(key_exists($key,$metaData)){
        return $metaData[$key];
    }else{
        return $metaData['home'];
    }


}

function getNewsbySlug($slug){
    $result = NewsModel::where('news_slug',$slug)->get();
    return collect($result)->first();
}
