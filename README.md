# CakePHP

[![Latest Stable Version](https://poser.pugx.org/cakephp/cakephp/v/stable.svg)](https://packagist.org/packages/cakephp/cakephp)
[![License](https://poser.pugx.org/cakephp/cakephp/license.svg)](https://packagist.org/packages/cakephp/cakephp)
[![Bake Status](https://secure.travis-ci.org/cakephp/cakephp.png?branch=master)](https://travis-ci.org/cakephp/cakephp)
[![Code consistency](https://squizlabs.github.io/PHP_CodeSniffer/analysis/cakephp/cakephp/grade.svg)](https://squizlabs.github.io/PHP_CodeSniffer/analysis/cakephp/cakephp/)

CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.
Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.


## Some Handy Links

[CakePHP](https://cakephp.org) - The rapid development PHP framework

[CookBook](https://book.cakephp.org) - THE CakePHP user documentation; start learning here!

[API](https://api.cakephp.org) - A reference to CakePHP's classes

[Plugins](https://plugins.cakephp.org) - A repository of extensions to the framework

[The Bakery](https://bakery.cakephp.org) - Tips, tutorials and articles

[Community Center](https://community.cakephp.org) - A source for everything community related

[Training](https://training.cakephp.org) - Join a live session and get skilled with the framework

[CakeFest](https://cakefest.org) - Don't miss our annual CakePHP conference

[Cake Software Foundation](https://cakefoundation.org) - Promoting development related to CakePHP


## Get Support!

[#cakephp](https://webchat.freenode.net/?channels=#cakephp) on irc.freenode.net - Come chat with us, we have cake

[Google Group](https://groups.google.com/group/cake-php) - Community mailing list and forum

[GitHub Issues](https://github.com/cakephp/cakephp/issues) - Got issues? Please tell us!

[Roadmaps](https://github.com/cakephp/cakephp/wiki#roadmaps) - Want to contribute? Get involved!


## Contributing

[CONTRIBUTING.md](CONTRIBUTING.md) - Quick pointers for contributing to the CakePHP project

[CookBook "Contributing" Section (2.x)](https://book.cakephp.org/2.0/en/contributing.html) [(3.x)](https://book.cakephp.org/3.0/en/contributing.html) - Version-specific details about contributing to the project
# cakeblog
■ 環境設定
- Vagrant+VirtualBox
- CentOS 7.2以降
- Apache2.4
  -- VirtualHostの設定（http://blog.dev）
- MySQL5.7
- PHP5.6（7系にするか考え中）
- Git（最新）
- SSHでログインできるようにアカウントを追加

■ CakePHP チュートリアル
http://book.cakephp.org/2.0/ja/tutorials-and-examples.html

■ CakePHP カスタマイズ
categories 1-多 posts
tags 多-多 tags
images 多 - 1 posts

■ CakePHP プラグイン：

①Search Pluginでの検索。（https://github.com/CakeDC/search
- カテゴリ
- タイトル
- タグ　
から検索

②Upload Plugin でpostsに画像を追加できるようにする。（https://github.com/josegonzalez/cakephp-upload/tree/2.x

■ Bootstrap4の導入（参考：http://getbootstrap.com/）（こんな感じの見た目に：http://getbootstrap.com/examples/blog/

■ JQuery チュートリアル（参考：http://www.w3schools.com/jquery/
- ヘッダにボタン追加して、押下すると検索が開く
- 画像をクリックするとポップアップ
- ポップアップしている画像をスライド（こんな感じ：http://webkaru.net/jquery-plugin/sources/lightbox2/demo.html
- 市区町村を郵便番号で検索してinputタグに挿入する
- データを入れ替える
