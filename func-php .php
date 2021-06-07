<?php
/*########------<{ Функции для string }>-----########*/



preg_match($regexp, 'искомая строка', $outArr, PREG_OFFSET_CAPTURE);/*<0 || 1. Выполняет поиск до 1го найденного элемента. 
    $outArr - будет заполняться искомыми данными в виде массива. 
    PREG_OFFSET_CAPTURE - будет заполнять 3й параметр массивами [ 0 => [0 => '%'  1 => 9] ] - найденный элемент и его индекс
    */

preg_match_all();/*<int кол-во найденных элементов. Выполняет глобальный поиск шаблона в строке.
                  заполнит $outArr множеством найденных элементов*/                                              

str_replace('что','на что',$text);//меняет в строке. что на что и где.   
preg_replace($regexp, 'на что', $text)//расширенный str_replace

strtolower($str);//строку в нижний регистр
strtoupper($str);//строку в верхний регистр



/*######-------<{ Работа со строками }>------#######*/
$str .= "Добавляю в цикле"; //так можно дополнять строку. 

/*--------------------------------------------------------------------------------------------------------------------*/
/*########------<{ Функции для массивов  }>-----########*/

end();// принимает массив и возвращает последний элемент массива
reset();// Принимает массив и возвращает первый элемент массива
current();// Возвращает текущий элемент массива
next();// Перемещает указатель массива вперед на один элемент. current() вернёт следующий массив
prev();// Передвигает внутренний указатель массива на одну позицию назад. current() вернёт предыдущий массив
each();// Возвращает текущую пару ключ/значение из массива и смещает его указатель
array_key_last();// Получает последний ключ массива

array_shift(сюда_массив);// извлекает первый элемент массива. после извлечения массив лишён 1го элемента
array_unshift();// Добавляет один или несколько элементов в начало массива
array_push($arr, 1,17,15);// Добавляет один или несколько элементов в конец массива
$arr[] = 'dd';// Добавляет один элемент в конец массива
array_pop();// Извлекает последний элемент массива
array_merge();// принимает массивы которые нужно объединить
array_combine();// - принимает 1й массив в качестве ключей, 2й массив в качестве значений
array_replace($arr1,$arr2);// - заменяет элементы 1го массива вторым. во втором массиве указывает откуда начать менять 
array_filter();/* 1й аргумент массив, 2й не обязательный callback. Если cb не был передан элементы массива со значением false 
                выводится не будут $arr1 = ["Audi","Golf","Volkswagen","Nissan" => false];
                3й аргументе 0 - ARRAY_FILTER_USE_KEY, 1 - ARRAY_FILTER_USE_BOTH. устанавливает кол-во аргументов 
                по умолчанию один аргумент отвечающий за значение.*/
array_map(function($item){}, $arr);// Принимает callback и массив. callback имеет только 1 параметр. 
explode(separator, arr)//<arr - разбивает строку. типа метода Arr.split в js.





in_array("значение", [мас. значений]) - проверяет существует ли значение в массиве.
array_key_exists() - проверяет присутствует ли указыный ключ в массиве.
array_search() - ищет значение в массиве и возвращает ключ








/*--------------------------------------------------------------------------------------------------------------------*/
/*#####------<{ Проверка переменных }>-----########*/
isset($a, $b);//проверяет переменные. Если там не null, то вернёт true



/*#####------<{ Информативные функции }>-----########*/
get_class($obj1);// - Возвращает имя класса, к которому принадлежит объект
get_class_methods('имя класса');// - Возвращает методы класса
is_resource($var);// - является ли ресурсом
get_resource_type($handle);// - определяет что за ресурс
get_object_vars($object);// - Возвращает свойства указанного объекта
get_class_vars($class_name);// - Возвращает объявленные по умолчанию свойства класса
get_parent_class();// - возвращает имя родительского класса
method_exists('имя класса', 'имя метода');//Существует ли метод или свойство в классе. var_dump показывает булево значение, echo  1 или ничего.

gettype($var);//к какому типу относится переменная

$dd = true && '23';//в php не работает выражение true && '23'.  php будет выбирать только 1й аргумент, замера тернарное выражение, без 1 аргумента

/*--------------------------------------------------------------------------------------------------------------------*/
/*######-------<{ Обработка ошибок }>------#######*/

new Exception('message')|| new Error('message');//сгенерировать ошибки
new PDOException('d');//можно для PDO сгенерировать ошибку
$err->getMessage();//так получить её. IDE не показывает метод


/*--------------------------------------------------------------------------------------------------------------------*/
/*######-------<{ Работа с сервером }>------#######*/
//в глобальной переменной $_SERVER можно узнать много чего например какой метод при обращении к серверу 
http_build_query(["key1"=>"value1","key2"=>"value2"]);//вернёт query строку key1=value1&key2=value2

//Response
header($string, $replace = true, $http_response_code = null);/*устанавливает заголовки ответа.  
                                                                header("Location: http://www.example.com/"); - перенаправление*/
getallheaders();//содержит все заголовки. Можно их так же найти в $_SERVER
http_response_code(404);// тот же statusCode в NodeJS

/*Если попытаться в php отправить данные методом PATCH имея желание обновить данные через этот запрос, то эти данные не будут находиться в
  глобальной переменной $_POST а достать их можно будет через метод file_get_contents со специфичным именем и то нужно отправлять 
  не FormData, а JSON.stringify({})
*/
file_get_contents("php://input");//

/*--------------------------------------------------------------------------------------------------------------------*/
/*######-------<{ Работа с файлами }>------#######*/
/*
    writer, read
  w - откроет или создаёт файл для записи, всё удаляет, ставит курсор в начало для записи
  w+ - тоже самое добавлено чтени/запись
  a - Открывает только для записи ставит курсор в конец
  a+ - тоже самое добавлено чтение/запись
  r - открывает только для чтения
  r+ - чтение/запись
  x - создаёт новый файл только для записи
  x+ - для чтения/запись
  доп параметр ко 2му аргументу
  t - позволяет принимать в файл управляющие символы такие как: \n \t
  b - запрещает
*/
opendir($path, $context = null);// - когда файл открывает то файл становится типом resource 
//Пример:
fopen('название.txt', 'at');// - просто открывает файл и возвращает его.
fwrite($handle, 'какая-то запись');// - непосредственная запись
fread($handle, $length);// - функция для чтения. русский текст 2 байта за символ. Без 2го параметра прочитает строку
fgets($handle, $length = null);// - русский текст вообще 3 байта за символ
feof($handle);// - проверяет где стоит курсор. Если курсор в конце то возвращает true файл значит прочитан. Можно цикл проверять (!feof($file))
fseek($handle, $offset, $whence = SEEK_SET);// устанавливает курсор 


file_put_contents($filename, $data,$flags = 0, $context = null);// - заменяет fopen fwrite fclose.Пишет данные в файл
file_get_contents($filename, $use_include_path = false, $context = null, $offset = 0, $maxlen = null);// - выводит текст из файла, но всё одной строкой, не очень удобно.
file($filename, $flags = null, $context = null);// - Читает содержимое файла и помещает его в массив. Удобней разбирать чем file_get_contents()
file_exists($filename);// - проверяет существует ли файл
opendir($path, $context = null);// - открывает папку по директории.
filesize($filename);// - показывает размер файла
rename($oldname, $newname, $context = null);// - переменовывает файл
unlink($filename, $context = null);// - удаляет файл
copy('path/files.php', 'path/file-box.php');//Копирует файл. 1й какой, 2й куда и как назвать

move_uploaded_file($filename, $destination);// сохраняет файл из $_FILES по ключу $tmp_name
pathinfo($path, $options = null);/*$path, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME 
                                  возвращает информацию о path в виде ассоциативного массива или строки, в зависимости от options. */






/*--------------------------------------------------------------------------------------------------------------------*/
/*######-------<{ Продвинутые функции }>------#######*/
$algo = "md5";//алгоритм хеширования ("sha256", haval160,4 и т.д)
$filename = 'путь к файлу';
$binary = false;//true, выводит необработанные двоичные данные, false в 16й форме
hash_file($algo, $filename);//<srt hash. Генерация хеш-значения, используя содержимое заданного файла

/*--------------------------------------------------------------------------------------------------------------------*/
/*######-------<{ Экранирование }>------#######*/

htmlentities($orig);
html_entity_decode($a);
strip_tags();// - удаляет теги, но не вырезает одинарные кавычки
htmlspecialchars();// - экранирует теги, но не экранирует одинарные кавычки

?>
