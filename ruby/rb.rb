#! /usr/bin/ruby 
f=File.new('./s.txt','r');
sum=0;
f.each{|l|sum=l.to_i+sum;};
print sum;
