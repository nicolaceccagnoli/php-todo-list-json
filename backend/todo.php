<?php
/*

    PRENDO I DATI DAL FILE JSON

*/

#Recupero il contenuto del file contenente i TODO
$stringaJSONPresaDalDb = file_get_contents('db/todo.json');

#Trasformo la stringa in una struttura dati leggibili in PHP
// $todos = json_decode($stringaJSONPresaDalDb, true);

#Dico al client che la risposta contiene un JSON
header('Content-Type: application/json');

#Rispondo con il json preso dal file
echo $stringaJSONPresaDalDb;
?>