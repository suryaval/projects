#!/usr/bin/python
# -*- coding: utf-8 -*-

import psycopg2
import sys


con = None

try:
     
    con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep')  
    
    cur = con.cursor()
  
    cur.execute("CREATE TABLE picnic (id INTEGER PRIMARY KEY, item CHAR(100) NOT NULL, quant INTEGER NOT NULL)")
    cur.execute("INSERT INTO picnic (item,quant) VALUES ('bread', 4)")
    cur.execute("INSERT INTO picnic (item,quant) VALUES ('cheese', 2))")
    cur.execute("INSERT INTO picnic (item,quant) VALUES ('grapes', 30)")
    cur.execute("INSERT INTO picnic (item,quant) VALUES ('cake', 1)")
    cur.execute("INSERT INTO picnic (item,quant) VALUES ('soda', 4)")
    #cur.execute("INSERT INTO Cars VALUES(6,'Citroen',21000)")
    #cur.execute("INSERT INTO Cars VALUES(7,'Hummer',41400)")
    #cur.execute("INSERT INTO Cars VALUES(8,'Volkswagen',21600)")
    
    con.commit()

except psycopg2.DatabaseError as e:
	if con:
		con.rollback()
	print('Error %s' % e)
	#print("Error")
	#sys.exit(1)
    
    
finally:
    
    if con:
        con.close()