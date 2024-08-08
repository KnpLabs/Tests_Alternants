import requests
from enum import Enum

BASE_URL = "https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records"

class FuelType(Enum):
    SP95 = "sp95"
    SP98 = "sp98"
    Gazole = "gazole"

def get_regions() -> list:
    url = f"{BASE_URL}?select=region&where=region%20is%20not%20null&group_by=region"
    response = requests.get(url)
    regions = []
    for result in response.json()["results"]:
        regions.append(result["region"])
    return regions

def get_cheapest_price(region: str, fuel: FuelType) -> tuple:
    url = f"{BASE_URL}?select={fuel.value}_prix%2C%20adresse%2C%20cp%2C%20ville&where=region%20%3D%20%22{region}%22%20and%20{fuel.value}_prix%20is%20not%20null&order_by={fuel.value}_prix&limit=1"
    response = requests.get(url)
    if response.json()["total_count"] > 0:
        result = response.json()["results"][0]
        price = result[f"{fuel.value}_prix"]
        address = f"{result['adresse']} {result['cp']} {result['ville']}"
        return (price, address)
    else:
        return (None, None)
    
regions = get_regions()

for region in regions:
    print(f"{region} :")
    for fuel in FuelType:
        price, address = get_cheapest_price(region, fuel)
        if price is not None:
            print(f" {fuel.name} : {price:.2f}€ / {address}")
        else:
            print(f" {fuel.name} : No data")