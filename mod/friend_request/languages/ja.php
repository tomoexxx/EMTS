<?php
	$japanese = array(
		'friend_request' => "Friend Request",
		'friend_request:menu' => "友達リクエスト",
		'friend_request:title' => "友達リクエスト: %s",
	
		'friend_request:new' => "New friend request",
		
		'friend_request:friend:add:pending' => "受信した友達リクエスト",
		
		'friend_request:newfriend:subject' => "%s さんから友達リクエストが届いています！",
		'friend_request:newfriend:body' => "%s さんから友達リクエストが届いています。
ログインして友達リクエストを確認してください。

こちらで届いている友達リクエストを確認することができます:
%s

リンクをクリックする前にサイトにログインしてください。
ログイン前にクリックした場合は、ログインページにリダイレクトされます。

※このメールには返信しないでください。",
		
		// Actions
		// Add request
		'friend_request:add:failure' => "システムエラーが発生したため、リクエストを送信できませんでした。申し訳ありませんが、もう一度行ってください。",
		'friend_request:add:successful' => "%s さんに友達リクエストを送信しました。友達リストに表示されるには、友達リクエストが承認される必要があります。",
		'friend_request:add:exists' => "既に %s さんに友達リクエストを送信しています。",
		
		// Approve request
		'friend_request:approve' => "承認",
		'friend_request:approve:subject' => "%s さんが友達リクエストを承認しました",
		'friend_request:approve:message' => "%s さん

%sさんが、あなたの友達リクエストを承認し、友達になりました。",
		'friend_request:approve:successful' => "%s さんと友達になりました。",
		'friend_request:approve:fail' => "%s さんとの友達処理中にエラーが発生しました。",
	
		// Decline request
		'friend_request:decline' => "拒否",
		'friend_request:decline:subject' => "%s さんが友達リクエストを拒否しました",
		'friend_request:decline:message' => "%s さん

%sさんが、あなたの友達リクエストを拒否しました。",
		'friend_request:decline:success' => "友達リクエストを拒否しました。",
		'friend_request:decline:fail' => "友達リクエストの拒否処理中にエラーが発生しました。もう一度行ってください。",
		
		// Revoke request
		'friend_request:revoke' => "取消",
		'friend_request:revoke:success' => "友達リクエストを取り消しました。",
		'friend_request:revoke:fail' => "友達リクエストの取消処理中にエラーが発生しました。もう一度行ってください。",
	
		// Views
		// Received
		'friend_request:received:title' => "受信している友達リクエスト",
		'friend_request:received:none' => "受信しているリクエストはありません。",
	
		// Sent
		'friend_request:sent:title' => "送信している友達リクエスト",
		'friend_request:sent:none' => "承認待ちの送信リクエストはありません。",
	);
					
	add_translation("ja", $japanese);
