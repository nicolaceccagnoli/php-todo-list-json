const { createApp } = Vue;

createApp({
    data() {
        return {
            message: 'PHP ToDo List JSON',

            // Dichiaro un array vuoto che riempirò con la chiamata all'API 
            todos: []
        };
    },
    methods: {
        // Creo una funzione che cambia il completamento dei Task
        changeDone (index) {

            // Applico un controllo per cui il valore di 'done' di ogni singolo todo viene invertito
            this.todos[index].done = !this.todos[index].done;

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