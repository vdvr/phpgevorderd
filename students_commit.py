import mysql.connector, csv
mydb = mysql.connector.connect(host='localhost',port=3306,database='pdotest',
        user='root',password='')
mysql = mydb.cursor()

f = open('data/studentdata.csv', 'r')

reader = csv.reader(f, delimiter=';')

rows = []
for row in reader:
    rows.append(row)
rows.pop(0)
for x in rows:
    query = """INSERT INTO students (student_id, name, birthDate, address, city,
    email, phone, mobile) VALUES (%s, %s, %s, %s, %s, %s, %s, %s);"""
    values = (x[0], x[1], x[2], x[3], x[4], x[5], x[6], x[7])
    mysql.execute(query, values)

try:
    mydb.commit()
except(Exception):
    print("error")
