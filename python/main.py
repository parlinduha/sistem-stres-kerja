import xmltodict
import json
import requests

# Fungsi untuk mengambil dan mengonversi data cuaca dari BMKG


def convert_bmkg_xml_to_json(url):
    headers = {
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36"
    }

    # Mengambil data XML dari URL
    response = requests.get(url, headers=headers)

    # Mengecek apakah permintaan berhasil
    if response.status_code != 200:
        raise Exception(
            f"Failed to fetch data from {url}, status code: {response.status_code}")

    xml_data = response.content

    # Mengecek apakah data yang diambil bukan kosong
    if not xml_data.strip():
        raise Exception("Fetched XML data is empty")

    # Mengonversi XML ke dictionary
    dict_data = xmltodict.parse(xml_data)

    # Mengonversi dictionary ke JSON
    json_data = json.dumps(dict_data, indent=4)

    return json_data


# URL data cuaca dari BMKG (contoh URL, pastikan untuk menggunakan URL yang valid)
url = "https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-DkiJakarta.xml"

# Mengonversi dan menampilkan data
try:
    json_data = convert_bmkg_xml_to_json(url)
    with open('weather_data.json', 'w') as f:
        f.write(json_data)
    print("Data saved to weather_data.json")
except Exception as e:
    print(f"Error: {e}")
