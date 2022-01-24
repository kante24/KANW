<?php
$db = connection();
$req = $db->prepare("select * from images where codeImage = ? limit 1");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array($_GET["codeOeuvre"]));
$img = $req->fetchAll();
echo $img[0]["bin"];
?>