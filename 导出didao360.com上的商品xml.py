# -*- coding: utf-8 -*-
import os
import sys
import time
import pycurl
import random
import urllib
import StringIO
###

config={
    'cookiefile'  : './data/cookies.txt'
    ,'useragent'  : "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.215 Safari/535.1"
}
def curl_progress(download_t, download_d, upload_t, upload_d):
    return;
    print "Total to download", download_t
    print "Total downloaded", download_d
    print "Total to upload", upload_t
    print "Total uploaded", upload_d

def curl_header(buf):
    return;
    print "in bug"
    #time.sleep(1);
    f = open('./header.txt' , 'a+');
    f.write(buf);
    f.close();
    
def curl_debug(debug_type, debug_msg):
    return;
    print "debug(%d): %s" % (debug_type, debug_msg)

class FileReader:
    def __init__(self, fp):
        self.fp = fp
    def read_callback(self, size):
        print size;
        return self.fp.read(size)

def get_url(url):
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

c= get_url('http://www.didaozhan.com/emaite/get_goods.php');

fn = './data/product-didaozhan.com.xml';

f=open(fn, 'wb+')

f.write(c);

f.close();

print "已经下载商品文件 ： %s"%fn;

########################################################

c= get_url('http://www.didaozhan.com/emaite/get_goods.php?pic=1&type=py');

fn = './data/picURL.py';

f=open(fn, 'wb+')

f.write(c);

f.close();

print "已经下载图片路径文件 ： %s"%fn;
########################################################

c= get_url('http://www.didaozhan.com/emaite/get_goods.php?pic=1&type=php');

fn = './data/picURL.php';

f=open(fn, 'wb+')

f.write(c);

f.close();

print "已经下载图片路径文件 ： %s"%fn;





