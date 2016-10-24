import psycopg2
import sys


con = None

try:
	con = psycopg2.connect(database='album', user='surya', password='Jan@2016')
	cur = con.cursor()
	cur.execute("SELECT * FROM Cars")
	while True:
		row = cur.fetchone()
		if(row == None):
			break
		print(row[0], row[1], row[2])

except psycopg2.DatabaseError as e:
	if con:
		con.rollback()
	print('Error %s' % e) 
    
finally:
    
    if con:
        con.close()