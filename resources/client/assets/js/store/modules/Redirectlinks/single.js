function initialState() {
    return {
        item: {
            id: null,
            old_url: null,
            new_url: null,
            referer: null,
            comment: null,
            hits: null,
            published: null,
            created_date: null,
            modified_date: null,
            header: null,
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

            

            axios.post('/api/v1/redirectlinks', params)
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

            

            axios.post('/api/v1/redirectlinks/' + state.item.id, params)
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
        axios.get('/api/v1/redirectlinks/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setOld_url({ commit }, value) {
        commit('setOld_url', value)
    },
    setNew_url({ commit }, value) {
        commit('setNew_url', value)
    },
    setReferer({ commit }, value) {
        commit('setReferer', value)
    },
    setComment({ commit }, value) {
        commit('setComment', value)
    },
    setHits({ commit }, value) {
        commit('setHits', value)
    },
    setPublished({ commit }, value) {
        commit('setPublished', value)
    },
    setCreated_date({ commit }, value) {
        commit('setCreated_date', value)
    },
    setModified_date({ commit }, value) {
        commit('setModified_date', value)
    },
    setHeader({ commit }, value) {
        commit('setHeader', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setOld_url(state, value) {
        state.item.old_url = value
    },
    setNew_url(state, value) {
        state.item.new_url = value
    },
    setReferer(state, value) {
        state.item.referer = value
    },
    setComment(state, value) {
        state.item.comment = value
    },
    setHits(state, value) {
        state.item.hits = value
    },
    setPublished(state, value) {
        state.item.published = value
    },
    setCreated_date(state, value) {
        state.item.created_date = value
    },
    setModified_date(state, value) {
        state.item.modified_date = value
    },
    setHeader(state, value) {
        state.item.header = value
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
