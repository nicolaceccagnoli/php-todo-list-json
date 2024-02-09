<?php
#Recupero i Todo Esistenti
$allTodoString = file_get_contents('db/todo.json');

#Trasformo la scritta JSON in un Array di Array associativi
$allTodosList = json_decode($allTodoString, true);

#Applico una funzione che rimuove un elemento specifico dalla Lista passato come parametro in POST
unset($allTodosList[$_POST['index']]);

#Assegno ad una variabile l'indice dell'Array originale riavviato da 0
$todoListIndex = array_values($allTodosList);

#Ritrasformo l'array in una stringa json
$newTodoList = json_encode($todoListIndex);

#Scrivo i nuovi Todo nel db
file_put_contents('db/todo.json', $newTodoList);