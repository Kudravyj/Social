<template>
    <div>
        <button class="btn" @click="followuser" v-if="status">Add to friend</button>
        <button class="btn" @click="followuser" v-else>delete</button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },
        methods: {
            followuser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    });
            }
        }
    }
</script>
