<?php
/**
 * Likes English language file
 *
 * @version 1.8.9
 * @update 2012-11-15
 *
 *------------------------------------------------------------------
 * 以下は、このファイルで(Email 通知に使われるメールのサブジェクト)に使われるキー名です。
 * 必要に応じて内容を書き換えて使用すると便利です。
 *
 * likes:notifications:subject
 *      「like」マークをつけた時に送信されます
 *
 * 例）
 *'likes:notifications:subject' => '【Elgg研究会】%s さんは、あなたの投稿 「 %s 」 に"Like"を付けました',
 *
 *
 *ちなみに、コアモジュールのうち、Email通知が定義されているファイルは、
 *
 *./mod/likes/languages/ja.php
 *./mod/groups/languages/ja.php
 *./mod/invitefriends/languages/ja.php
 *./mod/uservalidationbyemail/languages/ja.php
 *./mod/messageboard/languages/ja.php
 *./mod/messages/languages/ja.php
 *./mod/thewire/languages/ja.php
 *./languages/ja.php
 *
 *です。
 *
 */

$japanese = array(
	'likes:this' => '「いいね！」にしました',
	'likes:deleted' => 'あなたの「いいね！」を削除しました',
	'likes:see' => '「いいね！」を押した人',
	'likes:remove' => '「いいね！」を取り消す',
	'likes:notdeleted' => 'あなたの「いいね！」を削除する際に問題が発生しました。',
	'likes:likes' => 'あなたはこれに「いいね！」をしました',
	'likes:failure' => 'これに「いいね！」をする際に問題が発生しました。',
	'likes:alreadyliked' => 'あなたはすでにこれに対して「いいね！」と言っています。',
	'likes:notfound' => 'あなたが「いいね！」をする対象が見つかりませんでした。',
	'likes:likethis' => 'Like this',
	'likes:userlikedthis' => 'いいね！%s件',
	'likes:userslikedthis' => 'いいね！%s件',
	'likes:river:annotate' => 'いいね！',
	'likes:delete:confirm' => '「いいね！」を取り消してもよろしいですか？',

	'river:likes' => 'いいね！ %s %s',

	// notifications. yikes.
	'likes:notifications:subject' => '%s さんは、あなたの投稿 「 %s 」 に"いいね！"しました',
	'likes:notifications:body' =>
'%1$s さん、

%2$s さんがあなたの %4$s への投稿 「 %3$s 」 に"いいね！"しました。

あなたの投稿を見るには:

%5$s

%2$s さんのプロフィールを見るには:

%6$s

%4$s
',
	
);

add_translation('ja', $japanese);
