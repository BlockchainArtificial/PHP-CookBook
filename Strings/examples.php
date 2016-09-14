<?php
//-------------------------------------------------------------------- Обработка строки по одному байту
//Переберите байты строки в цикле for. Код листинга 1.16 подсчитывает гласныебуквы в строке.

//$string = "This weekend, I'm going shopping for a pet chicken.";
//$vowels = 0;
//
//for ($i = 0, $j = strlen($string); $i < $j; $i++) {
//    if (strstr('aeiouAEIOU',$string[$i])) {
//        $vowels++;
//    }
//}

//-------------------------------------------------------------------- Подсчет серий символов
//function lookandsay($s) {
//    // Возвращаемое значение инициализируется пустой строкой
//    $r = '';
//    // Переменная $m содержит подсчитываемый символ; инициализируем первым символом в строке
//    $m = $s[0];
//    // В $n хранится количество обнаруженных $m, инициализируется 1
//    $n = 1;
//    for ($i = 1, $j = strlen($s); $i < $j; $i++) {
//        // Если символ совпадает с предыдущим
//        if ($s[$i] == $m) {
//            // Увеличить счетчик этого символа
//            $n++;
//        } else {
//            // Иначе добавить счетчик и символ к возвращаемому значению
//            $r .= $n.$m;
//            // Текущий символ назначается искомым
//            $m = $s[$i];
//            // Счетчик сбрасывается до 1
//            $n = 1;
//        }
//    }
//    // Вернуть построенную строку, а также последнее значение счетчика и символ
//    return $r.$n.$m;
//}
//
//for ($i = 0, $s = 1; $i < 10; $i++) {
//    $s = lookandsay($s);
//    print "$s<br>";
//}

//------------------------------ RESULT
//1
//11
//21
//1211
//111221
//312211
//13112221
//1113213211
//31131211131221
//13211311123113112211

//-------------------------------------------------------------------- Обратная перестановка строки по словам
//$s = "Once upon a time there was a turtle.";
//print $s . "<br>";
////------------------------------ 1
//// Разбиение строки по словам
//$words = explode(' ',$s);
//// Массив слов
//$words = array_reverse($words);
//// Построение строки
//$s = implode(' ',$words);
////------------------------------ 2
//$s = implode(' ',array_reverse(explode(' ',$s)));
//print $s;

//-------------------------------------------------------------------- Генерирование записей данных с полями фиксированной длины(PACK)
//Требуется отформатировать записи данных так, чтобы каждое поле занимало//
//указанное количество символов.

//$books = array( array('Elmer Gantry', 'Sinclair Lewis', 1927),
//    array('The Scarlatti Inheritance','Robert Ludlum', 1971),
//    array('The Parsifal Mosaic','William Styron', 1979) );
//
//foreach ($books as $book) {
//    print pack('A100A15A4', $book[0], $book[1], $book[2]) . "<br>";
//}

//Форматная строка A25A14A4 приказывает pack() преобразовать последующие
//аргументы в строку из трех фрагментов, дополняемых пробелами: из 25 символов,
//14 символов и 4 символов. Для полей, дополняемых пробелами в записях фиксированной
//длины, функция pack() предоставляет компактное решение.
//------------------------------ RESULT
//Elmer Gantry Sinclair Lewis 1927
//The Scarlatti Inheritance Robert Ludlum 1971
//The Parsifal Mosaic William Styron 1979

//-------------------------------------------------------------------- Генерирование полей фиксированной длины без использования pack()
//$books = array( array('Elmer Gantry', 'Sinclair Lewis', 1927),
//    array('The Scarlatti Inheritance','Robert Ludlum', 1971),
//    array('The Parsifal Mosaic','William Styron', 1979) );
//
//foreach ($books as $book) {
//    $title = str_pad(substr($book[0], 0, 25), 25, '.');
//    $author = str_pad(substr($book[1], 0, 15), 15, '.');
//    $year = str_pad(substr($book[2], 0, 4), 4, '.');
//
//    print "$title$author$year<br>";
//}

//-------------------------------------------------------------------- Разбор записей с полями фиксированной длины
//$booklist = <<<END
//Elmer Gantry Sinclair Lewis 1927
//The Scarlatti InheritanceRobert Ludlum 1971
//The Parsifal Mosaic Robert Ludlum 1982
//Sophie's Choice William Styron 1979
//END;
//
//$book_array = [];
//$books = explode("\n",$booklist);
//
//for($i = 0, $j = count($books); $i < $j; $i++) {
//    $book_array[$i]['title'] = substr($books[$i],0,25);
//    $book_array[$i]['author'] = substr($books[$i],25,15);
//    $book_array[$i]['publication_year'] = substr($books[$i],40,4);
//}

//-------------------------------------------------------------------- Разбор записей с полями фиксированной длины fixed_width_substr( )
//$booklist = <<< END
//Elmer Gantry Sinclair Lewis 1927
//The Scarlatti InheritanceRobert Ludlum 1971
//The Parsifal Mosaic Robert Ludlum 1982
//Sophie's Choice William Styron 1979
//END;
//
//function fixed_width_substr($fields,$data) {
//
//    $r = array();
//
//    for ($i = 0, $j = count($data); $i < $j; $i++) {
//        $line_pos = 0;
//
//        foreach($fields as $field_name => $field_length) {
//            $r[$i][$field_name] = rtrim(substr($data[$i],$line_pos,$field_length));
//            $line_pos = $field_length;
//        }
//    }
//
//    return $r;
//}
//
//$books = explode("\n",$booklist);
//$book_fields = array(
//    'title' => 25,
//    'author' => 15,
//    'publication_year' => 4);
//
//$book_array = fixed_width_substr($book_fields,$books);
//48

//-------------------------------------------------------------------- Перенос текста по заданной длине строки
//$s = "Four score and seven years ago our fathers brought forth on this continent
//a new nation, conceived in liberty and dedicated to the proposition
//that all men are created equal.";
//
//print wordwrap($s, 50, "<br><br>");

//-------------------------------------------------------------------- Хранение двоичных данных в строках
//$packed = pack('S4',1974,106,28225,32725);
//
//$nums = unpack('S4',$packed);

//Первый аргумент pack() содержит форматную строку, которая описывает способ кодирования данных, передаваемых в
//остальных аргументах. Форматная строка S4 приказывает pack() сгенерировать четыре коротких 16-разрядных числа
//без знака с машинным порядком байтов. Если использовать числа 1974, 106, 28 225 и 32 725 на машине с прямым
//(little-endian) порядком байтов, вызов вернет восемь байтов: 182, 7, 106, 0, 65, 110, 213 и 127. Каждая пара байтов соответствует
//одному из входных чисел: 7 * 256 + 182 =1974; 0 * 256 + 106 =106; 110 * 256 + 65 = 28 225; 127 * 256 + 213 = 32 725.

//Первый аргумент unpack() также содержит форматную строку, а во втором передаются декодируемые данные. Для форматной
//строки S4 и 8-байтовой последовательности, сгенерированной функцией pack(), создается массив исходных чисел с четырьмя
//элементами. Команда print_r($nums) выводит следующий результат:
//Array
//(
//    [1] => 1974
//    [2] => 106
//    [3] => 28225
//    [4] => 32725
//)