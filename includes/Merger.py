#!/usr/bin/python3
# -*- coding: utf-8 -*-

import pymysql
import pandas as pd
con = pymysql.connect('localhost', 'root', 
    '', 'complaintmgmt')

cur = con.cursor()
cur.execute("SELECT * FROM complaint")

rows = cur.fetchall()
work = [];
date = []
newDF = pd.DataFrame()
for row in rows:
    work.append(row[2])
    date.append(row[3])
    print("{0} {1}".format(row[2], row[3]))
newDF['Work'] = work
newDF['Date'] = date
df = pd.read_excel(r'Labelled.xls')
df = df.drop(columns = ['Label'])
print(df)

print("-----------------------------------------------")
#print(newDF)
newDF['Date']= pd.to_datetime(newDF['Date']) 
newDF = newDF.append(df,ignore_index = True);
df.to_csv('Merged.csv',index = False)