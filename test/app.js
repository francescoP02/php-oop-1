new Vue ({
    el: '#app',
    data: {
        items: [],
        name: "",
        genre: "",
        year: "",
        vote: "",
    },
    mounted() {
        axios.get('read.php').then((response) => {
            this.items = response.data;
        });
    },
    methods: {
        saveMovie() {

            const params = new URLSearchParams();

            params.append('name', this.name);
            params.append('genre', this.genre);
            params.append('year', this.year);
            params.append('vote', this.vote);

            axios.post('write.php', params).then((response) => {
                this.items = response.data;
                this.name = '';
                this.genre = '';
                this.year = '';
                this.vote = '';
            });

        },

    }
})