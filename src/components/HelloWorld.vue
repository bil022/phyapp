<template>
  <v-container>
    <v-row class="text-center">
      <v-col class="mb-4">
	<v-form>
	<v-textarea
        name="input"
        filled
        label="Quadratic"
        auto-grow
        value="let
a=1
in
b=a"
      ></v-textarea>
      <v-col>
      </v-col>
	<v-btn class="mr-4" @click="submit">submit</v-btn>
	</v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'HelloWorld',

    data: () => ({
    }),
    methods: {
      submit () {
        let data = { name: this.name, selectPessoa: this.selectPessoa }
        axios.post('index.php', data)
          .then(function (response) {
            console.log(response);
           })
          .catch(function (error) {
            console.log(error);
          });
      }
    }
  }
</script>
