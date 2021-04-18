function initialState() {
    return {
        item: {
            id: null,
            catgories: null,
            userid: null,
            memberid: null,
            notifystatus: null,
            datetime: null,
            requestid: null,
            notifycancelstatus: null,
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

            

            axios.post('/api/v1/usernotifications', params)
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

            

            axios.post('/api/v1/usernotifications/' + state.item.id, params)
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
        axios.get('/api/v1/usernotifications/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setCatgories({ commit }, value) {
        commit('setCatgories', value)
    },
    setUserid({ commit }, value) {
        commit('setUserid', value)
    },
    setMemberid({ commit }, value) {
        commit('setMemberid', value)
    },
    setNotifystatus({ commit }, value) {
        commit('setNotifystatus', value)
    },
    setDatetime({ commit }, value) {
        commit('setDatetime', value)
    },
    setRequestid({ commit }, value) {
        commit('setRequestid', value)
    },
    setNotifycancelstatus({ commit }, value) {
        commit('setNotifycancelstatus', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setCatgories(state, value) {
        state.item.catgories = value
    },
    setUserid(state, value) {
        state.item.userid = value
    },
    setMemberid(state, value) {
        state.item.memberid = value
    },
    setNotifystatus(state, value) {
        state.item.notifystatus = value
    },
    setDatetime(state, value) {
        state.item.datetime = value
    },
    setRequestid(state, value) {
        state.item.requestid = value
    },
    setNotifycancelstatus(state, value) {
        state.item.notifycancelstatus = value
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
