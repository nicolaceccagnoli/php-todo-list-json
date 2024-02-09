<?php

#Recupero i Todo Esistenti
$allTodoJson = file_get_contents('db/todo.json');

#Trasformo la scritta JSON in un Array di Array associativi
$allTodos = json_decode($allTodoJson, true);

#Aggiungo all'array il nuovo Todo
$newTodo = [
    'text' => $_POST['text'],
    'done'=> false,
];

$allTodos[] = $newTodo;

#Ritrasformo l'array in una stringa json
$allTodoWithNewJson = json_encode($allTodos);

#Scrivo i nuovi Todo nel db
file_put_contents('db/todo.json', $allTodoWithNewJson);

var_dump($_POST);

#questa sarà la risposta a tutta l'operazione
// echo json_encode([
//     'message' => 'ok',
//     'code' => 200
// ])