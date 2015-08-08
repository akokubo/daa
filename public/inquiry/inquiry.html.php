<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
 <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
 <meta name="robots" content="index, follow" />
 <meta http-equiv="Content-Style-Type" content="text/css" />
 <meta http-equiv="Content-Script-Type" content="text/javascript" />
 <link rel="stylesheet" href="/daa/public/stylesheets/import.css" type="text/css" media="screen,tv" />
<!--[if IE 6]>
 <link rel="stylesheet" href="/daa/public/stylesheets/win-ie6.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 7]>
 <link rel="stylesheet" href="/daa/public/stylesheets/win-ie7.css" type="text/css" media="screen" />
<![endif]-->
 <meta name="description" content="デジタルアーカイブあおもりへのお問い合わせ入力内容の確認" />
 <meta name="keywords" content="デジタルアーカイブ,あおもり,お問い合わせ,確認" />
 <title>お問い合わせ入力内容の確認: デジタルアーカイブあおもり</title>
 <link rel="favourites icon" href="/daa/favicon.ico" />
</head>
<body id="inquiry">
<div id="wrapper"><!-- HTML全体 -->
<div id="header" class="cleatfix"><!-- ヘッダ -->
<ul id="courtesy-nav" class="clearfix"><!-- コーテシィナビゲーション -->
<li><a href="/daa/">ホーム</a></li><li><a href="/daa/inquiry.html">お問い合わせ</a></li><li><a href="/daa/sitemap.html">サイトマップ</a></li>
<!-- コーテシィナビゲーションおわり --></ul>
<div id="banner"><!-- バナー -->
<p id="banner-img"></p>
<p id="lead">迫真のデジタル色再現</p>
<h1><a href="/daa/">デジタルアーカイブあおもり</a></h1>
<!-- バナーおわり --></div>
<!-- ヘッダおわり --></div><div id="content" class="clearfix"><!-- コンテンツ領域 -->
<ul id="nav" class="clearfix"><!-- グローバルナビゲーション -->
<li><a href="/daa/">ホーム</a></li><li><a href="/daa/specials/transfer_to_digital_photography.html" title="急がれるデジタル撮影への移行" >特集</a></li><li><a href="/daa/about_us.html" title="組織概要" >組織概要</a></li><li><a href="/daa/services.html" title="サービス内容" >サービス内容</a></li><li><a href="/daa/color_management_technology.html" title="色再現技術" >色再現技術</a></li><li><a href="/daa/join_us.html" title="新連携メンバー募集" >新連携メンバー募集</a></li><!-- グローバルナビゲーションおわり --></ul>
<div class="breadcrumb">
<a href="/daa/" title="ホーム">ホーム</a> <span class="breadcrumb-separator">&gt;</span> 
<a href="/daa/inquiry.html">お問い合わせ</a> <span class="breadcrumb-separator">&gt;</span> 
お問い合わせ入力内容の確認
</div>
<div id="article-wide" class="clearfix"><!-- メインコンテンツ -->
<div id="article-top">
</div>
<div id="article-center">
<h2>お問い合わせ入力内容の確認</h2>
<?php
if($error) {
	echo '<p><span class="notice">注意:</span>入力された内容に不足や不適切な箇所がございます。<span class="notice">※</span>印は入力必須項目です。訂正の上、「確認画面へ」を再度クリックしてください。'."\n";
} else {
	echo '<p>入力内容をご確認ください。この内容でよろしければ、「お問合せ送信」をクリックしてください。</p>'."\n";
	echo '<p><span class="notice">※</span>印は入力必須項目です。</p>'."\n";
}
?>
<form action="/daa/public/inquiry/index.php" method="post">
<table class="table">
<tr>
<th><label for="name">お名前</label><span class="notice">※</span></th>
<td><input type="text" id="name" name="name" size="70" value="<?php echo $name; ?>"<?php if ($name_error) { echo ' class="error"';} ?> /></td>
</tr>
<tr>
<th><label for="organization">ご所属</label></th>
<td><input type="text" id="organization" name="organization" size="70" value="<?php echo $organization; ?>" /></td>
</tr>
<tr>
<th><label for="address">ご連絡先住所</label></th>
<td><textarea id="address" name="address" rows="3" cols="60"><?php echo $address; ?></textarea></td>

</tr>
<tr><th><label for="phone">お電話番号</label></th>
<td><input type="text" id="phone" name="phone" size="70" value="<?php echo $phone; ?>" /></td></tr>
<tr><th><label for="email">メールアドレス</label><span class="notice">※</span></th>
<td><input type="text" id="email" name="email" size="70" value="<?php echo $email; ?>"<?php if ($email_error) { echo ' class="error"';} ?> /></td></tr>
<tr><th><label for="body">お問い合わせ内容<span class="notice">※</span></label></th>
<td><textarea id="body" name="body" rows="10" cols="60"<?php if ($body_error) { echo ' class="error"';} ?>><?php echo $body; ?></textarea>
</td></tr>
<tr><td colspan="2" class="submit"><input type="submit" id="submit" name="submit" value="<?php if($error) { echo '確認画面へ'; } else { echo 'お問合せ送信'; } ?>" /></td></tr>
</table>
</form> 
 

</div>
<div id="article-bottom">
</div>
<!-- メインコンテンツおわり --></div>

<!-- コンテンツ領域おわり --></div>
<div id="footer"><!-- フッタ -->
<p id="copyright">Copyright (C) 2009 Digital Archive Aomori, All Rights Reserved.</p>
<!-- フッタおわり --></div>
<!-- HTML全体おわり --></div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7641751-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
