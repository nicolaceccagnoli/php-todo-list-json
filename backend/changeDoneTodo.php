<?php
#Recupero i Todo Esistenti
$allTodoString = file_get_contents('db/todo.json');

#Trasformo la scritta JSON in un Array di Array associativi
$allTodosList = json_decode($allTodoString, true);

# Controllo se l'indice passato tramite POST esiste nell'array
if(isset($_POST['index'])) {

    #Dichiaro una variabile che contiene l'indice del todo da modificare
    $index = $_POST['index'];

    #Controllo se l'indice esiste nell'array
    if(array_key_exists($index, $allTodosList)) {

        #Inverto lo stato 'done' del todo
        $allTodosList[$index]['done'] = !$allTodosList[$index]['done'];
        
        #Ritrasformo l'array in una stringa JSON
        $newTodoString = json_encode($allTodosList);
        
        #Scrivo i Todo aggiornati nel db
        file_put_contents('db/todo.json', $newTodoString);

    } else {

        #Altrimenti stampo un errore
        echo "Indice non valido.";

    }

} else {
    
    #Altrimenti stampo un errore
    echo "Indice mancante.";

}













#Dichiaro una variabile che corrisponde all'indice dell'Array
// $indexSingleTodo = $allTodosList[$_POST['index']];

#Applico una condizione che inverte il valore del completamento dell'elemento passato come argomento in POST
// $indexSingleTodo['done'] = !$indexSingleTodo['done'];

#Ritrasformo l'array in una stringa json
// $newTodoString = json_encode($allTodosList);

#Scrivo i nuovi Todo nel db
// file_put_contents('db/todo.json', $newTodoString);