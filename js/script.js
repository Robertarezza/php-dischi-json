const { createApp } = Vue;

createApp ({
    data() {
        return {
            dischi : []
        }
    },
    created() {
        axios
      .get("http://localhost/boolean/php-dischi-json/server.php")
      .then((resp) => {
       this.dischi = resp.data.result;
       console.log(this.dischi);
      });
    },
}). mount("#app");