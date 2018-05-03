Vue.component('song', {
    template: `
    <div class="media song-item border">
                <div class="">
                    <a href="#">
                        <img class="media-object" src="/images/play-button.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><slot name="songName"></slot></h4>
                    <p class="mediumFont"><slot name="artistName"></slot></p>
                </div>
                <div>
                    <button type="button" @click="selectMonday()" class="btn btn-lg" :class="{'btn-dark' : isActiveMonday }">Monday</button>
                    <button type="button" @click="selectFriday()" class="btn btn-lg" :class="{'btn-dark' : isActiveFriday }">Friday</button>
                </div>
            </div>
    `,
    props: {
        selectedMonday: false,
        selectedFriday: false
    },
    data() {
        return {
            isActiveMonday: false,
            isActiveFriday: false
        }
    },
    methods: {
        selectMonday() {
            this.isActiveMonday = true;
            this.isActiveFriday = false;
        },
        selectFriday() {
            this.isActiveMonday = false;
            this.isActiveFriday = true;
        }
    },
    mounted() {
        this.isActiveMonday = this.selectedMonday;
        this.isActiveFriday = this.selectedFriday
    }
});


new Vue({
    el: "#root",
    data: {
        search: '',
        songs: []

    },
    mounted() {
        axios.get('/api/v1/songs').then(response => this.songs = response.data);
    },

    computed:
        {
            filteredSongs: function () {
                var self = this;
                return this.songs.filter(function (songs) {
                    return songs.name.toLowerCase().indexOf(self.search.toLowerCase()) >= 0;
                });
            }
        }
});