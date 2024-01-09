<template>
    <div class="container">
        <div class="mt-5">
            <div class="card">
                <div class="card-header text-center">Blog</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 mb-0">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="blog.title" required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 mb-0">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" v-model="blog.description" required></textarea>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-outline-primary float-md-right"
                            type="submit"
                            @click.prevent="save">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Blog",
    data() {
        return {
            blog: {},
        }
    },
    methods: {
        save() {
            axios.post('/store', this.blog)
                .then(({data})=>{
                    window.alert(data.message);
                    this.blog = {}
                }).catch((errors)=>{
                window.alert(errors.message);
            })
        },
        handlePusherEvent(data) {
            // Handle the received data
            console.log('calling')
            // this.messages.push(data);
        },
    },


    created() {
        const pusher = new Pusher('2d948620c6444dd11dcc', {
            cluster: 'ap2',
        });

        const channel = pusher.subscribe('blog-channel');
        channel.bind('blog-event', this.handlePusherEvent);
    },
}
</script>

<style scoped>

</style>
