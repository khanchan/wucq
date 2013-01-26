# -*- coding: cp936 -*-
import os
#import inc
import sys
import time
import pycurl
import random
import urllib
import StringIO
from data.picURL import pics as p

config={
    'cookiefile'  : './data/cookies.txt'
    ,'useragent'  : "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.215 Safari/535.1"
}

def getpic(url):
    c = pycurl.Curl()
    values = []
    c.fp = StringIO.StringIO() #shokwave Flash
    #c.setopt();
    c.setopt(pycurl.COOKIEFILE, config['cookiefile']) ## Netscape格式的cookie文件名称。
    c.setopt(pycurl.COOKIEJAR,  config['cookiefile']) ## 连接关闭以后，存放cookie信息的文件名称
    c.setopt(pycurl.WRITEFUNCTION, c.fp.write) ## write 回调函数
    #c.setopt(pycurl.WRITEFUNCTION, f.write) ## write 回调函数
    c.setopt(c.URL, url)
    c.setopt(pycurl.USERAGENT, config['useragent']) ## 模拟客户端浏览器
    #c.setopt(c.HTTPPOST, values)
    c.perform()
    c.close()
    return c.fp.getvalue()

def mk_subdir(p):
    for r in p:
        dir_p = './images/' + r[0];
        if(not os.path.isdir(dir_p)):
            os.mkdir(dir_p); 
mk_subdir(p);
i=1
for r in p:
    #break;
    f = os.path.split(r[1])[1]
    
    img_file = './images/' + r[0] + '/' + f
    
    if os.path.isfile(img_file): ### 本地存在就不去下载了
        print '%d : file %s exist!!'%( i , img_file)
    else:  ### 下载文件保存到本地
        h = open(img_file , 'wb');
        h.write(getpic(r[1]));
        h.close();
        print '%d : geting file %s write to %s'%( i , r[1] , img_file)

    i += 1;
    #break
    
