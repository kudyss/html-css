"""str=input("zadej slovo:")
for i in range(str.__len__()):
    print(str[i])
for i in range(str.__len__()-1,-1,-1):
    print(str[i])
if(str == str[::-1]):
    print("slovo je palindrom")
else:
    print("slovo není palindrom")"""


print("zadej faktorial:")
fakt=int(input())
for i in range(1, fakt ):
  if(fakt==0 or fakt==1):
    fakt=1
  fakt =fakt* i
print(f" faktorial je:", fakt)

