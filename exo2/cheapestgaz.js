// First , I will get every info for each region based on the region code
async function getRegion() {
  const response = await fetch(
    `https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?select=region&limit=100`
  );
  const data = await response.json();
  const regions = data.results;

  const regionArray = [];

  // I loop through the data to get the region code
  regions.forEach((element) => {
    // If the code already exist in the array, I don't push it
    if (regionArray.includes(element.region)) {
      return;
    }
    // If the code doesn't exist in the array, I push it
    regionArray.push(element.region);
  });

  console.log(regionArray);
}

getRegion();
