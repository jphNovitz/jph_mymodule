<?php
/*
 * sql/install.php
 * install the required tables in database
 *
 *  @author: Novitz Jean-Philippe <novitz@gmail.com>
 *  @licence: MIT
 *
 */

// sql will contain all our sql requests
$sql = array();

// this is an example of sql request -> feel free to uncomment those four lines and, most important,
// add your own request to fit your goals.

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'example` (
    `id_example` int(11) NOT NULL AUTO_INCREMENT,
    `name` char(20) DEFAULT NULL,
    PRIMARY KEY  (`id_example`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

// execute all request in sql array
foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}