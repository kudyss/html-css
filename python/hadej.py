import random

print("zadej 1 pro 1-10")
print("zadej 2 pro 1-50")
print("zadej 3 pro 1-100")
print("zadej 4 pro vlastni rozsah")

a = int(input("vyber moznost: "))

if a == 1:
    min, max = 1, 10
elif a == 2:
    min, max = 1, 50
elif a == 3:
    min, max = 1, 100
elif a == 4:
    min = int(input("zadej spodni hranici: "))
    max = int(input("Zadej vrchni hranici: "))
else:
    print("neplatna volba!")
    exit()

print(f"mysli si cislo mezi {min} a {max}")

while True:
    ran = random.randint(min, max)
    print(f"pocitac hada: {ran}")
    b = input("je cislo vetsi? (ano/ne): ").lower()

    if b == "ano":
        min = ran + 1
    elif b == "ne":
        max = ran
    else:
        print("neplatna odpoved, zadej 'ano' nebo 'ne'.")
        continue

    if min == max:
        print(f"pocitac uhodl cislo: {min}!")
        break