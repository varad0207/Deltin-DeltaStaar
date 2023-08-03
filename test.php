<!DOCTYPE html>
<html>
<head>
<title>Run Python code with PyScript</title>
<script src="https://cdn.jsdelivr.net/npm/pyscript@1.18.0/dist/pyscript.min.js"></script>
<link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
<script defer src="https://pyscript.net/latest/pyscript.js"></script>
</head>
<body>
<py-script>
import pandas as pd
import mysql.connector

# Connect to your MySQL database
# Replace 'your_host', 'your_username', 'your_password', and 'your_database' with the actual connection details
conn = mysql.connector.connect(
    host='your_host',
    user='your_username',
    password='your_password',
    database='your_database'
)

# Replace 'accommodation' with the actual name of your table
query = "SELECT * FROM accommodation"

# Read the data from the MySQL database into a pandas DataFrame
df = pd.read_sql(query, conn)

# Export the DataFrame to an Excel file
# Replace 'accommodation_data.xlsx' with the desired filename
df.to_excel('accommodation_data.xlsx', index=False)

# Close the database connection
conn.close()
</py-script>
</body>
</html>