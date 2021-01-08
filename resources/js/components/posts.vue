<template>

</template>

<script>
    export default {
        mounted() {
            this.fetchPosts()
        },
        data() {
            return {
                posts: [],
                post: {
                    userIsLogged: '',
                    title: '',
                    content: '',
                    created_at: '',
                    author: ''
                }
            }
        },
        methods: {
            fetchPosts:function(){
                axios.get('/api/posts').then(res=>{
                    if(res.status==200){
                        this.posts=res.data;
                    }
                }).catch(err=>{
                    console.log(err);
                });
            },
            createPosts:function (){

            }
        }
    }
</script>
