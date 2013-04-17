#! c:\ruby192\bin\ruby.exe -w -E utf-8
# -*- coding: utf-8 -*-
# 10.times{|i| puts i;}

def fc(n=1)
	if n==1
		1
	else
		n * fc(n-1)
	end
end

=begin 
puts fc(40)
=end
#puts fc()

def case_test(n=20)
	ary = [1..3]
	ary = ['wucq' , 2000] + ary

	n.times{|x|
		i = ary[rand(ary.size())]
		puts i;
		case i
			when 1..10
				puts "number"
			when /\s+/
				puts "string"
			when 2000
				puts "number 2000"
			when ''
				puts "<100>30"
		end;
	}
end

#case_test();

# for loop test
=begin
for num in 1..20
#	puts num * num * num;
end
=end

def repeat(n=10)

	while n >= 0
		yield(n , n*n , n*n*n)
		n -= 1;

	end
end

# repeat(4){|i , x , d|print [i , x , d] , "\r\n" ;}

class Person

	def initialize
		@name='noname_' + rand(100).to_s;
	end
	def getName()

		return [@name ,  __FILE__ , __LINE__];
	end	
end
#me = Person.new
#p me.getName


ary = [];

10.times{|i| ary.push(i*i)}

#p ary;
#File.rename('d:\rb' , 'd:\rb.rb');
#File.open('d:\rb.rb' , 'r'){|f| f.each{|r| p r};}

def quickSort(a)

   return [] if a.empty? #�ݹ���ֹ����

   r , l= a[0..-2].partition { |i| i >= a.last } #������ֳ��������֣�ǰ�沿�־�>=a.last ��һ���־�<a.last��

  quickSort(l) + [ a.last ] + quickSort(r)#�ݹ���������ġ����ߡ��͡��Ұ�ߡ������Һϲ������Ľ����

end

ary=[1 ,2,45,67,3,5435634,5,56,56354,33,6,90 , 3.2];

#puts quickSort(ary);


def qs(a)
	
	return [] if a.empty?
	
	l , r = a[0..-2].partition{|i| i > a.last}
	
	qs(l) + [a.last] + qs(r)
end

#p qs(ary);

#p rand();

def qqs(a)
	return [] if a.empty?

	l , r = a[1..-1].partition {|i| i < a.first}

	qqs(l) + [a.first] + qqs(r)
end
def qss(a)
	qqs(a);
end
#p qqs(ary);

#1.upto(1000){|i| ary[i] = rand()*1000};
#p qqs(ary).join("\r\n");  ## 桔
def fn(a='default' , b)
	"wcq"<<'|'<<a<<'|'<<b;
end

#p fn 'a';

for x in self.private_methods.sort
	#p x;;
end;

#p 'wcq'*3;

#p $0;

def fsn arg1='a' , arg2=2
	p "#{arg1} | #{arg2}"
end;
#
#def f * strs
#	strs.each{|s| p s}
#end
#
#f 1 ,2,3,4,5,6,6,
#
#str = 'wcq';
#str.reverse!;
#p str;

#wcq = STDIN.gets
#
#p wcq;
#p wcq.chop;
#p 'a';
#for i in String.methods
#	p i;
#end

def dp(a , ins=false)
	for x in a.instance_methods(ins).sort
		p x;
	end
end

#dp(Regexp);


#p 10!

#p File.file? "d:/t.rb"

#dp File , true
#(1..5).each {|i| p i}
#(1...5).each {|i| p i}
#def w
#
#	a=23
#end;
#
#w

#('00'..'99').each{|i| p i}

#a=%w|1 2 3 4 5 6 7
#a = [0, 1, 2, 3, 4, 5, 6]
#a.each { |i|
#
#	print i, " " if i == 1 .. i == 5
#}
#
#str = "wuchangqian@gmail.com"
#str =~ %r|qian|
#p $&
#p $`
#p $'

#total = 1;
#
#1.upto(10){
#	|i|
#	total *= i;
#}
#
#p total;
#
#b = [1, 2, 3, 4, 5]
#bm = b.map do |entry|
#	entry * entry
#end
#print bm
#
#def fn_yield(i)
#	p i;
#	yield(i);
#end
#
#fn_yield(4){|i| p i*i};
#def fibonacii(max)
#		f1, f2 = 1, 1
#		while f1 <= max
##			yield f1
#			f1, f2 = f2, f1+f2
#			yield f1
#		end
#end
#
#fibonacii(1000) { |f| print f, " " }
#
#def fn_blk(i , j , &blk)
#	p i + j;
#	blk.call(i , j);
#end
#
#fn_blk(2 , 4){|a,b| p a*b};

#IO.popen("dir" , "r+") {
#	|i| i.puts "wcq";
#}
#
#p 'llll';
#
#def fn(str='')
#	p 'in fn'<<str;
#end
#BEGIN{
#	p 'begin';
##	fn 'begin';
#}
#
#END{
#    fn('end');
#} 

#st = %q{
#        BEGIN {
#            puts "===BEGIN==="
#        }
#}
#
#p st
#

#p RUBY_PLATFORM;
#p RUBY_RELEASE_DATE;

#p __FILE__ , __LINE__;


#p $/;
#p $\;
#
#require 'yaml'
#
#class Person
#    attr_accessor :name , :gender , :age
#    def initialize(name , gender , age)
#        @name   = name
#        @gender = gender
#        @age    = age
#    end
#
#    class Addr
#        @street = " 19 roads";
#        @flow   = " wwww";
#    end
#end
#
#me = Person.new('wuchangqian' , 'male' , 28)
#p me.to_yaml;
#hash = { :name => "wuchangqian" , :sex => 'male' , :email => 'wucq@w.cn' , :ah => { :ah1 => 'ah1111111' , :ah2 => 'ah222222222'}}
#p hash.to_yaml

#arr = %w| aaawwwwbb ccwwwwwbb adllsdkwwwlsdkf asldkfjlwwwsdl dalsdk wwwsldkfjas sdfsdfsda|
#
#p arr.grep /ww+/
#
#w = readline
#
#p w.chomp(/\s|s/)

#f =File.new('c:\windows\system32\drivers\etc\hosts' , 'r')
#
#f.each_with_index{
#    |r , i|
#
#    print i , ' : ' , r;
#}
#
#f.close
#require 'socket'
#
#socket = UDPSocket.new
#socket.bind("127.0.0.1", 12345)
#loop do
#		msg, sender = socket.recvfrom(100)
#		host = sender[3]
#		puts "#{Time.now}: #{host} '#{msg}'"
#end
#
#
#
#require 'socket'
#
#log = UDPSocket.new
#log.connect("127.0.0.1", 12121)
#log.print "Up and Running!"
#log.print "Done!"
#
#p a;

#include ObjectSpace
#a = 12
#b = 456.789
#ObjectSpace.each_object(Numeric) { |x| p x }
#num = 123
#num.methods.each{|m| p m;}
#class TestClass
#	def hello(*args)
#		"Hello " + args.join(' ')
#	end
#end
#
#a = TestClass.new
#puts a.send :hello, "This", "is", "a", "dog!"
#class Test
#	def initialize(var)
#		@var = var
#	end
#	
#	def hello()
#		"Hello, @var = #{@var}"
#	end
#end
#
#k = Test.new(10)
#m = k.method(:hello)
#p m.call   #=> "Hello, @iv = 99"
#
#l = Test.new('Grant')
#m = l.method("hello")
#p m.call   #=> "Hello, @iv = Fred"
#
#class CommandInterpreter
#    def do_2() print "This is 2\n"; end
#	def do_1() print "This is 1\n"; end
#	def do_4() print "This is 4\n"; end
#	def do_3() print "This is 3\n"; end
#   
#	Dispatcher = {
#		?2 => instance_method(:do_2),
#		?1 => instance_method(:do_1),
#		?4 => instance_method(:do_4),
#		?3 => instance_method(:do_3)
#	}
#
#	def interpret(string)
#			string.each_byte {|i| Dispatcher[i.chr].bind(self).call }
#		end
#end
#
##ASSCII
#interpreter = CommandInterpreter.new
#interpreter.interpret('1234')

#
#class Person 
#    def initialize(name , sex , age , email='name@host.com')
#        @name = name
#        @sex  = sex
#        @age  = age
#        @email= email
#    end
#
#    def Person.method_added(name)
##        p " method #{name} added"
#    end
#
#    def get_name
#        @name
#    end
#
#    def get_sex
#        @sex
#    end
#
#    def get_age
#        @age
#    end
#
#    def get_email
#        @email
#    end
#end
#
##begin
##
##f = open('./wcq.wcq' , 'r');
##
##rescue
##f = open(__FILE__)
##
##ensure
##
##f.close
##end
##begin
##raise 'wcq';
##rescue
##    p "error : #{$!}";
##end
##a = 11
##plc = proc{a , b , c = 1 , 2 , 3 ; p a , b , c}
##plc.call
##
##p defined? a
##p a
##def box
##    contents = nil
##    get = proc{contents}
##    set = proc{|n| contents= n}
##    return get , set
#end
#
#reader , writer = box
#
#p writer.call(3)
#p reader.call;
#p reader.call
#
#p self , $
#trap "SIGINT", 'puts "^C was pressed."'
#p 'main thread will sleep 22 seconds , press ^C will not kill thread !! try? ';
#sleep(22);
#p self.class
#p self.class.private_methods.sort

#rice_on_square = 1    
#32.times do |square|    
#	puts "On square #{square + 1} are #{rice_on_square} grain(s)" 
#	rice_on_square *= 2    
#end 
#
#a=1
#b=2
#a,b=b,a
#p a 
#p b
#b='wcq';
#while b != 'yes' do
#	b = gets.chomp
#	p format("   %s " , b);
##	
##end;
#p rand 


### 这里的{}也讲究配对。所以str输出的是:
#
#	BEGIN{
#		p 'wuchangqian';
#	}
str=%q{
	BEGIN{
		p 'wuchangqian';
	}
}

#p Math::PI
#
#w=gets().chomp
#
#puts w
#
#if w=='yes' then
#
#	p 1;
#
#elsif( w == 'no') then
#
#	p 2;
#else
#	p 3;
#end

#self.class.private_methods.each{|m| puts m ; sleep 1}

def my_test(*args)
    
    args.each{|arg| puts(arg , "\n")}

end
BEGIN{
	p 'begin running programe!!! BEGIN block..'
 
}
#my_test((1..10).to_a);

#f = File.open("d:/t.php").each{|line| puts(line*3)}; # 
#f.close
#p  "%.3f , %23.5f" % [ Math::PI , Math::PI]

10.times{|a|puts a ** a}