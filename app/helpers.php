<?php

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
            $elements[$key]['data'] = $new[$key];
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

    $regionName = $finder->query("//*[contains(@class, 'list-link')]")->item(0);
    $regionName = explode(' ',$regionName->getElementsByTagName('a')->item(0)->nodeValue);
    $regionName = $regionName[0];

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
    }else{

        foreach ($link->getElementsByTagName('tr') as $key => $value) {
            $idElem = $value->getElementsByTagName('td');

            if($idElem->length > 0){
                $res1[$idElem->item(0)->nodeValue] = array_filter(explode(',',preg_replace('/\s+/', ',',  $idElem->item(1)->nodeValue)));
            }

        }
    }

        $res[]['data'] = $res1;

        if(isset($res1['Giải'])){
            $res[$i]['lottery_region'] = $regionName;
            $res[$i]['lottery_company'] = $res1['Giải'][5] ? $res1['Giải'][5] :'';
            $res[$i]['result_day_time'] = $res1['Giải'][6] ? $res1['Giải'][6] : '';
            unset($res[$i]['data']['Giải']);
        }

        $i++;
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

function checkList($region='XSMN'){
    $all = RegionCompany::where('lottery_region', $region)->get();
    return $all;
}
