function initialState() {
    return {
        item: {
            id: null,
            videourl: null,
            user_id: null,
            title: null,
            location: null,
            datetime: null,
            description: null,
            viewed: null,
        },
        
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            

            axios.post('/api/v1/uservideos', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            

            axios.post('/api/v1/uservideos/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/uservideos/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setVideourl({ commit }, value) {
        commit('setVideourl', value)
    },
    setUser_id({ commit }, value) {
        commit('setUser_id', value)
    },
    setTitle({ commit }, value) {
        commit('setTitle', value)
    },
    setLocation({ commit }, value) {
        commit('setLocation', value)
    },
    setDatetime({ commit }, value) {
        commit('setDatetime', value)
    },
    setDescription({ commit }, value) {
        commit('setDescription', value)
    },
    setViewed({ commit }, value) {
        commit('setViewed', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setVideourl(state, value) {
        state.item.videourl = value
    },
    setUser_id(state, value) {
        state.item.user_id = value
    },
    setTitle(state, value) {
        state.item.title = value
    },
    setLocation(state, value) {
        state.item.location = value
    },
    setDatetime(state, value) {
        state.item.datetime = value
    },
    setDescription(state, value) {
        state.item.description = value
    },
    setViewed(state, value) {
        state.item.viewed = value
    },
    
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
