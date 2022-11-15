<template>
  <v-container>
    <v-form>
     <v-row>
      <v-col>
	<v-btn class="mr-4" @click="submit">submit</v-btn>
      </v-col>
     </v-row>
    <v-row class="text-center">
      <v-col class="mb-4">
	<v-textarea
	v-model='input'
        filled
        label="Quadratic"
        auto-grow
        ></v-textarea>
      </v-col>
      <v-col class="mb-4">
	<v-textarea
	v-model='output'
        filled
        auto-grow
      ></v-textarea>
      </v-col>
    </v-row>
    </v-form>
  </v-container>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'HelloWorld',

    data: () => ({
       input: 'let\na=1\nin\nb=a^2',
       output: 'outputs'
    }),
    methods: {
      update(s) {
        this.output=s;
      }, 
      submit () {
        this.output='submitting';
        let info = { input: this.input };
	const postData = async() => {
          try {
            const resp = await axios.post('index.php', info);
            this.update(resp.data);
          } catch (err) {
            this.update(err);
          }
      };
      postData();
    }
  }
}
</script>
