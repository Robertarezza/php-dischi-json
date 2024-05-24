const { createApp } = Vue;

createApp({
  data() {
    return {
      dischi: [],
      apiUrl: "http://localhost/boolean/php-dischi-json/server.php",
    };
  },
  created() {
    axios
      .get(this.apiUrl)
      .then((resp) => {
        this.dischi = resp.data.result;
        console.log(this.dischi);
      });
  },
  methods: {
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
  },
}).mount("#app");
