<?php
$to = "djsamm88.web.id@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: system@e-agendapakpakbharat.go.id" . "\r\n" .
"CC: system@e-agendapakpakbharat.go.id";

mail($to,$subject,$txt,$headers);
?>