# 框架核心

# 关于composer依赖
```ext-json```和```ext-mbstring```放进依赖里,这样您可以将安装说明作为 Composer 包提供, 如果底层系统不满足您的包要求, 安装将失败, 并且用户将收到缺少扩展的警告。

## 主要新特性

* 采用`PHP7`强类型（严格模式）
* 支持更多的`PSR`规范
* 原生多应用支持
* 系统服务注入支持
* ORM作为独立组件使用
* 全新的事件系统
* 模板引擎分离出核心
* 内部功能中间件化
* SESSION机制改进
* 日志多通道支持
* 规范扩展接口
* 更强大的控制台
* 对Swoole以及协程支持改进
* 对IDE更加友好
* 统一和精简大量用法

> YngPHP6.1的运行环境要求PHP7.3，最高兼容PHP8.2

## 安装

```sh
composer create-project yng/yng yng
```

启动服务

```sh
cd tp
php yng run
```

然后就可以在浏览器中访问

```sh
http://localhost:8000
```

如果需要更新框架使用
```sh
composer update yng/framework
```

## 文档

[完全开发手册](https://www.kancloud.cn/manual/thinkphp6_0/content)

## 命名规范

`YngPHP6`遵循PSR-2命名规范和PSR-4自动加载规范。

## 参与开发

直接提交PR或者Issue即可

## 版权信息

YngPHP遵循Apache2开源协议发布，并提供免费使用。

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2006-2021 by YngPHP (http://Yngphp.cn) All rights reserved。

YngPHP® 商标和著作权所有者为YNG。
