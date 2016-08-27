all : main
	g++ -o main ./util/wcq.o main.cpp

main: ./util/wcq.o

test:
	./main

wcq.o : include/wcq.h util/wcq.cpp
	g++ -c -o util/wcq.o util/wcq.cpp

clean:
	find . -type f \( -name '*.exe' -o -name '*.o' \) -exec rm -f {} \;
