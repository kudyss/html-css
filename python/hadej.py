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

ran_cislo = random.randint(dolni, horni)
pokusy = 0

print(f"pocitac si mysli cislo mezi {dolni} a {horni}. Hadej!")

while True:
    tip = int(input("tvuj tip: "))
    pokusy += 1

    if tip < ran_cislo:
        print(f"tajne cislo je vetsi. (pokus c. {pokusy})")
    elif tip > ran_cislo:
        print(f"tajne cislo je mensi. (pokus c. {pokusy})")
    else:
        print(f" uhodl jsi cislo {ran_cislo} na {pokusy}. pokus.")
        break