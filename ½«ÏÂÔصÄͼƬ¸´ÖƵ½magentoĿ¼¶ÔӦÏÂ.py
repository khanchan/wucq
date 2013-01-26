import os
import sys
import shutil
from data import picURL
p=picURL.pics;

ds = "E:\phpnow\htdocs\media\tmp\catalog\product\\"

idx=1;
for r in p:

    f=os.path.split(r[1])[1];
    src="./images/"+str(r[0])+'/'+f;
    dst='E:\\phpnow\\htdocs\\media\\tmp\\catalog\\product\\'


    if not os.path.isdir(dst+f[0]):
        os.mkdir(dst+f[0])
    dst += f[0]+'\\'
    if not os.path.isdir(dst+f[1]):
        os.mkdir(dst+f[1])
    dst += f[1]+'\\'
    if not os.path.isfile(dst+f):
        shutil.copyfile(src , dst+f);
        #print "%s => %s "%(src , dst+f);
        #break;
        print "%d : copy file %s to %s"%(idx , src , dst+f)
        idx += 1;

