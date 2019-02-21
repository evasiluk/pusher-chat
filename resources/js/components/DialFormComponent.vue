<template>
    <div>
		<input class="form-control input-sm" v-model="newMessage" placeholder="Enter your message" v-on:keyup.enter="sendMessage" required>
		<button class="btn btn-primary" v-on:click="sendMessage">Send</button>
	</div>
</template>

<script>
    export default {
		data: function() {
			return {
				newMessage: '',
			}
		},
		props: ['user'],
        mounted() {
            console.log('Component mounted.')
        },
		methods: {
			sendMessage: function(){
				//alert(this.newMessage);
				this.$emit('sendmessage', {message: this.newMessage, user: this.user});
				this.newMessage = '';
			}
		}
    }
</script>
