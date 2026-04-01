seznam = []
min = 0
while True:
    a = int(input("Zadej číslo (nebo '0' pro ukončení): "))
    if a == 0:
        break
    else:
        seznam.append(a)
    print ("Zadal jsi číslo:", a)
    print ("cisla:", a)

for cislo in seznam:
    if cislo % 3 == 0:
        print("Toto číslo je dělitelné třemi:", cislo)

for cislo in seznam:
    if cislo % 2 == 0:
        print("Toto číslo je dělitelné dvema:", cislo)

if seznam:
    min = seznam[0]
    for cislo in seznam:
        if cislo < min:
            min = cislo
    print("Nejmenší číslo je:", min)

if seznam:
    max = seznam[0]
    for cislo in seznam:
        if cislo > max:
            max = cislo
    print("Největší číslo je:", max)

print("Seznam čísel:", seznam)
print("cisla delitelne tremi:", [cislo for cislo in seznam if cislo % 3 == 0])
print("cisla delitelne dvema:", [cislo for cislo in seznam if cislo % 2 == 0])


for i in range(1,5):
    seznam.append(i)
print (seznam)
