async function cheapestGaz() {
  const response = await fetch(
    `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=region&group_by=region`
  );
  const data = await response.json();
  const regions = data.results;

  const regionName = [];

  // I loop through the data to get all the region_code
  regions.forEach((region) => {
    // If the region_code already exist in the array, I don't push it
    if (regionName.includes(region.region) || region.region === null) {
      return;
    }
    // If the region_code doesn't exist in the array, I push it
    regionName.push(region.region);
    return regionName.sort();
  });

  for (const item of regionName) {
    const sp95 = "sp95_prix";
    const sp98 = "sp98_prix";
    const gazole = "gazole_prix";

    // The filter is done with the URL. Each URL return the element where the price for each fuel is the lowest
    const apiResponseForsp95 = await fetch(
      `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=adresse%2C%20ville%20%2C%20cp%20%2C%20sp95_prix%2C%20sp98_prix%20%2C%20gazole_prix&where=region%20%3D%20%22${item}%22&order_by=${sp95}&limit=1`
    );

    const apiResponseForsp98 = await fetch(
      `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=adresse%2C%20ville%20%2C%20cp%20%2C%20sp95_prix%2C%20sp98_prix%20%2C%20gazole_prix&where=region%20%3D%20%22${item}%22&order_by=${sp98}&limit=1`
    );

    const apiResponseForgazole = await fetch(
      `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=adresse%2C%20ville%20%2C%20cp%20%2C%20sp95_prix%2C%20sp98_prix%20%2C%20gazole_prix&where=region%20%3D%20%22${item}%22&order_by=${gazole}&limit=1`
    );

    const datasp95 = await apiResponseForsp95.json();
    const datasp98 = await apiResponseForsp98.json();
    const datagazole = await apiResponseForgazole.json();

    const finalDataSP95 = datasp95.results[0];
    const finalDataSP98 = datasp98.results[0];
    const finalDataGazole = datagazole.results[0];

    const logText = `
      ${item} :
      SP95    : ${finalDataSP95.sp95_prix} € / ${finalDataSP95.adresse} ${finalDataSP95.cp} ${finalDataSP95.ville}
      SP98    : ${finalDataSP98.sp98_prix} € / ${finalDataSP98.adresse} ${finalDataSP98.cp} ${finalDataSP98.ville}
      Gazole  : ${finalDataGazole.gazole_prix} € / ${finalDataGazole.adresse} ${finalDataGazole.cp} ${finalDataGazole.ville}
      `;

    console.log(logText);
  }
}

cheapestGaz();
