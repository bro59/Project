from flask import Flask, render_template, request, redirect, url_for, session
import mysql.connector
import os
import csv
import io
import re
import pandas as pd
import string
import csv

app = Flask(__name__)

# Finish working on setting up login required decorator and text set dropdown options

app.secret_key = os.urandom(32)  # Secret key for session management

#WRITE CODE FOR DEALING WITH ERRORS LATER(E.G., DUPLICATE ENTRIES, INVALID INPUTS, 
# INVALID FILE TYPES, ETC.) AND CONNEECTIONS TO OTHER TABLES IN THE DATABASEO

# Database configuration (default XAMPP credentials)
DB_CONFIG = {
    'host': 'localhost',
    'user': 'root',
    'password': '',  # Default XAMPP password is empty
    'database': 'projectsoccer'
}

def get_db_connection():
    """Establishes a connection to the MySQL database."""
    return mysql.connector.connect(**DB_CONFIG)

filename = 'barcelona_2025_26_squad_with_positions.csv'  # Replace with your CSV file path

def readAndupload(filename5):

    with open(filename5, mode='r', newline='', encoding='utf-8') as file:
        csv_reader = csv.reader(file, delimiter=',')
        x=0
     
        for row in csv_reader:
            # Each 'row' is a list of strings representing the data in that line
            if (x>0 and len(row)>0):  # Skip header row and ensure there are enough columns
                #print(row)
                print("\n")
                 # Connect to the database
                conn = get_db_connection()
                cursor = conn.cursor()
                # SQL query to insert data
                sql = "INSERT INTO player (playerName, squadNum, Position, detailedPos, Age, Nationality) VALUES (%s, %s, %s, %s, %s, %s)"
                val = (row[0], int(row[1]), row[2], row[3], int(row[4]), row[5])
                # Execute and commit
                print(val)
                cursor.execute(sql, val)
                conn.commit()                
                # Close connections
                cursor.close()
                conn.close()
                print("Inserted row for player:", row[0])
            
            x+=1
readAndupload(filename)
