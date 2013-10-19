<?php
/**
 * Elgg contact plugin language pack
 *
 * @package ElggContact
 */

$japanese = array(

	'contact:us' => 'お問い合わせ',
	'contact:register' => '会員登録申請',
	'contact:job' => 'エントリー申請',
	
	// fields 
	// common
	'contact:require' => '必須項目',
	'contact:name' => 'お名前',
	'contact:email' => 'メールアドレス',
	'contact:phone' => '電話番号',
	'contact:zip' => '郵便番号',
	'contact:state' => '都道府県',
	'contact:address' => '住所',
	'contact:address2' => '建物',
	'contact:antispam' => 'SPAM対策',
	'contact:question' => '自動登録を防止するため、下の質問に「ひらがな」で答えてください。',
	// contact us
	'contact:kind' => 'お問い合わせ種別',
	'contact:message' => 'お問い合わせ内容',
	'contact:send' => '送信',
	// register
	'contact:account' => 'ログイン名',
	'contact:password' => 'パスワード',
	'contact:repassword' => 'パスワード（再入力）',
	'contact:introduction' => '自己紹介',
	'contact:regist' => '申請',
	// job
	'contact:jobname' => '仕事種別',
	'contact:pcmail' => 'メールアドレス（携帯メール不可）',
	'contact:mobile' => '携帯電話',
	'contact:skill' => '保有資格',
	'contact:comment' => '備考',
	// thankyou message
	'contact:thanks_us' => 'お問い合わせ、ありがとうございました。',
	'contact:thanks_register' => '会員登録申請を受け付けました。',
	'contact:thanks_job' => 'エントリーを受け付けました。',
	
	// validation error message
	'contact:error:no_name' => '名前を入力してください。',
	'contact:error:no_mail' => 'メールアドレスを入力してください。',
	'contact:error:not_mail' => 'メールアドレスの形式が間違っています。',
	'contact:error:no_phone' => '電話番号を入力してください。',
	'contact:error:no_password' => 'パスワードを入力してください。',
	'contact:error:correct_password' => '再入力したパスワードが一致しません。',
	'contact:error:no_zip' => '郵便番号を入力してください。',
	'contact:error:no_address' => '住所を入力してください。',
	'contact:error:no_antispam' => 'SPAM対策の質問に回答してください。',
	'contact:error:failed_spam' => 'SPAM対策の解答が適切ではありません。',
	'contact:error:no_account' => 'ログイン名を入力してください。',
);

add_translation("ja", $japanese);
