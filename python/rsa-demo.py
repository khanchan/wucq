#! /usr/bin/python

p = 223;
q = 173;

N = p * q # 23*73 = 1679
m = (p - 1) * (q - 1) # 22 * 72 = 1584

print("N = %d \t m = %d"%( N , m));

e = 17;

d = 1;
while(d):
    if((d*e)%m == 1):
        break;
    d += 1;

print("e = %d d = %d"%(e , d));

ary = []

for x in range(1000 , 1020):
    ary.append((x**e)%N)

for x in ary:
    print("x = %s decry : %d"%(str(x).ljust(10) , (x**d%N)));

