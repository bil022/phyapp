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
       input: '# Q1\nlet\na=1\nb=-2^2\nc=3\nin\nx=quad(a,b,c)',
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
            const resp = await axios.post('cc.php', info);
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
