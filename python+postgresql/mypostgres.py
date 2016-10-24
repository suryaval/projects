#!/usr/bin/python
# -*- coding: utf-8 -*-

import psycopg2
import sys


con = None

try:
     
    con = psycopg2.connect(database='album', user='postgres', password='postgresql') 
    cur = con.cursor()
    cur.execute('SELECT version()')          
    ver = cur.fetchone()
    print(ver)    
    

except psycopg2.DatabaseError as e:
    print('Error %s' % e)
	#print("Error")
	#sys.exit(1)
    
    
finally:
    
    if con:
        con.close()