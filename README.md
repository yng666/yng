# YngPHP 框架
基于PHP7.3+开发

## 安装所需环境

php扩展:
```sh
php_mbstring

```


# 配置伪静态
```shell
# apache
<IfModule mod_rewrite.c>
	Options +FollowSymlinks -Multiviews
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
</IfModule>

# nginx
location / {
    if (!-e $request_filename) {
        rewrite ^(.*)$ /index.php?s=$1 last;
        break;
    }
}
```


#### 安装教程
```sh
composer create-project yng/yng projectname


# 安装dev版本
composer 
composer create-project --stability=dev yng/yng projectname
```
