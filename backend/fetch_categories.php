<?php
require '../config.php';

function getCategories() {
    global $pdo;
    return $pdo->query("SELECT * FROM categories")->fetchAll();
}
