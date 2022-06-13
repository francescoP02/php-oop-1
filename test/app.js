new Vue ({
    el: '#app',
    data: {
        items: [],
        name: "",
        genre: "",
        year: "",
        voteList: [],
        avrVote: "",
    },
    mounted() {
        axios.get('read.php').then((response) => {
            this.items = response.data;
        });
    },
    methods: {

        saveVotes(number) {
            this.newVote = number;
            this.voteList.push(this.newVote);
            console.log(this.voteList);
        },

        getAverage(voteList) {
            this.sum = 0;

            for (let i = 0; i < this.voteList.length; i++) {
                this.sum += this.voteList[i];
            }

            this.avrVote = this.sum / this.voteList.length;
            
            console.log(this.avrVote);
        },

        saveMovie(voteList) {

            const params = new URLSearchParams();

            params.append('name', this.name);
            params.append('genre', this.genre);
            params.append('year', this.year);
            params.append('avrVote', this.avrVote);

            axios.post('write.php', params).then((response) => {
                this.items = response.data;
                this.name = '';
                this.genre = '';
                this.year = '';
                this.avrVote = '';
            });

        },

        reset() {
            axios.get('reset.php').then(() => {
                this.items = [];
            });
        }

    }
})