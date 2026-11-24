def caesarova_sifra(text: str, posun: int) -> str:
    vysledek = []
    posun = posun % 26  

    for znak in text:
        if "A" <= znak <= "Z":
            zaklad = ord("A")
            novy_znak = chr((ord(znak) - zaklad + posun) % 26 + zaklad)
            vysledek.append(novy_znak)
        elif "a" <= znak <= "z":
            zaklad = ord("a")
            novy_znak = chr((ord(znak) - zaklad + posun) % 26 + zaklad)
            vysledek.append(novy_znak)
        else:
            vysledek.append(znak)

    return "".join(vysledek)



zprava = "Ahoj světe! Python 3."
zasifrovano = caesarova_sifra(zprava, 3)
desifrovano = caesarova_sifra(zasifrovano, -3)

print("Zašifrováno:", zasifrovano)  
print("Dešifrováno:", desifrovano)