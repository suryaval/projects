import os
import psycopg2
import sys
import bottle
from bottle import run, template, get, post, request, route

con = None

@get('/plot')
def form():
    #return template('login', title='Login')
	return '''<h2>POSTGRES LOGIN</h2><form method="POST" action="/plot">UserID: <input name="uid" type="text" />Password:<input name="upwd" type="password" /><input type="submit" /><br/></form>'''
	
@post('/plot')
def submit():
    # grab data from form
	userid = request.forms.get('uid')
	userpwd = request.forms.get('upwd')
	validate(userid,userpwd)

#@route('/plot')
def validate(uid,upwd):
	var1 = uid
	var2 = upwd
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

	
