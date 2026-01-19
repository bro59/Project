import csv, os, requests, zipfile

#os.makedirs("barca_images", exist_ok=True)

with open("barcaImg.csv") as f:
    reader = csv.DictReader(f)
    for row in reader:
        name = row["Name"].replace(" ", "_")
        img = requests.get(row["Picture"]).content
        with open(f"{name}.jpg", "wb") as file:
            file.write(img)
# The script creates a directory 'barca_images' and downloads player images from the provided CSV file.
