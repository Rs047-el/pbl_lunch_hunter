<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="kuchokomi">
        <h1>口コミ個別表示</h1>
        <button>戻る</button>
        <button popovertarget="confirm">通報</button>
        <div id="confirm" popover>
            <div>通報理由</div>
            <div>どちらか一つを選択してください。</div>
            <div class="pop-btn-area">
                <div>
                    <label>
                        <input type="radio">写真
                    </label>
                    <label>
                        <input type="radio">コメント
                    </label>
                </div>
                <div>本当に通報しますか。</div>    
                <button onclick="location.href='report.php?id=1'">yes</butto>
                <button popovertarget="confirm" popovertargetaction="hide">no</button>
            </div>
        </div>
    </div>
    <div>
        <h2>アカウント名</h2>
        <div>★★★★</div>
    </div>
    <div class="komennto">
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <img src="" alt="未登録">
        <img src="" alt="未登録">
        <img src="" alt="未登録">
    </div>
    <button>ひとつ前へ</button>
    <button>次へ</button>
</body>
</html>