<?php

$c_name = get_input('contest_name');

?>

<title>「夏の思い出写真コンテスト」結果発表</title>
<h2><?php echo $c_name; ?></h2>
<img src="/_graphics/contest/contest_bar_result.png">
<p>
「夏の思い出写真コンテスト」へのご応募、ありがとうございました。<br>
約1ヶ月間の応募期間で<b>総数93枚</b>ものご応募があり、非常に心温まる写真、思わず微笑んでしまう写真など会員皆様の思い出が詰まった数多くの応募に感謝いたします。<br>
これらの写真を厳正にプロ写真家に評価してもらい、その結果の発表を行います。
</p>

<img src="/_graphics/contest/contest_bar_prize.png">
<table>
    <tr>
        <td colspan="3"><img src="/_graphics/contest/prize_1st.png"></td>
    </tr>
    <tr>
        <td rowspan="4"><img src="/photos/thumbnail/355/small"></td>
        <td colspan="2" style="padding-left: 1em; font-size: small"><b>「ひいばあちゃんと」</b></td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 1em;">潮見 幸子さん</td>
    </tr>
    <tr>
        <td style="padding-left: 1em;">評価者コメント：</td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 1em;">
        ひいおばあちゃんとお子さまの二人の表情が微笑ましく、仲睦まじさが感じられる写真です。
        </td>
    </tr>
    <tr>
        <td colspan="3"><img src="/_graphics/contest/prize_2nd.png"></td>
    </tr>
    <tr>
        <td rowspan="4"><img src="/photos/thumbnail/315/small"></td>
        <td colspan="2" style="padding-left: 1em; font-size: small;"><b>「僕がおんぶしてあげる」</b></td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 1em;">笹本 奈津紀さん</td>
    </tr>
    <tr>
        <td style="padding-left: 1em;">評価者コメント：</td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 1em;">
        二人の見つめあう表情が可愛くて、ナイスシャッターチャンスです。
        </td>
    </tr>
    <tr>
        <td rowspan="4"><img src="/photos/thumbnail/313/small"></td>
        <td colspan="2" style="padding-left: 1em; font-size: small;"><b>「ハチさんお昼寝中」</b></td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 1em;">島本 朋代さん</td>
    </tr>
    <tr>
        <td style="padding-left: 1em;">評価者コメント：</td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 1em;">
        ミツバチの服が可愛く、二人の寝顔に癒されます。
        </td>
    </tr>
    <tr>
        <td colspan="3"><img src="/_graphics/contest/prize_3rd.png"></td>
    </tr>
    <tr>
        <td><img src="/photos/thumbnail/329/small"></td>
        <td style="padding-left: 1em;"><img src="/photos/thumbnail/329/small"></td>
        <td style="padding-left: 1em;"><img src="/photos/thumbnail/329/small"></td>
    </tr>
    <tr>
        <td style="font-size: small;"><b>「熱いっ！」</b></td>
        <td style="padding-left: 1em; font-size: small;"><b>「初めてのプール」</b></td>
        <td style="padding-left: 1em; font-size: samll;"><b>「☆コーンだいすきぃ☆」</b></td>
    </tr>
    <tr>
        <td>中島智子さん</td>
        <td style="padding-left: 1em;">衣里さん</td>
        <td style="padding-left: 1em;">津村智亜季さん</td>
    </tr>
</table><br>

<img src="/_graphics/contest/contest_bar_evaluator.png">
<?php include $CONFIG->pluginspath . 'customhtml/views/default/contest/akaike_profile.php'; ?>
<br>

<img src="/_graphics/contest/contest_bar_delivery.png">
<p>
受賞された方には事務局よりご連絡させていただき、後日商品を発送させていただきます。<br>
賞品リストの中から最優秀賞は3点、優秀賞は2点、入賞は1点を贈呈いたします。
<ul>
    <li>大サイズ（半切）プリント【フレーム付】</li>
    <li>ポスタータイプカレンダー（A2サイズ）</li>
    <li>マグカップ</li>
    <li>トートバッグ</li>
    <li>タペストリー</li>
</ul>
※賞品には受賞写真、応募写真をプリントします。
※賞品の配送は、<b>10月中旬頃</b>を予定しております。
</p>
<?php include $CONFIG->pluginspath . 'customhtml/views/default/contest/footer.php'; ?>
