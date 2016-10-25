import bottle
import bottle_pgsql
import psycopg2
import sys

app = bottle.Bottle()
plugin = bottle_pgsql.Plugin('dbname=album user=surya password=Jan@2016')
app.install(plugin)

@app.route('/show/:<item>')
def show(item, db):
    db.execute('SELECT * from Cars')
    row = db.fetchone()
    if row:
        return template('showitem', page=row)
    return HTTPError(404, "Page not found")