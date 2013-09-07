<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function renameAllInFolder($path_folder){
    $handler = opendir($path_folder);
    while ($file = readdir($handler)) {
        if ($file != "." && $file != "..") {
            $newName = ucfirst($file);
            $path = $path_folder.$file;
            if(is_dir($path)){
                renameAllInFolder($path."/");
            }
            rename($path_folder . $file, $path_folder . $newName); // here; prepended a $directory
        }
    }
    closedir($handler);
}

renameAllInFolder("../object/Document/");
?>
