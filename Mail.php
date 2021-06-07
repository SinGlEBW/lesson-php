<?php
header("HTTP/1.0 404 Not Found");
?>

<?php

/*Что бы отправлять сообщения с php нужно настроить сервер, для этого нужно проверить включён ли 
 Все настройки сервера изменяться в файле php.ini всю информацию можно проверить через функцию phpinfo()*/
//phpinfo();
/*
file_uploads: On. - должен быть включён.
max_file_uploads - максимальное число загружаемых файлов на сервер
upload_max_filesize - максимальный размер загружаемого файла
upload_tmp_dir - куда файлы будут загружаться

Алгоритм загрузки файла на сервер. Клиент нажимает на кнопку загрузки файла с компьютера, файл отправляеться во временный 
каталог на сервере php, как только php определяет что файл прибыл, он отправляет его по адресу upload_tmp_dir
*/
