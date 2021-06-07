<?php 
/*В классах к переменным можно обращаться напрямую, а можно прогонять данные через методы.
Пока не понял зачем. Видимо удобней. Есть методы как готовые библиотеки ркшения которых 
пригодиться. Можно замутить свою функцию со своим заданием.*/
class raketa{
   public $name;
   public $age;
   public $id;
   public function __construct($x1,$x2) {
     echo $this->name=$x1.'<br>';
     echo $this->age=$x2.'<br>';   }
//клон ничего не принимает. в него пихать только то,что в дальнейшем нужно клонировать.
    public function __clone(){
     echo $this->id=0;  }
}

$n=new raketa('Her',25);
$n->id=20;
echo $n->id;
//clone($n);

echo '<br>__________________________________________________________________<br>';



//можно писать без скобок  clone($n);
//параметр clone будет клонировать только когда есть магическая функция __clone();



echo gettype($n);


/*


ПРОСТО ПОЛЕЗНЫЕ ФУНКЦИИ
echo gettype();  - определяет тип переменной
isset();   - проверка существования переменной
unset();   - уничтожает переменную
trim();    - обрезает лишние пробелы из начала и конца строки
empty();   - проверка переменной, переменная не существует и равно FALSE. Если переменная существует 
генерирует предупреждение

password_hash();  - принимает массив пароля и его шифрует (в БД абра кадарра) 
password_verify(введёный пользователем , закодированый в БД ); - проверяет, соответствует ли пароль хешу 
count(); — Подсчитывает количество элементов массива или чего-либо в объекте
кстате переменная уничтожаеться каждый раз при вызове функции циклом.
Пример 

sratic не даёт удалить переменную компилятором и при последующем вызове функции будет
session_start -  cтартует новую сессию, либо возобновляет существующую

define("$n", значение);  - создаёт константу
uniqid()  - ненерирует уникальное имя
? - это условный оператор используеться в выражении.

1.strlen(); - считает кол-во символов в строке.
2.strpos($string, "t"); - принимает аргументы строки и что нудно найти в ней.
3.substr($string, 4, 9); принимает 3 аргумента. строку и что нужно удалить ДО и ПОСЛЕ.
4.str_replace("удалить","на что заменить", $где это делать); заменяет символы в строках. Принимает даже массивы.

5.htmlspecialchars(); специальная функция которая экранирует теги введёные пользователем

6.strtolower(); принимает строку для обработки в нижний регистор
7.strtoupper(); приводит текст к верхнему регистру.
8.md5(); функция принимает строку или числа и кодирует рандомными кодом. 

10.explode(":", $data) - разбивает строку с помощью разделителя. Наподобие split() в JS

printf - в 1м арг. имеет управ. символ % который устанавливаеться где нужно в строке и он будет подставлять значение в дальнейшем.
но польза не в этом, значение можно калибровать. 
%s - интерпретирует значение в строку.
%f - (float) выводит число после точки 6 нулей. %.2f ограничивает до 2х нулей
%d - (double)выведет целочисленое число со знаком + или -
%u - (unsigned)целое число без знака
%c - переведёт значение в число ASCII
%e или E - экспонициальная запись
%o - восьмеричный код
%x или X - шестнадцатеричное представление
printf(принимает строку, принимает значение) 
sprintf() - возвращает интерпретированую строку
/Режимы записи кода:
snake_case - снэк кейс запись с нижним подчёрниванием
CamelCase - запись с использованиея заглавных букв.
*/





class TestClass
{
    public $foo="Привет";

     public function __construct($foo) {
        $this->foo = $foo;
    }
    public function toString() {
/*Без return функция ничего не возвращает и при вызове выполняет код. В 
код можно добаить echo при достижении этой строки она будет выведена. Это не
считаеться возвратом значения функции.
И т.к. функция ничего не возвращает при её вызове нет смысла её куда-то
присваивать и пытаться вывести информацию на экран.
     $this->foo;*/
     return $this->foo; 
/*2й же вариант заменяет вызов функции значением которое можно присвоить и 
выводить на экран*/
    }
    public function __toString() {//magic function
        return $this->foo;
    }
}

$class = new TestClass("her");
print_r($class);
echo gettype($class);
echo "<br>";
echo $class->toString();//способ получения информации с помощью обычной функции
echo "<br>";
echo $class;
/*__construct() принимает аргумент к классу,а
  __toString() даёт возможность 
передавать объект в echo вывода строки*/
