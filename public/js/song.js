new Vue({
    el: "#root",
    data: {
        song: null,
        songId: document.getElementById('songId').value
    }
    ,
    mounted() {
        axios.get('/api/v1/songs/' + this.songId).then(response => this.song = response.data);
    }
    ,

})
;