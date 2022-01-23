<?php
$alf = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' '];

if($_POST['msg'] != ''){
	$key = preg_split('//u', $_POST['key'], -1, PREG_SPLIT_NO_EMPTY);
	$offset = $_POST['offset']-1;
	if(count($key) > count($alf)-1){
		echo 'Большая длина ключа';
		goto point;
	}
	foreach($key as $num => $letter){
		if(array_count_values($key)[$letter] > 1){
			echo 'В ключе не должно быть повторений';
			goto point;
		}
		$newalf[$offset] = $letter;
		$offset++;
	}
	foreach($alf as $num => $letter){
		if(array_search($letter, $newalf) !== false) continue;
		if($offset == count($alf)) $offset = 0;
		$newalf[$offset] = $letter;
		$offset++;
	}
	ksort($newalf);
	$msg = preg_split('//u', $_POST['msg'], -1, PREG_SPLIT_NO_EMPTY);
	if($_POST['desh'] == 'on'){
		$newalf = array_combine($newalf, $alf);
		foreach($msg as $letter){
			$newword .= $newalf[$letter];
		}
		echo 'Дешифрованное сообщение: '.$newword;
	}else{
		$newalf = array_combine($alf, $newalf);
		foreach($msg as $letter){
			$newword .= $newalf[$letter];
		}
		echo 'Зашифрованное сообщение: '.$newword;
	}
}

point:
?>
<html>
<head>
</head>
<body>
<form method="POST">
<input name="msg" placeholder="Сообщение" value="сообщение"><br>
<input name="key" placeholder="Ключ" value="ключ"><br>
<input name="offset" placeholder="Смещение" value="4"><br>
<input type="checkbox" name="desh"> Дешифровать<br>
<input type="submit">
</form>
</body>
</html>