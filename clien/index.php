<!DOCTYPE html>
<html>
<head>
	<title>Client</title>
</head>
<body>

	<main id="app">
		<div v-for="artikel in artikels">
			<div v-text="artikel.title"></div>
			<div>{{ artikel.body }}</div>
			<div>Terbit: {{ artikel.published}}</div>
			<hr>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/vue@2.7.4/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js"></script>

	<script>
		let app = new Vue({
			el:'#app',

			data(){
				return{
					artikels:[],
				}
			},

			created(){
				this.fetchArtikel();
			},

			methods:{
				async fetchArtikel(){
					let response = await axios.get('http://127.0.0.1:8000/api/artikel');
					this.artikels = response.data.data;
				}
			},


		})

	</script>

</body>
</html>