<?php
require_once('model.php');
$model = new User();

// ユーザIDをGETで受け取る
$user_id = $_GET['user_id'] ?? null;
$user = $model->getDetail("user_id='" . $user_id . "'");

// 更新処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $data = [
        'user_name' => $_POST['user_name'],
        'user_kana' => $_POST['user_kana']
    ];
    $where = "user_id='" . $user_id . "'";
    $model->update($data, $where);

    header("Location: user_list_admin.php");
    exit;
}

// パスワードリセット処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    $data = [
        'password' => password_hash("init1234", PASSWORD_DEFAULT) // 初期パスワード
    ];
    $where = "user_id='" . $user_id . "'";
    $model->update($data, $where);

    echo "<script>alert('パスワードを初期化しました');</script>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理者用ユーザー情報編集</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    form { max-width: 500px; margin: auto; }
    label { display: block; margin-top: 10px; }
    input { width: 100%; padding: 8px; margin-top: 5px; }
    button { margin-top: 15px; padding: 10px 15px; }
    .readonly { background-color: #f0f0f0; }
  </style>
</head>
<body>
  <h1>管理者用ユーザー情報編集</h1>
  <?php if ($user): ?>
  <form method="post">
    <label for="user_id">ユーザーID</label>
    <input type="text" id="user_id" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>" readonly class="readonly">

    <label for="user_name">氏名</label>
    <input type="text" id="user_name" name="user_name" value="<?= htmlspecialchars($user['user_name']) ?>">

    <label for="user_kana">氏名（カナ）</label>
    <input type="text" id="user_kana" name="user_kana" value="<?= htmlspecialchars($user['user_kana']) ?>">

    <label for="usertype_id">ユーザ種別</label>
    <input type="text" id="usertype_id" name="usertype_id" value="<?= $user['usertype_id'] == '1' ? '社員' : '管理者' ?>" readonly class="readonly">

    <div style="margin-top:20px;">
      <button type="submit" name="update">更新</button>
      <button type="submit" name="reset_password">パスワードリセット</button>
      <button type="button" onclick="window.location.href='user_list_admin.php'">戻る</button>
    </div>
  </form>
  <?php else: ?>
    <p>ユーザーが見つかりません。</p>
  <?php endif; ?>
</body>
</html>