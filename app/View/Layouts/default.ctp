<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<title>
		<?php echo __('ファンチームブログ'); ?>
	</title>
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<style>

	#contents {
		z-index: 0;
		font-size: 16px;
	}
	.page-txt {
		margin: 30px 0 0;
		height: 2000px;
	}
	#modal-open {
		color: #cc0000;
	}
	/* モーダル コンテンツエリア */
	#modal-main {
		display: none;
		width: 500px;
		height: 300px;
		margin: 0;
		padding: 0;
		background-color: #ffffff;
		color: #666666;
		position:fixed;
		z-index: 2;
	}
	/* モーダル 背景エリア */
	#modal-bg {
		display:none;
		width:100%;
		height:100%;
		background-color: rgba(0,0,0,0.5);
		position:fixed;
		top:0;
		left:0;
		z-index: 1;
	}

	.row {
		text-align: center;
	}
	a {
		color: #337ab7;
		text-decoration: none;
		text-align: center;

	}
	h1 {
		font-size:60px;
		font-weight:normal;
		font-style:italic;
		text-align: left;
		color: #010101;/*文字色*/
		background: #eaf3ff;/*背景色*/
		border-bottom: solid 3px #516ab6;/*下線*/
	}
	h2 {
		font-size:35px;
		font-weight:normal;
		font-style:italic;
	}
	body {
		padding: 70px 0 0 0;
	}
	p {
		font-size: 16px;
	}
	th {
		font-size:20px;
		color: #eee;
	}
	tr {

	}
	td {
		font-size: 16px;
	}
	tbody tr:nth-child(odd) {
		background: #eee;
	}
	thead {
		background: #483d8b;
	}
	dt {
		font-size: 24px;
	}
	dd {
		font-size:16px;
	}
	legend {
		font-size:64px;
	}
	#flashMessage{
		font-size:30px;
		background: #66FFFF;
		text-align:center;
	}
	.form-group{
		font-size: 18px;
	}
	/* 画スライドショー*/
	.img{
		padding: 2px 0 2px 0;
	}
	.largeImg{
		display:none;
	}
	.col-md-3{

	}

	#back-curtain{
		background: rgba(0, 0, 0, 0.8);
		display: none;
		position: absolute;
		left: 0;
		top:0;
		height: 100%;
		width: 100%;
	}
	#buttonR{
		display:none;
		width: 100px;
	}
	#buttonL{
		display:none;
	}
	/* actionのナブ*/
	.action {

	}
	.btn-group {
		display: inline-block;
		position: relative;
		padding: 0.5em 1.4em;
		text-decoration: none;
		background: #7239ce;/*ボタン色*/
		color: #FFF;
		border-bottom: solid 5px #7239ce;
		border-right: solid 5px #7239ce;
	}
	.btn-group:active {
		border-bottom: 2px solid #7239ce;
		box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
	}
	.btn btn-primary btn-lg {
		color: #7239ce;
	}
	.square_btn{
		width:160px;
		font-size:20px;
		font-weight:bold;
		text-decoration:none;
		display:block;
		text-align:center;
		padding:0px 0 10px;
		color:#0075ff;
		background-color:#ffffff;
		border:1px solid #333;
		border-radius:25px;
	}
	.search{
		display:none;
		background-color:#483d8b;
		color:#FFF;
		border-radius:0;
		padding:30px 20px 10px 20px;
		text-align: center;
	}
	#searchbn{
		color:#000;
	}
	.btn square_btn {
	}
	.toolbr {
	}
	/* グリットシステムの確認、調整*/
	.box{
		text-align: center;
	}
	.starter-template {
		padding: 40px 15px;
		text-align: center;
	}
	.footer{
		border-top: 1px solid black;
		text-align: center;
	}
	.footer > .container{
		padding-bottom: 30px;
		padding-top: 30px;
		text-align: center;
	}
	/* ナビゲーションバー */
	.navbar-custom {
		background-color:#483d8b;
		color:#ffffff;
		border-radius:0;
		padding:0 60px 0 60px;
	}
	/* メニュー文字 */
	.navbar-custom .navbar-nav > li > a {
		color:#fff;
		font-style:italic;
	}
	/* active時の文字色*/
	.navbar-custom .navbar-nav > .active > a {
		color: #ffffff;
		background-color:transparent;
	}
	/* header選択時*/
	.navbar-custom .navbar-nav > li > a:hover,
	.navbar-custom .navbar-nav > li > a:focus,
	.navbar-custom .navbar-nav > .active > a:hover,
	.navbar-custom .navbar-nav > .active > a:focus,
	.navbar-custom .navbar-nav > .open >a {
		box-shadow: 0 15px 30px -5px rgba(0,0,0,.15),0 0 5px rgba(0,0,0,.1);
		transform: translateY(-4px);
		transition: 0.2s;
		background: #fff;
		opacity: 0.5;
	}
	</style>
</head>
<body>
	<?php
    if ($auth) {
        echo 'ログイン'.$auth['username'];
    } else {
        echo '未ログイン';
    }?>
	<a name="TOP"></a>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->fetch('script'); ?>
	<footer class="footer" style="text-align:center">
		<div class="container">
			<a>Built for <a href="http://getbootstrap.com">Blog template built for Bootstrap</a>
			<a href="#TOP">トップに戻る</a>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<?php echo $this->Html->script('bundle'); ?>
</body>
</html>
