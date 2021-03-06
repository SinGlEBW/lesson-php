<?php 
/*######-------<{ Классы наследование, Интерфейсы и Trait }>-------#######

Классы имеющие наследование могут иметь одинаковые названия функций. 
Но по поему на самом деле эти функции не имеют никакого отношения друг к другу.


1. Все свойства в классе должны иметь префикс: static || public ||
2. Из метода с любым префиксом к свойству с префиксом static можно обратиться только через self::
2. Если методы родительского и дочернего повторяются обращение к родителю parent::иям метода.

*/

/*
  В php нету большой вложенности наследования. Родитель и дочь. Поэтому придумали Trait. 
  Trait - это ящик в который собирают методы и свойства которые можно потом использовать в разных классах.
 
  Подключается с использованием префикса use
*/

  trait Animal {
    function myFunction1(){ echo "Horse<br>"; }
    function myFunction2(){ echo "Leon"; }
  }
/*------------------------------------------------------------------ */
  class Cat {}

  class Base {
    function say() {
      echo 'Родительский метод ';
    }
  }
   
  class MyHelloWorld extends Base {
    use Animal;   
  /* теперь в this методы из trait и класса Base */
    function say(Cat $objCat){ echo 'Дочерний метод';}//Можно точно указать что должно приходить в аргумент метода, иначе ошибка
    function method1(){
      $this->myFunction1();//метод из trait
      $this->say();//this берёт ближайший. К родительскому методу обращаться parent::имя метода
    
      echo 'World!<br><br>';
  }}

  $obj1 = new MyHelloWorld();
  $obj1->method1();//в js это obj1.method1();


/*-----------------------------------------------------------------------------*/
/*######-------<{ Префиксы }>-------#######*/

  class A {
    public $name1 = 'Вася';//свойствам нельзя опускать префикс
    static $name2 = 'Петя';//static зарезервирует имя. В дочернем классе нельзя будет использовать
    public $name3 = 'Федя';

    function see(){} //по умолчанию public
    static function method(){
      echo self::$name2;//
    }
  }

  $object1=new A();

  $object1->method(); 
/*
  1. $this:: self:: из public метода получить static свойства. ::$prop. (static:: вроде тот же self::)
  2. $this-> из public методов к public свойствам. ->prop
  3. из методов static можно обращаться только к static свойствам и только через self::
*/

/*----------------------------------------------------------------------------------------------------------------------------*/
//*******************ДОРАБОТАТЬ

//namespace lessonPHP;
// 1.Написаный код с ошибками может не выдать ошибок до тех пор пока нет запроса на его работу.
// 2.Пользоваться свойствами и методами материнского класса из подкласса можно, наоборот нельзя. Если нет ошибки смотри пункт 1й.
// 3.Абстрактный класс не может иметь объекта. Обращение происходить из дочернего класса.
// 4.Абстрактный метод может быть в абстрактном классе. При его объявлении он не имеет тела функции,
// заканчивается ; и обязательно должен быть объявлен в подклассе.
// 5.Не видишь смысла в абстрактном классе, удали abstract открой тело{} и задай параметры, пользы больше.



/*
 Полиморфизм - проявляется в основном в наследовании. Это способ (свойств, методов) подстраиваться и
 менять свои значения под определённым контекстом. Проще говоря разное поведение под разным контекстом. К примеру this->name обращаясь из разных экземпляров к этому свойству будет иметь 
 разный результат. При наследовании методов от родительского класса и обратившись к ним контекст this будет подстраиваться под дочерний 
 класс.
 
 
 Инкапсуляция - это способ скрывать свойства и методы класса которые отвечают за работу класса и не требуют вмешательства простого пользователя.

*/

function console_dir($object){
    if(is_object($object)){
        $data = [
            'className'=>get_class($object),
            'classMethods'=>get_class_methods($object),
            'classProperty'=>get_class_vars(get_class($object)),
            'propertyInstance'=>get_object_vars($object)
        ];
        foreach($data as $key=>$value){?>
            <span style="margin: 0; font-family:monospace; font-weight:bold;"><?=$key?></span>
            <h4 style="margin: 0 20px; "><?var_dump($value);?></h4><?php
        } 
    }else{
        //echo 'Переменная не является объектом.';
        var_dump($object);
    } 
}

/*------------------------------------------------------------------------*/
class Person{
    static $parentProp = 365;
    const MY_CONST = 12; //в классах можно дать префикс const. за пределами классов константа через define().константы не видно get_class_vars
    public function __construct($name = '', $age = ''){
        
        $this->name = $name;
        $this->age = $age;
        $this->argumeents = func_num_args();//возвращает число кол-во аргументов переданых в функцию
        return $this->argumeents;
    }
    static function classMethod($first ='',$second=''){
        return func_get_args()[0]; //тот же самый arguments в JS. т.к. есть функция которая принимает индекс func_num_arg() какой аргумент вернуть
    }
    public function getConst(){
        return self::MY_CONST;
    }
    public function getName(){
        return $this->name;
    }
    protected function method(){//protected не видим из вне через экземпляр, но обратиться можно через методы как в родительском классе так и через дочерние.        return $this->getName();
        return self::$parentProp;
    } 
}

class Person1 extends Person
{
    public function __construct($name = '', $age = '', $city = ''){
        
        parent::__construct($name, $age); //в JS реализуеться через super()
        $this->city = $city;
    }
    public function getConst(){
        return 5;
    }
    public function value(){
        //не смотря на то что у дочернего есть этот метод мы можем изменить контекст и получать родительское значение
        return parent::getConst();
    }
    public function name(){
        return $this->getName(); //полиморфизм. метод родителя подстраивается под контекст дочернего класса. $this->name у дочернего есть так что метод отработает на дочернем элементе
    }
    public function method2(){
        //кстате если встаёт вопрос почему не parent::. действительно зная что метод находиться у родителя можно и parent. $this ищет от класса к класу нужный метод.
        return $this->method();
    }

}

$objParent = new Person('grek', 100);//кто путается. Обявление объекта это и есть "экземпляр объекта"
$dd = new Person1('pet', 26, '');

$objParent->mass = 65;//можно создавать свойства на ходу.



console_dir($objParent->classMethod(3,5,2));
console_dir($dd->method2());
console_dir($objParent->getConst());

/*
ВАЖНАЯ ИНФОРМАЦИЯ. В php так же существует понятие пространство имён как и в c++. Смысл использования namespace
заключается в том что бы предотвратиь встречу как минимум 2х одинаковых названий в одном файле, будь это начиная от переменной
и заканчивая классом. Предположим есть потребность подключить стороннюю библиотеку, а в ней существует название класса 
такое же как и у нас. При попытке создать экземпляр у нас ничего не выйдет т.к. php не поймёт к какому классу нужно сылаться.

для этого в файле  где наш класс нужно указать какое-то пространство. Обычно указывают путь к файлу.
*/

/*
    К примеру мы подключили класс из файла где написан класс и смеет 
    namespace ns_Class. То нам придётся делать такую запись
*/

require_once __DIR__."/getClassProduct.php";
require "path/file2.php";
//так приходиться обращаться к классам с одинаковыми имена из разных пространств
$data1 = new ns_Oleg\Order(); 
$data2 = new ns_John\Order(); 

console_dir($data1->getMSG());

class_alias("ns_Oleg\Order", "Product");//вот функция которая делает псевдоним класса, что бы не ворочать большим именем. 

/* В 7й версии php появился префикс use для сокращения записи к классам из разных пространств */

use ns_Oleg\Order;/* теперь в пространстве файла можно использовать просто класс*/
$a = new Order();
/* Но если мы хотим 2й класс использовать? то в use можно давать псевдо имена */

use ns_Oleg\Order as Product;/* Подключение файла через require, а через use обращение к пространству и классу */
use ns_John\Order as Times;

$a = new Product();
$b = new Times();


/*
 Основные принципы ООП.
 
    1.Подклассы могут использовать функции-методы родителя и их дополнять и переопределять значения если не
    указан параметр final на функции.
    2.Если параметр final установлен на классе, то его нельзя использовать как родителя.
    3. Свойства не могут быть помечены параметром final.
*/



// 0.Все интерфейсы не имеют объектов как и абстрактные классы. Отличие: У интерфейса все методы без тела.
// также ДЛЯ КЛАССОВ НЕ ВОЗМОЖНО ИМЕТЬ МНОЖЕСТВЕННОЕ НАСЛЕДОВАНИЕ В ОТЛИЧИЕ ОТ ИНТЕРФЕЙСОВ.
// 1.Интерфейс имеет список методов без телл{}.
// 2.Все методы интерфейса должны использованы в классе(принцип работы как в абстрактном методе абстрактного класса).
// 3.К классу можно подключать много интерфейсов перечисляя их.
// 4.Интерфейс наследует интерфейс. Вместо нескольких подключений можно подключить последний 
// с множеством наследованый интерфейсов.
interface Calc3
{
    public function calcu();
    public function cal();
}
interface Calc4 extends Calc3
{
    public function ca();
}

class Person4 implements Calc3
{
    public function calcu()
    {
        echo "ссс";
        return 5;
    }
    function cal()
    {
        echo "rr";
    }
    public function ca()
    {
        echo "tt";
    }
}

/*
    Странное явление в php callback фукнции иногда передаётся имя как строка, а не как просто имя функции,
    можно даже имя метода закинуть как callback, только т.к. это метод класса нужно закидывать и имя класса,
    отсюда и образуеться массив для передачи callback типо так: ["Person", "nameMethod"] или метод экземпляра
    [$object, "method"]. Такая передача callback действует на некоторый вид функций php.
   
    call_user_func()
*/

