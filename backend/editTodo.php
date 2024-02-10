<?php

if ( 
    isset($_POST['text'])
    &&
    strlen($_POST['text']) > 4
) {

#Recupero i Todo esistenti
$allTodoString = file_get_contents('db/todo.json');

#Trasformo la scritta JSON in un Array di Array associativi
$allTodosListTwo = json_decode($allTodoString, true);

# Controllo se l'indice passato tramite POST esiste nell'array
if(isset($_POST['index'])) {

    #Dichiaro una variabile che contiene l'indice del todo da modificare
    $index = $_POST['index'];

    #Controllo se l'indice esiste nell'array
    if(array_key_exists($index, $allTodosListTwo)) {

        #Inverto lo stato 'done' del todo
        $allTodosListTwo[$index]['text'] = $_POST['text'];
        
        #Ritrasformo l'array in una stringa JSON
        $newTodoString = json_encode($allTodosListTwo);
        
        #Scrivo i Todo aggiornati nel db
        file_put_contents('db/todo.json', $newTodoString);

        echo json_encode([
            'message' => 'ok',
            'code' => 200
        ]);
        
    } else {

        #Altrimenti stampo un errore
        echo "Indice non valido.";

    }

} else {
    
    #Altrimenti stampo un errore
    echo "Indice mancante.";

}

} else {
    
    #Altrimenti stampo un errore
    echo "Indice mancante.";

}
      