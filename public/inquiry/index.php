<?php
//文字コードの設定
mb_language("ja");
mb_internal_encoding("UTF-8");

//POSTで値を受け取る
$name         = htmlspecialchars($_POST["name"]);
$organization = htmlspecialchars($_POST["organization"]);
$address      = htmlspecialchars($_POST["address"]);
$phone        = htmlspecialchars($_POST["phone"]);
$email        = htmlspecialchars($_POST["email"]);
$body         = htmlspecialchars($_POST["body"]); //お問合せの本文
$submit       = htmlspecialchars($_POST["submit"]); //送信ボタンの値

//入力内容のチェック
$error=false;
$name_error=false;
$email_error=false;
$body_error=false;
if ($name == "") {
	$name_error=true;
	$error=true;
}
if (!preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $email)) {
	$email_error=true;
	$error=true;
}
if ($body == "") {
	$body_error=true;
	$error=true;
}

if ($submit == "お問合せ送信" && $error != true) {
	//フォームの内容に問題がなく、メールを送信する場合の処理

	//Qdmailを使用 http://hal456.net/qdmail/
	//Qdsmtpを使用 http://hal456.net/qdsmtp/

	require_once('qdmail.php');
	$mail = & new Qdmail();
	$mail -> smtp(true);

	//SMTPサーバの設定
	$param = array(
/*
		'host'=>'neon.di.aomori-u.ac.jp', //SMTPサーバ
		'port'=>'25', //ポート番号
		'from'=>'kokubo@aomori-u.ac.jp', //実際にはReturn-path:
		'protocol'=>'SMTP', //SMTP、SMTP_AUTH、POP_BEFOREなど
*/
		'host'=>'mail.balantec.co.jp', //SMTPサーバ
		'port'=>'587', //ポート番号
		'from'=>'k_sasaki@balantec.co.jp', //実際にはReturn-path:
		'protocol'=>'SMTP_AUTH', //SMTP、SMTP_AUTH、POP_BEFOREなど
		'user'=>'balantec', //ユーザID
		'pass'=>'ye6tHa8a', //認証パスワード
	);
	$mail -> smtpServer($param);

	//メール本文
	$message = <<< MESSAGES
※このメールは自動返信プログラムにより送信されたものです。

　お問合せいただき、どうもありがとうございます。

　デジタルアーカイブあおもりのページ
( http://www.balantec.co.jp/daa/inquiry.html )より、
以下の内容でお問合せをいただきました。

============================================================
お名前: $name
------------------------------------------------------------
ご所属: $organization
------------------------------------------------------------
ご連絡先住所:
$address
------------------------------------------------------------
お電話番号: $phone
------------------------------------------------------------
メールアドレス: $email
------------------------------------------------------------
お問合せ内容:
$body
============================================================

　後日、改めて、メールにてご連絡申し上げますので、しばらく
お待ちください。

　なお、この内容にお心当たりのない場合、お手数ですが、
株式会社バランテック 佐々木勝彦( k_sasaki@balantec.co.jp )
まで、お知らせください。

--
株式会社　バランテック
営業部　佐々木勝彦
〒030-0823 青森県青森市橋本2丁目19番21号
TEL: 017-723-4640 / FAX 017-723-2645
Mail: k_sasaki@balantec.co.jp
--
MESSAGES;

	//メールの各種情報の設定
	$mail ->subject('[デジタルアーカイブあおもり]自動返信メール');
/*
	$mail ->from('kokubo@aomori-u.ac.jp', 'デジタルアーカイブあおもり');
*/
	$mail ->from('k_sasaki@balantec.co.jp', 'デジタルアーカイブあおもり');
	$mail ->text($message);

	//お問合せした人にメール送信
	$mail ->to($email);
	$return_flag = $mail ->send();

	//デジタルアーカイブあおもりにメール送信
/*
	$mail ->to('kokubo@aomori-u.ac.jp');
*/
	$mail ->to('k_sasaki@balantec.co.jp');
	$return_flag = $mail ->send();

	//送信完了ページの表示
	include('complete.html.php');
} else {
	//フォームの内容の確認、あるいは内容に問題がある場合の処理
	//内容確認ページの表示
	include('inquiry.html.php');
}
?>
