<?php

$site = elgg_get_site_entity();
$email = $site->email;
$domain = substr(strstr($email, '@'), 1);

echo "<p><table border=\"2\" cellpadding=\"5\" cellspacing=\"5\" style=\"background-color: #e5ffff;\">";
echo "<tbody><tr><td>";
echo "<span style=\"font-size: small;\"><strong>＜お知らせ＞</strong></span><br>";
echo "新規登録後、入力された電子メールアドレスを確認するために、<strong>" . $email . "</strong> からメールが送信されます。<br>";
echo "「受信拒否機能」が設定されていると、メールを正常に受け取れない可能性がありますので、設定を確認してください。<br>";
echo "「受信拒否機能」が有効である場合は、設定を解除するかドメイン「<strong>" . $domain . "</strong>」の受信許可を設定してください。";
echo "</td></tr></tbody></table></p>";
