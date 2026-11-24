import random

print("zadej 1 pro 1-10")
print("zadej 2 pro 1-50")
print("zadej 3 pro 1-100")
print("zadej 4 pro vlastni rozsah")

a = int(input("vyber moznost: "))

if a == 1:
    dolni, horni = 1, 10
elif a == 2:
    dolni, horni = 1, 50
elif a == 3:
    dolni, horni = 1, 100
elif a == 4:
    dolni = int(input("zadej spodni hranici: "))
    horni = int(input("Zadej vrchni hranici: "))
else:
    print("neplatna volba!")
    exit()

if dolni > horni:
    print("spodni hranice nesmi byt vetsi nez vrchni!")
    exit()

pokusy = 0
print(f"mysli si cislo mezi {dolni} a {horni}.")

while True:
    if dolni > horni:
        print("nejde")
        break

    ran = random.randint(dolni, horni)
    pokusy += 1
    print(f"pocitac hada: {ran} (pokus c. {pokusy})")

    if dolni == horni:
        print(f"pocitac uhodl cislo {dolni} na {pokusy}. pokus!")
        break

    b = input("je tve cislo 'vetsi', 'mensi' nebo 'uhodl'? ").lower()

    if b == "vetsi":
        dolni = ran + 1
    elif b == "mensi":
        horni = ran - 1
    elif b == "uhodl":
        print(f"pocitac uhodl cislo {ran} na {pokusy}. pokus!")
        break
    else:
        pokusy -= 1
        print("neplatna odpoved, napis 'vetsi', 'mensi' nebo 'uhodl'.")
  



