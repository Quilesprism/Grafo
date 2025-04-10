import requests
from bs4 import BeautifulSoup
import json
import os
import requests

def parse_table(html):
    soup = BeautifulSoup(html, 'html.parser')
    table_class = "sortable wikitable plainrowheaders"
    table = soup.find('table', class_=table_class)
    tbody = table.find('tbody')
    rows = tbody.find_all('tr') 
    data_rows = []
    for row in rows:
        cols = row.find_all(['th', 'td'])
        if len(cols) >= 5:  
            metropolitan_area = cols[0].get_text(strip=True)
            city = cols[1].get_text(strip=True)
            population = cols[2].get_text(strip=True).replace(',', '')
            area = cols[3].get_text(strip=True).replace(',', '')
            country = cols[4].get_text(strip=True)
            data_rows.append((metropolitan_area, city, population, area, country))
    print(data_rows)
    return data_rows

def create_countries_dictionary(data_rows):
    countries_dict = {}
    for metropolitan_area, city, population, area, country in data_rows:
        if population.isdigit():  
            population = int(population)
            area = float(area)
            if country not in countries_dict:
                countries_dict[country] = {'cities': [], 'total_population': 0, 'total_area': 0}
            countries_dict[country]['cities'].append({'city': city, 'population': population, 'area': area})
            countries_dict[country]['total_population'] += population
            countries_dict[country]['total_area'] += area
    for country in countries_dict:
        countries_dict[country]['population_density'] = countries_dict[country]['total_population'] / countries_dict[country]['total_area']
        for city in countries_dict[country]['cities']:
            city['population_density'] = city['population'] / city['area']
    return countries_dict

def save_to_file(data, filename):
    with open(filename, 'w') as file:
        json.dump(data, file, indent=4)

def load_from_file(filename):
    if os.path.exists(filename):
        with open(filename, 'r') as file:
            return json.load(file)
    return None

def main():
    url = 'https://en.wikipedia.org/wiki/ASEAN'
    filename = 'asean_urban_areas.json'
    
    response = requests.get(url)
    response.raise_for_status()
    html = response.text
    
    data_rows = parse_table(html)
    new_data = create_countries_dictionary(data_rows)
    
    old_data = load_from_file(filename)
    if old_data != new_data:
        save_to_file(new_data, filename)
        print("New data saved.")
    else:
        print("No new data to save.")
    
    print(json.dumps(new_data, indent=4))

if __name__ == "__main__":
    main()
