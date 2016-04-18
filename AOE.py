from flask import Flask, render_template

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

if __name__ == '__main__':
    app.debug = True
    app.run()
