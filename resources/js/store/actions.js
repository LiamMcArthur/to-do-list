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
    fetchChecked({commit}) {
        axios.get('/to-do-list/get-checked')
            .then(res => {
                commit('FETCH_CHECKED', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    updateChecked({commit}, ids) {
        axios.post('/to-do-list/update-checked', ids)
            .then(res => {
                commit('UPDATE_CHECKED', res.data)
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
