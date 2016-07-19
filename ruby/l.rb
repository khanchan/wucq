hash = { "key1" => "val1", "key2" => "val2" }
#string = ""
#hash.each { |k,v| string << "#{k} is #{v}\n" }
#puts string
string = ""
hash.each { |k,v| string << k << " is " << v << "\n" }
puts string;

3.upto(8)do |i| puts i ; end;
