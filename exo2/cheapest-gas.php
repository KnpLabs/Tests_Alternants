<?php

// using cURL to create the script
$apiUrl = 'https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/exports/json?select=region%2C%20ville%2C%20cp%2C%20adresse%2C%20sp95_prix%2C%20sp98_prix%2C%20gazole_prix&limit=-1&timezone=UTC&use_labels=false&epsg=4326';

// initialize the cURL session
$ch = curl_init($apiUrl);

// return the value a string instead of directly terminal
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// bypass certificate
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


$response = curl_exec($ch);

curl_close($ch);

// store the response in $data
$data = json_decode($response,true);

// empty array to store the datas needed
$regionsData = []; 

foreach ($data as $station) {
    // store all the necessary data in variables
    $region = $station['region'];
    $gazolePrice = $station['gazole_prix'];
    $sp95Price = $station['sp95_prix'];
    $sp98Price = $station['sp98_prix'];

    print_r($region);
    // insert the region if not already done in the array
    if (!isset($regionsData[$region])) {
        $regionsData[$region] = [
            'gazole' => null,
            'sp95' => null,
            'sp98' => null,
        ];
    }

    // if price is not empty & if no station already exists for this region --- if a station is found check if the current price is lower than the previous one
    if (!empty($gazolePrice) && (!$regionsData[$region]['gazole'] || $gazolePrice < $regionsData[$region]['gazole']['gazole_prix'])) {
        // store the current station data if either one of the 2 conditions is true
        $regionsData[$region]['gazole'] = $station;
    }

    if (!empty($sp95Price) && (!$regionsData[$region]['sp95'] || $sp95Price < $regionsData[$region]['sp95']['sp95_prix'])) {
        $regionsData[$region]['sp95'] = $station;
    }

    if (!empty($sp98Price) && (!$regionsData[$region]['sp98'] || $sp98Price < $regionsData[$region]['sp98']['sp98_prix'])) {
        $regionsData[$region]['sp98'] = $station;
    }
    
}
print_r($regionsData);

// remove last index (only 13 regions in France)
array_pop($regionsData);

// display the results as recommended
foreach ($regionsData as $region => $fuels) {
    echo "$region :\n";
    
    if ($fuels['sp95']) {
        echo "  SP95 : " . number_format($fuels['sp95']['sp95_prix'], 2) . "€ / " 
             . $fuels['sp95']['adresse'] . " " . $fuels['sp95']['cp'] . " " . $fuels['sp95']['ville'] . "\n";
    }

    if ($fuels['sp98']) {
        echo "  SP98 : " . number_format($fuels['sp98']['sp98_prix'], 2) . "€ / " 
             . $fuels['sp98']['adresse'] . " " . $fuels['sp98']['cp'] . " " . $fuels['sp98']['ville'] . "\n";
    }

    if ($fuels['gazole']) {
        echo "  Gazole: " . number_format($fuels['gazole']['gazole_prix'], 2) . "€ / " 
             . $fuels['gazole']['adresse'] . " " . $fuels['gazole']['cp'] . " " . $fuels['gazole']['ville'] . "\n";
    }
}









