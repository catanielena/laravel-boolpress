<template>
    <main>
        <ul>
            <li v-for="post in posts" :key="post.id">{{post.title}}</li>
        </ul>
    </main>
</template>

<script>

export default {
    name: 'Main',
    data() {
        return {
            posts:[]
        }
    },
    mounted() {
        axios.get('/api/posts')
        .then((response)=> {
            return  this.posts = response.data.data;
        })
        .catch((error)=> {
            console.log(error);
        })
    }
}
</script>