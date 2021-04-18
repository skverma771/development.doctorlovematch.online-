function initialState() {
    return {
        item: {
            id: null,
            user_id: null,
            first_name: null,
            last_name: null,
            zipcode: null,
            country: null,
            payment_status: null,
            txn_id: null,
            txn_type: null,
            payer_email: null,
            payment_gross: null,
            created: null,
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

            

            axios.post('/api/v1/payments', params)
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

            

            axios.post('/api/v1/payments/' + state.item.id, params)
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
        axios.get('/api/v1/payments/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setUser_id({ commit }, value) {
        commit('setUser_id', value)
    },
    setFirst_name({ commit }, value) {
        commit('setFirst_name', value)
    },
    setLast_name({ commit }, value) {
        commit('setLast_name', value)
    },
    setZipcode({ commit }, value) {
        commit('setZipcode', value)
    },
    setCountry({ commit }, value) {
        commit('setCountry', value)
    },
    setPayment_status({ commit }, value) {
        commit('setPayment_status', value)
    },
    setTxn_id({ commit }, value) {
        commit('setTxn_id', value)
    },
    setTxn_type({ commit }, value) {
        commit('setTxn_type', value)
    },
    setPayer_email({ commit }, value) {
        commit('setPayer_email', value)
    },
    setPayment_gross({ commit }, value) {
        commit('setPayment_gross', value)
    },
    setCreated({ commit }, value) {
        commit('setCreated', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setUser_id(state, value) {
        state.item.user_id = value
    },
    setFirst_name(state, value) {
        state.item.first_name = value
    },
    setLast_name(state, value) {
        state.item.last_name = value
    },
    setZipcode(state, value) {
        state.item.zipcode = value
    },
    setCountry(state, value) {
        state.item.country = value
    },
    setPayment_status(state, value) {
        state.item.payment_status = value
    },
    setTxn_id(state, value) {
        state.item.txn_id = value
    },
    setTxn_type(state, value) {
        state.item.txn_type = value
    },
    setPayer_email(state, value) {
        state.item.payer_email = value
    },
    setPayment_gross(state, value) {
        state.item.payment_gross = value
    },
    setCreated(state, value) {
        state.item.created = value
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
