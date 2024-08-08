import requests
from enum import Enum

BASE_URL = "https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records"

class FuelType(Enum):
    SP95 = "sp95"
    SP98 = "sp98"
    Gazole = "gazole"


def get_regions() -> list:
    """
    Retrieves a list of all the regions available in the dataset.

    Returns:
        list: A list of region names.
    """
    url = f"{BASE_URL}?select=region&where=region%20is%20not%20null&group_by=region"
    response = requests.get(url)
    regions = []
    for result in response.json()["results"]:
        regions.append(result["region"])
    return regions


def get_cheapest_price(region: str, fuel: FuelType) -> tuple:
    """
    Retrieves the cheapest price and address for a given region and fuel type.

    Args:
        region (str): The name of the region.
        fuel (FuelType): The fuel type.

    Returns:
        tuple: A tuple containing the cheapest price (float) and the address (str) of the location with the cheapest price. If no data is available, the tuple will contain (None, None).
    """
    url = f"{BASE_URL}?select={fuel.value}_prix%2C%20adresse%2C%20cp%2C%20ville&where=region%20%3D%20%22{region}%22%20and%20{fuel.value}_prix%20is%20not%20null&order_by={fuel.value}_prix&limit=1"
    response = requests.get(url)
    if response.json()["total_count"] > 0:
        result = response.json()["results"][0]
        price = result[f"{fuel.value}_prix"]
        address = f"{result['adresse']} {result['cp']} {result['ville']}"
        return (price, address)
    else:
        return (None, None)
    

def main():
    """
    Main function that prints the cheapest price and address for each fuel type in each region.
    """
    regions = get_regions()

    for region in regions:
        print(f"{region} :")
        for fuel in FuelType:
            price, address = get_cheapest_price(region, fuel)
            if price is not None:
                print(f" {fuel.name} : {price:.2f}€ / {address}")
            else:
                print(f" {fuel.name} : No data")

if __name__ == "__main__":
    main()