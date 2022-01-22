<?php
//Общие числа
$g = rand(1, 100);
$p = rand(1, 100);

echo 'Общие числа:'.PHP_EOL .'g: '.$g.PHP_EOL .'p: '.$p.PHP_EOL;

//Алиса
$a = rand(1, 10);//Ее секретное число
$alice = (pow($g, $a)) % $p;//Остаток Алисы, передается Бобу.

echo PHP_EOL .'Секретное число Алисы a: '.$a.PHP_EOL .'Остаток Алисы A alice: '.$alice.PHP_EOL;

//Боб
$b = rand(1, 10);//Его секретное число
$bob = (pow($g, $b)) % $p;//Остаток Боба, передается Алисе

echo PHP_EOL .'Секретное число Боба b: '.$b.PHP_EOL .'Остаток Боба B bob: '.$bob.PHP_EOL;

//У Алисы есть число $a и $bob, она вычисляет значение общего ключа, как и Боб:
$alicekey = (pow($bob, $a)) % $p;
$bobkey = (pow($alice, $b)) % $p;

echo PHP_EOL .'Секретный ключ Алисы: '.$alicekey.PHP_EOL .'Секретный ключ Боба: '.$bobkey.PHP_EOL;