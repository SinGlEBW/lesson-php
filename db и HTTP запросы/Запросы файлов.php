<?
// дописать
function ConvertFilesStructure($input) {
    $output = [];
    foreach ($input as $key => $file) {
        $output[$key] = ConvertFilesStructureRecursive(
            $file['name'],
            $file['type'],
            $file['tmp_name'],
            $file['error'],
            $file['size']
        );
    }
    return $output;
}

function ConvertFilesStructureRecursive($name, $type, $tmp_name, $error, $size) {
    if (!is_array($name)) {
        return [
            'name'     => $name,
            'type'     => $type,
            'tmp_name' => $tmp_name,
            'error'    => $error,
            'size'     => $size,
        ];
        
    }
    $output = [];
    foreach ($name as $key => $_crap) {
        $output[$key] = ConvertFilesStructureRecursive(
            $name[$key],
            $type[$key],
            $tmp_name[$key],
            $error[$key],
            $size[$key]
        );
    }
    return $output;
}

ConvertFilesStructure($_FILES);

get_resource_type(opendir(__DIR__));

for($i = 0; $i < count($_FILES['pictures']); $i++){
    console_dir($_FILES['pictures']);
}

if ((!empty($_POST)))
     header('Content-Type: application/json; charset=utf-8');
$response = array();
$response['status'] = 'bad';


if (!empty($_FILES['file']['tmp_name'])){
	for($key=0;$key<count($_FILES['file']['tmp_name']);$key++){
		$upload_path = __DIR__ . "/upload/";
		$user_filename = $_FILES['file']['name'][$key];
		$userFile_basename = pathinfo($user_filename,PATHINFO_FILENAME );
		$userFile_extension = pathinfo($user_filename, PATHINFO_EXTENSION);
		$server_filename = $userFile_basename . "." . $userFile_extension;
		$server_filepath = $upload_path . $server_filename;
		$i = 0;
		while(file_exists($server_filepath)){
			$i++;
			$server_filepath = $upload_path .  $userFile_basename . "($i)." . $userFile_extension;
		}
		if (copy($_FILES['file']['tmp_name'][$key], $server_filepath)){
			$response['files'][] =  $server_filepath;
			$response['status'] = 'ok';
		}
	}
}




?>

