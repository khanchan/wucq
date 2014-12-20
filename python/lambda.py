

exp = lambda a : a<2 and 1 or exp(a)+exp(a-1);

print(exp(11));
