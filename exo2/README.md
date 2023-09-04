
# Where's the cheapest gaz?

## Description

Where can I find the lowest-priced fuel? Using open data from the French Ministry of the Economy, find the cheapest selling price for each of these fuels (SP95, SP98, Gasoil) and each French region, and the station where you can find it.

## Source

Ministry of the Economy open data portal: https://data.economie.gouv.fr/explore/dataset/prix-des-carburants-en-france-flux-instantane-v2/api/

Example (top 20 sales outlets in the Pays de la Loire region): https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?where=code_region%3D52&limit=20

## What is expected?

You will provide a CLI script displaying for each region and each cheapest fuel: the price and the full address of the point of sale.
The choice of language is free (within reason). Example: PHP, JS (Node), Python, Go, Shellscript, etc.

Return example:

```shell
$ script.sh
Bretagne :
  SP95 : 1.78€ / 1 rue des menhirs 29500 Kerplouguenec
  SP98 : 1.87€ / 2 rue des dolmens 35500 Belle-sur-Vilaine
  Gazole: 1.64€ / 3 place du phare 22500 Trifouiez-le-Quay
Ile-de-France :
  SP95: 1.79€ / 1 rue de Vexin 95300 Carburilly-les-Gonesse
  SP98...
  ...
etc.
```

You will have to make a PR (Pull request) with executable code as clean as possible.

[]: # Path: exo2/README.md