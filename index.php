<?php
  // 認証用
  //$data = file_get_contents('php://input');
  //var_dump($data);

  // 先に応答を返す
  echo('ok');
  // 強制的に接続を切る
  fastcgi_finish_request();

  // 応答後、処理を続行する
  // 受け取ったパラメータをGASに投げるだけ
  $data = file_get_contents('php://input');

  // ここにGASのURLを入れる
  $url = "https://script.google.com/d/1-wyZLB6UzF6xe0D0i0oCv3jObGi4fNsZIoQYPloj9EwxkBTaJSNvDObb/edit?usp=drive_web&folder=0ANLFiayXgh1KUk9PVA&splash=yes/exec";

  // POSTで送信
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_exec($ch);

  exit;
?>