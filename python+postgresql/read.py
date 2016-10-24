import psycopg2
import sys


con = None

try:
	con = psycopg2.connect(database='album', user='surya', password='Jan@2016')
	cur = con.cursor()
	cur.execute("SELECT * FROM Cars WHERE name='Volvo'")
	rows = cur.fetchall()
	for row in rows:
		print(row)
	
	
except psycopg2.DatabaseError as e:
	if con:
		con.rollback()
	print('Error %s' % e)
	#print("Error")
	#sys.exit(1)
    
    
finally:
    
    if con:
        con.close()