<?php 
/*#######-------<{ Циклы Do while, for, foreach }>--------########

	break - используется не только с условными операторами if else и switch
					так же этот оператор используется для выхода из циклов.
	continue - Указывается в циклах непосредственно у условии что бы пропустить шаг цикла
Пример:
*/
$a = 5;
for($i = 0; $i < $a; $i++){
    if($i == 3){
        continue; //Пропускает шаг
		}
		
    echo $i."<br>";
		
}

$data = [
	"key1" => "value1",
	"key2" => "value2",
	"key3" => "value3"
];

foreach($data as $key=>$value){?>
	<span style="margin: 0; font-family:monospace; font-weight:bold;"><?=$key?></span>
	<h4 style="margin: 0 20px; "><?var_dump($value);?></h4><? 
} 

?>
