// First , I will get every info for each region based on the region code

async function cheapestGaz() {
  const response = await fetch(
    `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=region&limit=100`
  );
  const data = await response.json();
  const regions = data.results;

  const regionName = [];

  // I loop through the data to get the region code
  regions.forEach((region) => {
    // If the code already exist in the array, I don't push it
    if (regionName.includes(region.region)) {
      return;
    }
    // If the code doesn't exist in the array, I push it
    regionName.push(region.region);
    return regionName.sort();
  });

  for (const item of regionName) {
    const sp95 = "sp95_prix";
    const sp98 = "sp98_prix";
    const gazole = "gazole_prix";

    const priceResponseForsp95 = await fetch(
      `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=adresse%2C%20ville%20%2C%20cp%20%2C%20sp95_prix%2C%20sp98_prix%20%2C%20gazole_prix&where=region%20%3D%20%22${item}%22&order_by=${sp95}&limit=1`
    );

    const priceResponseForsp98 = await fetch(
      `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=adresse%2C%20ville%20%2C%20cp%20%2C%20sp95_prix%2C%20sp98_prix%20%2C%20gazole_prix&where=region%20%3D%20%22${item}%22&order_by=${sp98}&limit=1`
    );

    const priceResponseForgazole = await fetch(
      `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=adresse%2C%20ville%20%2C%20cp%20%2C%20sp95_prix%2C%20sp98_prix%20%2C%20gazole_prix&where=region%20%3D%20%22${item}%22&order_by=${gazole}&limit=1`
    );

    const priceDatasp95 = await priceResponseForsp95.json();
    const priceDatasp98 = await priceResponseForsp98.json();
    const priceDatagazole = await priceResponseForgazole.json();

    const finalDataSP95 = priceDatasp95.results[0];
    const finalDataSP98 = priceDatasp98.results[0];
    const finalDataGazole = priceDatagazole.results[0];

    const erreur = "Erreur : Pas de données pour cette région.";

    const logText = `
      ${item} :
      SP95    : ${finalDataSP95.sp95_prix} € / ${finalDataSP95.adresse} ${
      finalDataSP95.cp
    } ${finalDataSP95.ville}
      SP98    : ${(finalDataSP98.sp98_prix = null
        ? erreur
        : finalDataSP98.sp98_prix)} € / ${finalDataSP98.adresse} ${
      finalDataSP98.cp
    } ${finalDataSP98.ville}
      Gazole  : ${finalDataGazole.gazole_prix} € / ${finalDataGazole.adresse} ${
      finalDataGazole.cp
    } ${finalDataGazole.ville}
      `;

    console.log(logText);
  }
}

cheapestGaz();
