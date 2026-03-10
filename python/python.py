"""print("ahoj")
vys=0
a=float(input("zadej 1. cislo:"))
b=float(input("zadej 2. cislo:"))
znam=input("zadej znamenko:")
match znam:
    case "+":
        vys=a+b
    case "-":
        vys=a-b
    case "*":
        vys=a*b
    case "^":
        vys=a**b
    case "/":
        if b!=0:
                vys=a/b
        if vys%1==0:
            vys=int(vys)
        else:
            print("nelze delit nulou")
print(f"{a} {znam} {b} = {vys}")"""

str=input("zadej heslo:")
znak=len(str)
if(znak<8):
    print("heslo musí být delší než 8 znaků")
if(str.isalpha()):
    print("heslo musí obsahovat čísla")
if(str.isdigit()):
    print("heslo musí obsahovat písmena")
elif(str.isalnum()):
     print("heslo je v pořádku")