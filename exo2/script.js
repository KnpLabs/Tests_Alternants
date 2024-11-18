
var rootAPI = "https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/"


async function allFuel() {
    let fuel = []
    for (var i = 0; i <= 1100; i += 100) {
        const response = await fetch(rootAPI + "records?select=region%2C%20code_region%2C%20adresse%2C%20cp%2C%20ville%2C%20gazole_prix%2C%20%20sp95_prix%2C%20sp98_prix%20%20&limit=100&offset=" + i)
        let result = await response.json();
        fuel.push(result)
    }
    console.log(fuel)
    return document.write(JSON.stringify(fuel))
}

function bestFuelByRegion(region) {
    let fuel = allFuel()





}


