#! /usr/bin/python
import sys
import time
import urllib, urllib.parse, urllib.error, urllib.request
# import urllib2

def sendsms(phone="13429109380" , content="helloworld"):
    url = "http://sms.haotingyun.com/v2/sms/single_send.json"
    values = {'apikey':'6516b9381b2dee4283a9d6979aa26540','mobile':phone,b'text':'[%s] %s' % (time.strftime('%Y%m%d %H:%M:%S'),content)}
    user_agent = 'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT)'
    headers = {'User-Agent' : user_agent }
    data = urllib.parse.urlencode(values)
    binary_data = data.encode('utf-8')
    req = urllib.request.Request(url, binary_data)
    response = urllib.request.urlopen(req)
    the_page = response.read()
    print(the_page.decode("utf8")) ### 查看发送是否成功
    print('yes [%s] send to %s'%(content , phone));

def t():
    # response = urllib.request.urlopen('http://www.baidu.com')
    # print(response.read())
    import urllib.request as r
    print(r);



if __name__ == '__main__':
    if len(sys.argv) < 2 :
        # print("input phone nomber and title ");
        #sys.exit();
        pass
    # title = sys.argv.pop();
    # phone = sys.argv.pop();
    sendsms(18858133489 , 'wangyu da shuai ge')
    # sendsms()
    t();
