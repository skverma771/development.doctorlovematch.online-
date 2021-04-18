function initialState() {
    return {
        item: {
            id: null,
            msg_id: null,
            sender_id: null,
            receiver_id: null,
            notifystatus: null,
            notifycancelstatus: null,
            paymentstatus: null,
            readstatus: null,
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

            

            axios.post('/api/v1/messageconections', params)
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

            

            axios.post('/api/v1/messageconections/' + state.item.id, params)
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
        axios.get('/api/v1/messageconections/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setMsg_id({ commit }, value) {
        commit('setMsg_id', value)
    },
    setSender_id({ commit }, value) {
        commit('setSender_id', value)
    },
    setReceiver_id({ commit }, value) {
        commit('setReceiver_id', value)
    },
    setNotifystatus({ commit }, value) {
        commit('setNotifystatus', value)
    },
    setNotifycancelstatus({ commit }, value) {
        commit('setNotifycancelstatus', value)
    },
    setPaymentstatus({ commit }, value) {
        commit('setPaymentstatus', value)
    },
    setReadstatus({ commit }, value) {
        commit('setReadstatus', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setMsg_id(state, value) {
        state.item.msg_id = value
    },
    setSender_id(state, value) {
        state.item.sender_id = value
    },
    setReceiver_id(state, value) {
        state.item.receiver_id = value
    },
    setNotifystatus(state, value) {
        state.item.notifystatus = value
    },
    setNotifycancelstatus(state, value) {
        state.item.notifycancelstatus = value
    },
    setPaymentstatus(state, value) {
        state.item.paymentstatus = value
    },
    setReadstatus(state, value) {
        state.item.readstatus = value
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
