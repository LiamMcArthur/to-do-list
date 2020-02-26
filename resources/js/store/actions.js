let actions = {
    createPost({commit}, post) {
        axios.post('/to-do-list/store', post)
            .then(res => {
                commit('CREATE_POST', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchPosts({commit}) {
        axios.get('/to-do-list/get-posts')
            .then(res => {
                commit('FETCH_POSTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deletePost({commit}, post) {
        axios.delete(`/to-do-list/post/${post}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_POST', post)
            }).catch(err => {
            console.log(err)
        })
    }
};

export default actions
