print("kamen,nuzky, papir")
pc=0
pl=0
import random
while True:
  ran=random.randint(0,2)
    match ran:
    case 0:
        ran="kamen"
    case 1:
        ran="nuzky"
    case 2:
        ran="papir"
str=input("zadej kamen=0, nuzky=1 nebo papir=2:")
kamen=0
nuzky=1
 papir=2
 if str!="0" and str!="1" and str!="2":
    print("neplatný vstup")
 if str==ran:
    print("remiza")
 elif str=="0" and ran=="nuzky":
    print("vyhrál jsi")
    pl+=1
 elif str=="1" and ran=="papir":
    print("vyhrál jsi")
    pl+=1
 elif str=="2" and ran=="kamen":
    print("vyhrál jsi")
    pl+=1
 else:
    print("prohrál jsi")
    pc+=1
 print(f"ty jsi zvolil {str} a počítač zvolil {ran}")
 if(pl==3):
    print("vyhrál jsi celou hru")
    break
 elif(pc==3):
    print("prohrál jsi celou hru")
    break



print(f"počítač má {pc} bodů a ty máš {pl} bodů")
