#!/usr/bin/python
# -*- coding: utf-8 -*-

import psycopg2
import sys


con = None

try:
	con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep') 
	cur = con.cursor()
	cur.execute('UPDATE cars set price=888888 where name like \'%kod%\'')          
	cur2 = con.cursor()
	cur2.execute('SELECT * FROM cars')
	var = cur2.fetchall()
	for row in var:
		print(row)
    

except psycopg2.DatabaseError as e:
    print('Error %s' % e)
	#print("Error")
	#sys.exit(1)
    
    
finally:
    
    if con:
        con.close()