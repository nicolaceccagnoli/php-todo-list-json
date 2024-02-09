const { createApp } = Vue;

createApp({
    data() {
        return {
            message: 'PHP ToDo List JSON',

            // Dichiaro un array vuoto che riempirò con la chiamata all'API 
            todos: [],

            // Dichiaro una variabile con stringa vuota per il nuovo Todo dell'utente
            newTodo: ''
        };
    },
    methods: {
        // Creo una funzione che cambia il completamento dei Task
        changeDone (index) {

            // Applico un controllo per cui il valore di 'done' di ogni singolo todo viene invertito
            this.todos[index].done = !this.todos[index].done;

        },
        // Creo una funzione che permetta di aggiungere nuovi task
        createObjTodos() {
            // Faccio una nuova chiamata axios con metodo POST al file PHP con le istruzioni per creare il nuovo Todo
            axios
            .post('http://localhost:8888/BOOLEAN-114/php-todo-list-json/backend/createTodo.php', {
                    // Gli passo come parametro la variabile che interagisce con l'input dell'utente
                    text: this.newTodo
                },
                {
                    // Aggiungo un parametro che specifica al Server che tipo di dato gli sto passando (tipo file)
                    headers: {
                        'Content-Type' : 'multipart/form-data'
                    }
                }
            )
            // Gestisco la risposta della chiamata
            .then(response => {
                this.todos.push({
                    task: this.newTodo,
                    done: false
                });

                this.newTodo = '';

            })

        }
    },
    mounted() {
        // Faccio la chiamata alla nostra API
        axios
            .get('http://localhost:8888/BOOLEAN-114/php-todo-list-json/backend/todo.php')
            .then((response) => {
                console.log(response.data);
                this.todos = response.data;
            })
    }
}).mount('#app');