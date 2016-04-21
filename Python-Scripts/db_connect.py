import MySQLdb

def connection():
    conn = MySQLdb.connect(host = "localhost", user = "root", passwd = "ChelseaFC", db = "AgeOfEmpires")
    c = conn.cursor()
    return c, conn