var app = new Vue({
	el: '#app',
	data: {
		items: null,
		loading: true,
		errored: false,
		popin: false,
		alertMessage: false
	},
	methods: {
		removeElement: function(index) {
			axios
				.delete('api/public/recipes/' + index)
				.then(response => {
					this.items = response.data
					console.log(response.data);
				})
				.catch(error => {
					console.log(error)
					this.errored = true
				})
				.finally(() => location.reload())
		},
		addElement: function() {
			title_value = document.getElementById('title').value;
			steps_value = document.getElementById('steps').value;

			if (title_value && steps_value) {
				axios.post('api/public/recipes', {
						title: title_value,
						steps: steps_value
					})
					.then(function(response) {
						console.log(response);
					})
					.catch(function(error) {
						console.log(error);
					})
					.finally(() => location.reload());
			} else {
				this.alertMessage = true
			}

		}
	},
	mounted() {
		axios
			.get('api/public/recipes')
			.then(response => {
				this.items = response.data
			})
			.catch(error => {
				console.log(error)
				this.errored = true
			})
			.finally(() => this.loading = false)
	}
})