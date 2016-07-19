#! /usr/bin/python
import math
import random
#coding utf8

# rm = random.random() * 100 % 10
# print(rm)
# if rm >= 0 and rm <= 3 :
#     print("0-3")
# elif rm > 3 and rm <= 6 :
#     print("3-6")
# elif rm > 6 and rm <= 8:
#     print("6-8")
# else:
#     print("9")

# ary = ["a" , "b" , "c" , "d" , "e" ,"f"] 
ary = ("a" , "b" , "c" , "d" , "e" , "f")
l = dict([("a" , "b"),("c","d")])
def fn(a):
    return a*3

ary1 = map(lambda a : a*2 , ary);
ary2 = map(fn , ary);
#print(ary1 , ary2);
#print(reduce(lambda x, y: x+y,ary)) 
#print([a+b+c for a in range(5)  for b in range(20 , 25) for c in range(5,10)])
# for l in open('d:/t.rb' , 'r').readlines():
    # pass
#   print(l.strip());

s="""
abs() dict() help() min() setattr() 
all() dir() hex() next() slice() 
any() divmod() id() object() sorted() 
ascii() enumerate() input() oct() staticmethod() 
bin() eval() int() open() str() 
bool() exec() isinstance() ord() sum() 
bytearray() filter() issubclass() pow() super() 
bytes() float() iter() print() tuple() 
callable() format() len() property() type() 
chr() frozenset() list() range() vars() 
classmethod() getattr() locals() repr() zip() 
compile() globals() map() reversed() __import__() 
complex() hasattr() max() round()   
delattr() hash() memoryview() set() """

# a=s.replace("\n" , ' ').replace("  " , " ").replace("  " , " ").split()
# i=0
# for s in a :
#     i = i+1;
#
#     print(s.ljust(14,'.') , end="");
#     if not i%4 : print("")

class wcq:
    def __init__(self):
        self.ary = {"name": 'wcq' , 'gender':'male' , "age": 30}
    def __iter__(self):
        return iter(self.ary)        
    def __repr__(self):
        return 'wcq';
me = wcq();
me1 =  {"name": 'wcq' , 'gender':'male' , "age": 30}
for k in me1:
    pass #print(k,me1[k])

# class wcq:
#     def name(self , name):
#         print('wuchangqian'+name)
# # me = wcq();
# # me.name('www');
# # me.name(""" 
# # 	line1
# # 	line2
# # 	line3
# # """);
# import os
# import xml.dom.minidom
# dom=xml.dom.minidom.parse('d:\\test.xml')
# root=dom.documentElement;
# print(root.childNodes[1].childNodes[0].nodeValue);

# import random

# ary=[]
# for x in range(1 , 10):
# 	n = input("get number %d " % x)
# 	ary.append(int(n))

# print(ary)
# 	
# def fib(n):    # write Fibonacci series up to n
#     a, b = 0, 1
#     while b < n:
#         print(b, end=' ')
#         a, b = b, a+b
#     print()

# def fib2(n): # return Fibonacci series up to n
#     result = []
#     a, b = 0, 1
#     while b < n:
#         result.append(b)
#         a, b = b, a+b
#     return result

# import time
# n = 10000000000
# t1 =  time.time();
# fib(n)

# t2 = time.time();
# fib2(n)

# t3 = time.time()
# print(" fib() : %d \n fib2() : %d \n" %(t2-t1 , t3-t2))

f = open('d:/t.pl');
ary = f.readlines();
for l in ary:
    printf(l , l);
f.close();
