# Vue博客Api项目
这是一个使用Laravel8+php7.4搭建的博客Api项目

## 拉取代码
```
git clone https://github.com/gentlemanwuyu/vueblog-api.git
```

## composer安装扩展包
```
composer install
```

## 配置env文件
需配置数据库、redis、邮件(回复评论时发送邮件用)、钉钉机器人(如果不需要可将`DINGTALK_ENABLED`置为`false`)

## 初始化数据库
```
php artisan blog:install
```
如果需要示例数据，可在后面加上`--seed`

## Nginx配置
```
server {
    listen       80;
    server_name  API项目地址;
    autoindex on;

    root /blog-api/public; # 指向public目录
    #root /usr/local/nginx/html;
    location / {
        index  index.php;
        if (!-f $request_filename){
            rewrite ^(.+)$ /index.php last;
        }
    }

    #php
    location ~ \.php$ {
        # include fastcgi.conf;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
    }
}
```

### API项目请参考[blog](https://github.com/gentlemanwuyu/vueblog)
