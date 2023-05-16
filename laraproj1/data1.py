import pymysql

conn = pymysql.connect(
    host = "127.0.0.1",
    port=3306,
    user='root',
    password='59c389eee76787d4c6d69e6d',
    database='laraproj1',
    charset='utf8'
    )

cursor = conn.cursor(cursor=pymysql.cursors.DictCursor)

# res = cursor.execute(""" select * from aaa ;""")
li = []
for i in range(2,30):
    li.append((i,"course%s" %i))

cursor.executemany(""" insert into courses(`id`, `coursename`, `teacher`, `course_description`, `lecture_number`, `coursebooks`, `created_at`, `updated_at`) values(%s, %s, 'ttss', '11111', '2222222', '444444444', '2023-05-03 04:24:50', '2023-05-03 04:24:50')""", li)

conn.commit()

print('ok')
