<?php

require_once(dirname(__FILE__, 2) . '/src/config/database.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');


$user = new User(['name' => 'andre',  'email' => 'andre@andre']);

echo  $user->getSelect(['name' => 'Chaves'], 'name, email');

//     print_r($row);
// $sql = 'select * from users';
//  $result = Database::getResultFromQuery($sql);

//  while($row = $result -> fetch_assoc()) {
//     print_r($row);
//     echo '<br>';
//  }