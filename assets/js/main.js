var app = new Vue({
	el: '#app',
	data: {
		items: null,
		loading: true,
		errored: false
	},
	mounted() {
		console.log(window.location.pathname);
		axios
			.get('api/public/recipes')
			.then(response => {
				this.items = response.data
				console.log(response.data);
			})
			.catch(error => {
				console.log(error)
				this.errored = true
			})
			.finally(() => this.loading = false)
	}
})