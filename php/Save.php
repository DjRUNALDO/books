<?php

require_once "Connection.php";

$bookName = $_GET["inputBook"];
$sql = "INSERT INTO public.book (nome, paginas, autor) VALUES('$bookName', 0, 'Teste');";

Connection::exec($sql);
header("Location: ../index.php");