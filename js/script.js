const { createApp } = Vue;

createApp({
  data() {
    return {
      dischi: [],
      pref: [],
      apiUrl: "http://localhost/boolean/php-dischi-json/server.php",
    };
  },
  created() {
    this.fetchDischi();
  },
  methods: {
    fetchDischi() {
      axios
        .get(this.apiUrl)
        .then((resp) => {
          this.dischi = resp.data.result;
          console.log(this.dischi);
        });
    },

    taggleLike(index) {
      const data = {
        action: "toggle-like",
        disc_index: index
      };
      axios
        .post(this.apiUrl, data, {
            headers: {
                "Content-type": "multipart/form-data",
              },
            })
        .then((resp) => {
        this.dischi = resp.data.result;
          // console.log(resp);
        });
    },
    addFilter() {
      if ( this.pref.length >= 1 ) {
        axios
          .get(this.apiUrl, {
            params: {
              like: true,
            },
          })
          .then((resp) => {
            console.log(resp);
              this.dischi = resp.data.result;
              console.log(this.dischi);
            
          });
      }  else {
        this.fetchDischi();
      }
    },
  },
}).mount("#app");
