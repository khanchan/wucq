import urllib
import base64
import rsa
import binascii
postPara = {
        'entry': 'weibo',
        'gateway': '1',
        'from': '',
        'savestate': '7',
        'userticket': '1',
        'ssosimplelogin': '1',
        'vsnf': '1',
        'vsnval': '',
        'su': encodedUserName,
        'service': 'miniblog',
        'servertime': serverTime,
        'nonce': nonce,
        'pwencode': 'rsa2',
        'sp': encodedPassWord,
        'encoding': 'UTF-8',
        'prelt': '115',
        'rsakv': rsakv,     
        'url': 'http://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack',
        'returntype': 'META'
}
postData = urllib.urlencode(postPara)#网络编码
print(postData);
