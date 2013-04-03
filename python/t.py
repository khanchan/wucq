
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
