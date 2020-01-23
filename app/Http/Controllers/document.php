public function test (Request $request){

        $duration = 10;
        // echo($request->method());
        if($request->method() == "POST"){
            $duration = ($request->time_duration)-1;
            $company = $request->companyName;
        }
        $date = Carbon::now()->format('Y-m-d');
        $currentDate = Carbon::createFromFormat("!Y-m-d",$date);
        // $exactDate = Carbon::createFromFormat("!Y-m-d",$date);
        $exactDate = Carbon::createFromFormat("!Y-m-d",$currentDate->subDay($duration)->format("Y-m-d"));
        // $count = Result::where('result_day_time' ,'<=', $exactDate)->count();
        // dd($currentDate->subDay($duration)->format("Y-m-d"));
        if($request->method() == "POST"){
            // dd($company);
            $results= Result::where('result_day_time' ,'>=', $exactDate )->orderBy('result_day_time', 'desc')->get();
        }else{
            $results= Result::where('result_day_time' ,'>=', $exactDate)->orderBy('result_day_time', 'desc')->get();
        }
        $resultsForCompany= Result::all();
        $companyName = [];
        foreach ($resultsForCompany as $name) {
            $companyName[] = $name->lottery_company;
        }
        $lot3Val = [];
        $finalLot3Val = [];
        $specialLot3Val = [];
        $finaSpeciallLot3Val = [];
        $digitNotApearInLot3 = [];
        foreach ($results as $printresult) {

            $newlot3Val = [];
            $finalValues = [];
            for ($it=1; $it< 10 ; $it++) {
                $t= "prize_{$it}";
                $fNewResult = json_decode($printresult->{$t});
                foreach ($fNewResult as $keyValues => $mainValue) {

                    if(is_array($mainValue)) {
                        $lot3Val[] = array_values((array) $mainValue);

                    } else if ($keyValues == 'Mã ĐB') {
                        $specialLot3Val[] = array_values((array) $mainValue);
                    }else if ($keyValues == 'G.DB') {
                        $specialLot3Val[] = array_values((array) $mainValue);
                    } else {
                        $lot3Val[] = array_values((array) $mainValue);
                    }
                }
            }
        }

        foreach ($lot3Val as $fullValue) {
            foreach ($fullValue as $mergeValue) {
                if(strlen($mergeValue)>2)
                {
                    array_push($finalLot3Val, substr($mergeValue, -3));
                }
            }
        }
        foreach ($specialLot3Val as $newSpecialFullValue) {
            foreach ($newSpecialFullValue as $mergeSpecialFullValue) {
                if(strlen($mergeSpecialFullValue)>2)
                {
                    array_push($finaSpeciallLot3Val, substr($mergeSpecialFullValue, -3));
                }
            }
        }
        for($i=100; $i<1000; $i++){
            // dd("xdfj");
            if(in_array($i,$finalLot3Val)) {
            }else{
                // dd($i);
                array_push($digitNotApearInLot3,$i);
            }
        }
        // dd($digitNotApearInLot3);
            // echo '<pre>', print_r($finaSpeciallLot3Val);
            // echo '<pre>', print_r(array_count_values($finalLot3Val));die;
        return view('lot3Statistics',['lot3' => array_count_values($finalLot3Val), 'special' => array_count_values($finaSpeciallLot3Val), 'companyName' => array_unique($companyName), 'digitNotApearInLot3' => $digitNotApearInLot3]);

    }