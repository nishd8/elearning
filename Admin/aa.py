import pandas as pd

nm=input()
read_file = pd.read_excel (nm)
nm=nm.replace(".xlsx","")
print(nm)
op=nm+".csv"
print(op)
read_file.to_csv (op, index = None, header=True)