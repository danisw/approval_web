from flask import Flask, request, render_template, redirect, flash
from flask_socketio import SocketIO
#from flask.ext.mysql import MySQL
from flaskext.mysql import MySQL
#from tables import Results
#from model import Mysql
import sys
import low_api



#response, sw1, sw2 = cardservice.connection.transmit(COMMAND)

app = Flask(__name__)
app.config['SECRET_KEY'] = 'vnkdabcjknfl889$'
socketio = SocketIO(app)

mysql = MySQL()
 
# MySQL configurations
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = ''
app.config['MYSQL_DATABASE_DB'] = 'stock'
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
mysql.init_app(app)

@app.route('/')
def sessions():
    return render_template('session.html')

def messageReceived(methods=['GET', 'POST']):
    print('message was received!!!')

@app.route('/display')
def view(methods=['GET', 'POST']):
	uid=low_api.read_uid()
	#try:
	# sql="SELECT * FROM receive"
	conn = mysql.connect()
	cursor = conn.cursor()
	sql="SELECT uid, nama, tanggal, (SUM(stock_plus)-SUM(stock_min)) as qty FROM receive WHERE uid LIKE %s"
	data=(uid)
	cursor.execute(sql, data)
	#cursor.execute(sql)
	row = cursor.fetchall()
	if row:
		return render_template('view.html', row=row, data=uid)
	else:
		row="error loading"
		return render_template('view.html', row=row, data=uid)
	#except Exception as e:
	#	print(e)

	return render_template("view.html",data=uid)

def messageReceived(methods=['GET', 'POST']):
    print('message was received!!!')

@app.route('/write', methods=['POST'])
def add_user():
	# try:		
		_uid = request.form['inputUID']
		_nama_produk = request.form['inputProduk']
		_stock_min = request.form['inputStockMin']
		_stock_plus = request.form['inputStockPlus']
		_user = request.form['inputUser']
		if request.method == 'POST':
			# is UID exist

			#UID exist


			#UID not exist
			sql = "INSERT INTO receive (uid, nama, user, stock_min, stock_plus) VALUES(%s, %s, %s, %s, %s)"
			data = (_uid, _nama_produk, _user, int(_stock_min), int(_stock_plus))
			conn = mysql.connect()
			if conn:
				flash('Connected to sql')
			else:
				flash('Not Connected to sql')
			cursor = conn.cursor()
			if cursor:
				flash('Cursor OK')
			else:
				flash('Cursor NOK')
			exe=cursor.execute(sql, data)
			if exe:
				flash('exe OK')
			else:
				flash('exe NOK')
			commit=conn.commit()
			if commit:
				flash('User added successfully!')
			else:
				flash('commit fail')

			return redirect('/display')
		else:
			return 'Error while adding user'
	
#def isExsist():
#def update():
#def insert():

@socketio.on('my event')
def handle_my_custom_event(json, methods=['GET', 'POST']):
    print('received my event: ' + str(json))
    socketio.emit('my response', json, callback=messageReceived)

if __name__ == '__main__':
    socketio.run(app, debug=True)