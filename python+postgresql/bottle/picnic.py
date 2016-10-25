import psycopg2
from bottle import route, run, template

@route('/picnic')
def show_picnic():
	con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep')  
	cur = con.cursor()
	cur.execute("SELECT item,quant FROM picnic")
	data = cur.fetchall()
	cur.close()
	output = template('bring_to_picnic', rows=data)
	return output

run(host='localhost', port=8088)