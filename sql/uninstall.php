<?php
/*
 * uninstall.php
 *
 */

// same principle as in intall.php
// create your uninstall sql requests
$sql = array();


// execute your uninstall requests
foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}