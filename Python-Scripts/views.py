"""
Routes and views for the flask application.
"""

from datetime import datetime
from flask import render_template
from AOE import app

@app.route('/')
@app.route('/index')
def index():
    return render_template('index.html')

@app.route('/tips')
def tips():
    return render_template('tips.html')

@app.route('/search')
def search():
    return render_template('search.html')

@app.route('/civsearch')
def civsearch():
    return render_template('civsearch.html')

@app.route('/unitsearch')
def unitsearch():
    return render_template('unitsearch.html')
