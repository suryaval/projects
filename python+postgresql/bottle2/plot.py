import os
import psycopg2
import sys
import bottle
from bottle import run, template, get, post, request, route

con = None

@route('/plot',method='POST')
def form():
    #return template('login', title='Login')
	return '''<h2>POSTGRES LOGIN</h2><form method="POST" action="/plot2">UserID: <input name="uid" type="text" />Password:<input name="upwd" type="password" /><input type="submit" /><br/></form>'''
	
@route('/plot2', method='GET')
def submit():
    # grab data from form
	userid = request.forms.get('uid')
	userpwd = request.forms.get('upwd')
	return validate(userid,userpwd)

#@route('/plot3', method='GET')
def validate():
	con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep')
	cur = con.cursor()
	cur.execute("SELECT * FROM users where id=var1 and pass=var2")
	data = cur.fetchall()
	for i in data:
		print(i)
	cur.close()
	if(i):
		return '''<h3>LOGIN SUCCESSFUL</h3>'''
	else:
		return '''<h3>UNSUCCESSFUL</h3>'''
	

run(host='localhost', port=8088)

	
