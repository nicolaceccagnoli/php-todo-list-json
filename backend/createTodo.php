<?php

if ( 
    isset($_POST['text'])
    &&
    strlen($_POST['text']) > 4
) {

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


#questa sarà la risposta a tutta l'operazione se va a buon fine
echo json_encode([
    'message' => 'ok',
    'code' => 200
]);

} else {
    #questa sarà la risposta a tutta l'operazione se non va a buon fine
    echo json_encode([
        'message' => 'Richiesta non andata a buon fine',
        'code' =>400
    ]);
}