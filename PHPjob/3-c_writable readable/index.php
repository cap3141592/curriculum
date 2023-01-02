<?php

// データファイルへの書き込み

$testFile = "test.txt";
$contents = "こんにちは！";

// 書き込みできるのかどうかはis_writableメソッドで調べます。
// パーミッション（書き込み権限）次第では、書き込めないこともありえます。

if (is_writable($testFile)) {
    
    // 書き込み可能なときの処理

    // echo "writable!!";
    
    // 対象のファイルを開く
    $fp = fopen($testFile, "a");
        // a : 書き出し用のみでオープンします。ファイルポインタをファイルの終端に置きます。
        // ファイルが存在しない場合には、作成を試みます。
    // $fp = fopen($testFile, "w");
        // w : 完全上書きする。

    // 対象のファイルに書き込む
    fwrite($fp, $contents);

    // ファイルを閉じる
    fclose($fp);

    // 書き込みした旨の表示
    echo "finish writing!!";

} else {
    // 書き込み不可のときの処理
    echo "not writable!";
    exit;
}

echo '<br>'; echo '<br>';


// データファイルの読み込み

$test_file2 = "test2.txt";
    
if (is_readable($test_file2)) {
    // 読み込み可能なときの処理

    // 対象のファイルを開く
    $fp = fopen($test_file2, "r");
    // 開いたファイルから1行ずつ読み込む
    while ($line = fgets($fp)) {
        // 改行コード込みで1行ずつ出力
        echo $line.'<br>';
    }
    // ファイルを閉じる
    fclose($fp);
} else {
    // 読み込み不可のときの処理
    echo "not readable!";
    exit;
}

// 読み込みの場合は、全て一括で内容を取得するわけではなく、1行ずつ読み込むのが通例です。
// fgets関数はファイルを1行ずつ読み込む関数です。
// これは決まった書き方なのですが、読み込めなくなるまでループ処理を実行します。

?>
