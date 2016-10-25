import psycopg2
from bottle import route, run, template, request

@route('/todo')
@route('/my_todo_list')
def todo_list():
	con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep')
	cur = con.cursor()
	cur.execute("SELECT id,task FROM todo where status=bool(1)")
	data = cur.fetchall()
	cur.close()
	output = template('make_table', rows=data)
	return output

@route('/new', method='GET')
def new_item():
	if request.GET.save:
		new = request.GET.task.strip()
		con = psycopg2.connect(database='phtool', user='navadeep', password='navadeep')
		cur = con.cursor()
		cur.execute("INSERT INTO todo (task,status) VALUES (?,?)",(new,bool(1)))
		#c.execute("INSERT INTO todo (task,status) VALUES (?,?)", (new,1))
		new_id = cur.lastrowid
		con.commit()
		cur.close()
		return '<p>The new task was inserted into the database, the ID is %s</p>' % new_id
	else:
		return template('new_task.tpl')
#debug(True)
run(host='localhost', port=8088, reloader=True)
