import requests

BASE_URL = "https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records"

def get_regions() -> list:
    url = f"{BASE_URL}?select=region&where=region%20is%20not%20null&group_by=region"
    response = requests.get(url)
    regions = []
    for result in response.json()["results"]:
        regions.append(result["region"])
    return regions