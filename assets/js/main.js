var app = new Vue({
	el: '#app',
	data: {
		items: null,
		loading: true,
		errored: false,
		popin: false,
		alertMessage: false,
		title_value: "",
		steps_value: "",
		index_value: "",
		modificated_popin: false
	},
	methods: {
		removeElement: function(index) {
			axios
				.delete('api/public/recipes/' + index)
				.then(response => {
					this.items = response.data
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

		},
		newReceipt: function(title, steps) {
			this.title_value = "";
			this.steps_value = "";
			this.index_value = "";
		},
		openModificationPopin: function(index, title, steps) {
			this.title_value = title;
			this.steps_value = steps;
			this.index_value = index;
		},
		editElement: function() {
			title_value = document.getElementById('title').value;
			steps_value = document.getElementById('steps').value;
			axios
				.put('api/public/recipes/' + this.index_value, {
					title: title_value,
					steps: steps_value
				})
				.then(response => {
					this.items = response.data
					console.log(response.data);
				})
				.catch(error => {
					console.log(error)
					this.errored = true
				})
				.finally(() => location.reload())
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