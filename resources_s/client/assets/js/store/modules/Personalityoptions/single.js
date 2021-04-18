function initialState() {
    return {
        item: {
            id: null,
            questionid: [],
            options: null,
        },
        personalityquestionsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    personalityquestionsAll: state => state.personalityquestionsAll,
    
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

            if (_.isEmpty(state.item.questionid)) {
                params.delete('questionid')
            } else {
                for (let index in state.item.questionid) {
                    params.set('questionid['+index+']', state.item.questionid[index].id)
                }
            }

            axios.post('/api/v1/personalityoptions', params)
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

            if (_.isEmpty(state.item.questionid)) {
                params.delete('questionid')
            } else {
                for (let index in state.item.questionid) {
                    params.set('questionid['+index+']', state.item.questionid[index].id)
                }
            }

            axios.post('/api/v1/personalityoptions/' + state.item.id, params)
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
        axios.get('/api/v1/personalityoptions/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchPersonalityquestionsAll')
    },
    fetchPersonalityquestionsAll({ commit }) {
        axios.get('/api/v1/personalityquestions')
            .then(response => {
                commit('setPersonalityquestionsAll', response.data.data)
            })
    },
    setQuestionid({ commit }, value) {
        commit('setQuestionid', value)
    },
    setOptions({ commit }, value) {
        commit('setOptions', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setQuestionid(state, value) {
        state.item.questionid = value
    },
    setOptions(state, value) {
        state.item.options = value
    },
    setPersonalityquestionsAll(state, value) {
        state.personalityquestionsAll = value
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
