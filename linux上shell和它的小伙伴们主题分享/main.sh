
find /www/website \( \( -size +10M -o -size -1k \) -a -name  "*.jpg" \) -exec du -sh {} \; > /tmp/_t

wget -r --no-parent  http://www.hzwotu.com/ -P ~

echo >/dev/tcp/8.8.8.8/53 && echo "open"

history | awk '{CMD[$2]++;count++;}END { for (a in CMD)print CMD[a] " " CMD[a]/count*100 "% " a;}' | grep -v "./" | column -c3 -s " " -t | sort -nr | nl | head -n10


lsof -i:80
