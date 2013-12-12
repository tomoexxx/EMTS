<?php
/**
 * Creator role plugin language pack
 *
 */

$japanese = array(
	'roles_creators:role:title' => '作家・ショップ',
	
	// Menu for Creators
	'roles_creators:menu:items' => '作品',
	'roles_creators:menu:event' => 'イベント',
	'roles_creators:menu:blog' => 'ブログ',
	'roles_creators:menu:pages' => 'トップページ',
	'roles_creators:menu:profile' => 'プロフィール',
	
	// Dashboard for Creators
	'roles_creators:timeline' => 'タイムライン',
	
	// Items function for Creators
	'roles_creators:items:title' => '作品',
	'roles_creators:items:themelist' => 'テーマ一覧',
	'roles_creators:items:edittheme' => 'テーマ作成',
	'roles_creators:items:regitems' => '作品登録',
	'roles_creators:items:sort' => '並び替え',
	'roles_creators:uploader:basic' => '1回で10個（サイズ制限：%s MB/枚）までの作品画像をアップロードできます。アップロードする画像を選び終わった後、次のページで作品のタイトルと説明を入力することができます。',
	'roles_creators:sort:instruct' => 'テーマ内の作品画像をドラッグ＆ドロップで並び替えができます。終了時には保存ボタンを押してください。',
	'roles_creators:sort:no_images' => '並び替えを行う作品画像がありません。上のリンクから作品画像をアップロードしてください。',
	'roles_creators:album_select' => '作品画像を登録するテーマを選択してください。あるいは、新しくテーマを作成してください。',
	'roles_creators:sort' => 'テーマ「%s」の並び替え',
	'roles_creators:items:edit' => '作品情報編集',
	'roles_creators:items:regist' => '作品情報登録',
	'roles_creators:items:delete' => '作品削除',
	'roles_creators:items:deltheme' => 'テーマ削除',
	
	// Events for Creators
	'roles_creators:event:title' => 'イベント',
	'roles_creators:event:list' => 'イベント一覧',
	'roles_creators:event:edit' => 'イベント登録',
	
	// Blog for Creators
	'roles_creators:blog:title' => 'ブログ',
	'roles_creators:blog:edit' => 'ブログ投稿',
	'roles_creators:blog:archive' => '過去の記事',
	
	// Pages for Creators
	'roles_creators:pages:title' => 'トップページ',
	'roles_creators:pages:edit' => 'トップページ編集',
	'roles_creators:pages:add' => 'トップページ追加',
	
	// Profile for Creators
	'roles_creators:profile:title' => 'プロフィール',
	'roles_creators:profile:edit' => '編集',
	'roles_creators:profile:avator' => 'アバター',
	
	// Creators Menu for Users
	'roles_creators:users:space' => '作家広場',
	'roles_creators:users:whatsnew' => '新着情報',
	'roles_creators:users:creators' => '作家一覧',
	'roles_creators:users:back' => '戻る',
	
	// Creators Gadgets for Guests
	'roles_creators:guests:creators' => '新着情報：作家',
	'roles_creators:guests:events' => '新着情報：イベント',
	'roles_creators:guests:blogs' => '新着情報：ブログ',
	
	// Error Message
	'roles_creators:notuse' => 'この機能は利用できません。',
	'roles_creators:notheme' => 'まだテーマは作成されていません。',
	'roles_creators:noitem' => 'まだ作品は登録されていません。',
	'roles_creators:noevent' => 'まだイベントは登録されていません。',
	'roles_creators:noblog' => 'まだブログは投稿されていません。',
	'roles_creators:nopage' => 'まだトップページが作成されていません。',
);

add_translation("ja", $japanese);
