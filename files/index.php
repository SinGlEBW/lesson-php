<?php
/*При отправке файла на сервер через форму, $_FILES авоматически создаёт массив название массива Которое было указаннов input*/
if(isset($_FILES['image'])){
    $errors = Array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];//появляетья и пропадат в папке temp. происходит всё быстро
    $file_type = $_FILES['image']['type'];
    $formatImage = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);//тот же результат что и выше.
    $expensions = array('jpeg', 'jpg', 'png');
    
    

    if(!in_array($formatImage, $expensions)){
        $errors[] = "Файл не соответсвует формату";
    }
   
    if($file_size > 2097152){
         $errors[] = "Файл не должен превышать 2 мб";   }
   
    if(empty($errors)){
        
      //  move_uploaded_file($file_tmp, 'D:/'.$file_name); //без функции файлы не придут из временного хранилища
        /*т.к. сервер отправляет файл во временное пространство файл нужно преместить в какую то папку, за это отвечает
          функция перемещает файл в новое место move_uploaded_file(временная деректива, куда кидать в постоянную дерективу) */
        echo "Success";
    }else{
        print $errors[0];
//print отличаеться от echo тем что в echo можно использовать и кокатенацию и перечислением выводы строк. В print только конкатенацию
    }    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
 <body><!--В случае изменения местоположения файлов можно задать динамическое изменение пути к файлу используя супер глобальную переменную $_SERVER с её массивом -->
    <form action="<?= $_SERVER["REQUEST_URI"];?>" method="POST" enctype="multipart/form-data">
    <!--multiple и size работают в теге select. сколько бы не было в селекте строк multiple список раскрывает, а size устанавливает ограничение
         multiple - даёт возможность выбирать за раз несколько файлов. size - устатавливает какое ко-во за раз можно выбрать -->
        <input type="file" name="image" multiple="multiple" size="3">
        <input type="submit">
    </form>
    <?if(!empty($_FILES)):?>
         <ul><!--Просто вывел информацию FILES -->
            <?foreach($_FILES['image'] as $key => $value):?>
                <li><span><?="$key: "?></span><?=$value?></li>  
            <?endforeach?>
        </<input>
        <?endif?>
        

<??>


</body>
</html>



<?php



$file = fopen('People.txt', 'rt');
//$text = fread($file, 8536);
$str = str_replace('\n','<br>',$text);

fclose($file);

$op = pathinfo(__DIR__."\index.php", PATHINFO_DIRNAME);
$fd = opendir($op);
var_dump(is_resource($fd));
?>

<?php 



/*наследование - механизм языка позволяющий описать новый класс на основе уже существующено 
                  родительского класса*/
//echo"
//<!-- Если нужно работать с файлом как с объектом, а не строкой то нужно переложить ответственность с метода пост на $_FILES-->
//<!-- для этого указывается в форме enctype='multipart/form-data', post становиться просто проводником для получения данных в $_FILES-->
//
//<form  enctype='multipart/form-data' action='oop.php' method='post'>
//
//<!-- можно до кучи передать через post невидимую форму данных и с ней взаимодействовать через $_POST-->
//<!-- но она должна быть установлена раньше формы загрузки файлов-->
//
//    <input type='hidden' name='forPpost' value='херня'>  
//    <input type='file'   name='forPfiles'  >
//    
//    <input type='submit' value='Отправить файл'>
//</form>";

//var_dump($_POST);echo '<br>';
//print_r($_FILES);
//echo '<br>'.$file=$_FILES["forPfiles"]["neme"];

?>