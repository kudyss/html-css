a=input("zadej slovo: ")
len=len(a)
for i in range(len):
    print(a[i:len])
    for j in range(0,2):
        print(a[i])
        import time
        time.sleep(0.5)


