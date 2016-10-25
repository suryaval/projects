#!/usr/bin/python
# -*- coding: utf-8 -*-

import psycopg2
import sys


con = None

try:
	con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep')  
	cur = con.cursor()
  
	cur.execute("CREATE TABLE todo (id INTEGER PRIMARY KEY, task char(100) NOT NULL, status bool NOT NULL)")
	cur.execute("INSERT INTO todo (id,task,status) VALUES (1,'Read A-byte-of-python to get a good introduction into Python',bool(0))")
	cur.execute("INSERT INTO todo (id,task,status) VALUES (2,'Visit the Python website',bool(1))")
	cur.execute("INSERT INTO todo (id,task,status) VALUES (3,'Test various editors for and check the syntax highlighting',bool(1))")
	cur.execute("INSERT INTO todo (id,task,status) VALUES (4,'Choose your favorite WSGI-Framework',bool(0))")	
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