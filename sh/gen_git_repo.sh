#! /bin/sh

#### 这里就是版本库的名称
sub="empty"
read -p "输入版本名称 ，[输入的名称].busionline.com : " word
if  [ ! -n "$word" ] ;then
    echo "你输入的版本库名称不合法"
    exit 1;
else
    echo "版本库名称为: $word 你的clone地址为git@git.busionline.com:/$word.busionline.com.git"
fi
sub="$word"
repo="$sub.busionline.com"

#me=$(whoami);
#if [ $me = 'git' ]
#then 
	#echo "running .... ... ";
#else
	#echo "sorry this script only for user [git]  you are ' $me '  ";
#	exit 1;
#fi

mkdir -p "/Data/www/$repo" && chown git:web "/Data/www/$repo"

cd ~git/repositories/

mkdir -p "$repo.git" && cd "$repo.git" && git init --bare
echo "mkdir $repo [ok]";

cp -a ~git/repositories/chuanke.busionline.com.git/gl-conf . && sed -i "s/chuanke.busionline.com/$sub\.busionline\.com/" gl-conf
cp -a ~git/repositories/chuanke.busionline.com.git/hooks/post-receive ./hooks && sed -i "s/chuanke.busionline.com/$sub\.busionline\.com/" ./hooks/post-receive 
cp -a /Data/apps/nginx/conf/vhost/chuanke.busionline.com.conf  "/Data/apps/nginx/conf/vhost/$repo.conf" 
sed -i "s/chuanke.busionline.com/$sub\.busionline\.com/g" "/Data/apps/nginx/conf/vhost/$repo.conf"

echo "cp gl-conf file [ok]";
echo "cp hooks/post-receive file [ok]";

cat <<EOF >> ~git/.gitolite/conf/gitolite.conf

repo $repo
    RW+     =   @all
EOF

echo 'grant privileges [ok]';
sed -i "3a    '$repo' => 1 ," ~git/.gitolite/conf/gitolite.conf-compiled.pm
chown -R git:web "/home/git/repositories/$repo.git"
echo "版本库名称为: $word 你的clone地址为git@git.busionline.com:/$word.busionline.com.git"
/usr/sbin/nginx -t && /usr/sbin/nginx -s reload
