import pandas as pd
import mysql.connector

# Establish connection to MySQL database
conn = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="deltastaar"
)

# Execute query to retrieve data from table
cursor = conn.cursor()
query = "SELECT * FROM employee"
cursor.execute(query)

# Fetch all rows of data
result = cursor.fetchall()

# Convert data to a Pandas DataFrame
df = pd.DataFrame(result, columns=cursor.column_names)

# Export DataFrame to Excel file
df.to_excel("output.xlsx", index=False)

# Close MySQL connection
conn.close()
