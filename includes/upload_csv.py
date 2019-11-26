import csv
import pandas as pd
import pymysql
con = pymysql.connect('localhost', 'root', 
    '', 'complaintmgmt')

cursor = con.cursor()
cursor.execute('DELETE FROM predicted')
csv_data = pd.read_csv('Prediction.csv')
#csv_data = csv.reader(r'Prediction.csv')
#print(csv_data)
for ind in csv_data.index:
    #print(csv_data['label'][ind],csv_data['num_complaints'][ind])
    cursor.execute('INSERT INTO predicted(label, num_complaints ) VALUES('+ str(csv_data['label'][ind])+',' + str(csv_data['num_complaints'][ind])+')')
#close the connection to the database.
con.commit()
cursor.close()
print("Done")