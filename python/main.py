from testdata.my_list import *
import testdata.my_list;
from testdata.my_dict import *
from wcq_lib.info import *
from string import *
from sys import *
from socket import gethostname;

#print(gethostname());


#print(path);

#print(my_list);
#print(my_dict);
#print(my_list * 4);
tmp_list = [ x * 1.5 for x in my_list]
#print tmp_list;
#tmp_dict = ["%s=%s" % (k, v) for k, v in my_dict.items()]
#tmp_dict = ["%s=|" % (k) for k in my_dict.keys()]
tmp_dict = ["%s=|" % (v) for v in my_dict.values()]
#print(tmp_dict);

#info(my_list);
l = [];
#print dir(len);

#print('aaaa')

list = [ x*2 for x in range(10) if x%2 ]
print(list);

list_new = list[:]
print(list_new)
print(id(list) , id(list_new))
