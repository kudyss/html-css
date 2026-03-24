def cal (a,b,zn):
    
    if zn == "+":
        return a+b
    elif zn == "-":
        return a-b
    elif zn == "*":
        return a*b
    elif zn == "/":
         a/b
    else:
        print("Neplatná operace.")
      



a=float(input("zadej 1. cislo"))
b=float(input("zadej 2. cislo"))
zn=str(input("zadej operaci"))
v=0

print(cal(a,b,zn))    


