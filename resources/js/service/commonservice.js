export default{
  data(){

  },

  methods: {
    async callApi(method, url , objet){

      try {

        await axios({
          method: method,
          url: url,
          data: objet,
        });

      } catch (e) {
        
        return e.response;

      }
    }
  }
}