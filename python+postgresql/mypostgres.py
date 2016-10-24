#!/usr/bin/python
# -*- coding: utf-8 -*-

import psycopg2
import sys


con = None

try:
     
    con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep') 
    cur = con.cursor()
    cur.execute('SELECT version()')          
    ver = cur.fetchone()
    print("version of current POSTGRESQL server is:",ver)    
    

except psycopg2.DatabaseError as e:
    print('Error %s' % e)
	#print("Error")
	#sys.exit(1)
    
    
finally:
    
    if con:
        con.close()