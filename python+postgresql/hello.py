from bottle import route, run, template

@route('/navadeep/<name>')
def index(name):
    return template('<b>Navadeep... {{name}}</b>!', name=name)

run(host='localhost', port=8088)