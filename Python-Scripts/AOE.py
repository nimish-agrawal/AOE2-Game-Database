from flask import Flask, render_template, request, url_for, redirect, flash
from db_connect import connection

#from flask.ext.mysql import MySQL
app = Flask(__name__)


@app.route('/')
def main():
    return render_template('index.html')


@app.route('/index')
def index():
    return render_template('index.html')


@app.route('/tips')
def tips():
    return render_template('tips.html')


@app.route('/search')
def search():
    return render_template('search.html')


@app.route('/unitsearch')
def unitsearch():
    return render_template('unitsearch.html')


@app.route('/login')
def login():
    return render_template('login.html')

'''
@app.route('/login', methods = ["GET", "POST"])
def login():
    error = ''
    try:
        if request.method == "POST":
            attempted_username = request.form['gTag']
            attempted_password = request.form['password']
            if attempted_username == "Nimish" and attempted_password == "Agrawal":
                return redirect(url_for('index'))   #Redirects to function called index
            else:
                error = "Invalid credentials. Try again."
        return render_template('login.html', error = error)

    except Exception as e:
        #flash(e)
        return render_template('login.html', error = error)
'''

@app.errorhandler(404)
def page_not_found(e):
    return render_template('404.html')


if __name__ == '__main__':
    app.debug = True
    app.run()
