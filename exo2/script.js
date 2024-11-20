
var rootAPI = "https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/"

async function allFuel() {
    // retrieve the list of regions
    const responseRegion = await fetch(rootAPI + "records?select=region%20as%20nom%2C%20code_region&group_by=region%2C%20code_region&order_by=code_region&limit=-1&offset=0")
    let resultRegion = await responseRegion.json();    

    let array = resultRegion.results
    //console.log(array[1].code_region)
    //console.log(array)
    let fuel = []
   for ( i = 0 ; i < array.length ; i++) {
    if (array[i].code_region) {
        
        let total_count = 0
        while (fuel.length <= total_count) {
            
            const response = await fetch(rootAPI + "records?select=region%2C%20code_region%2C%20adresse%2C%20cp%2C%20ville%2C%20gazole_prix%2C%20sp95_prix%2C%20sp98_prix&where=code_region%3D"+ array[i].code_region + "&limit=100&offset=0")
            let resultStation = await response.json();
            fuel.push(resultStation)
            console.log(fuel.total_count)
        }
    }
    //while longueur de la liste = total count
}
console.log(fuel)

    return document.write(JSON.stringify(fuel))
}

function bestFuelByRegion() {
    let fuel = allFuel()






}


