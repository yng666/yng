YNGPHP 简约框架
===============

## 特性

* 基于PHP`8.0+`开发
* 升级`PSR`依赖


> YNGPHP的运行环境要求PHP8.0.0+
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
composer create-project --stability=dev yng/yng projectname
```


## 参与开发

直接提交PR或者Issue即可