function initialState() {
    return {
        item: {
            id: null,
            code: null,
            name: null,
            continent: null,
            region: null,
            surfacearea: null,
            indepyear: null,
            population: null,
            lifeexpectancy: null,
            gnp: null,
            gnpold: null,
            localname: null,
            governmentform: null,
            headofstate: null,
            capital: null,
            code2: null,
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

            

            axios.post('/api/v1/countrydatas', params)
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

            

            axios.post('/api/v1/countrydatas/' + state.item.id, params)
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
        axios.get('/api/v1/countrydatas/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setCode({ commit }, value) {
        commit('setCode', value)
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setContinent({ commit }, value) {
        commit('setContinent', value)
    },
    setRegion({ commit }, value) {
        commit('setRegion', value)
    },
    setSurfacearea({ commit }, value) {
        commit('setSurfacearea', value)
    },
    setIndepyear({ commit }, value) {
        commit('setIndepyear', value)
    },
    setPopulation({ commit }, value) {
        commit('setPopulation', value)
    },
    setLifeexpectancy({ commit }, value) {
        commit('setLifeexpectancy', value)
    },
    setGnp({ commit }, value) {
        commit('setGnp', value)
    },
    setGnpold({ commit }, value) {
        commit('setGnpold', value)
    },
    setLocalname({ commit }, value) {
        commit('setLocalname', value)
    },
    setGovernmentform({ commit }, value) {
        commit('setGovernmentform', value)
    },
    setHeadofstate({ commit }, value) {
        commit('setHeadofstate', value)
    },
    setCapital({ commit }, value) {
        commit('setCapital', value)
    },
    setCode2({ commit }, value) {
        commit('setCode2', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setCode(state, value) {
        state.item.code = value
    },
    setName(state, value) {
        state.item.name = value
    },
    setContinent(state, value) {
        state.item.continent = value
    },
    setRegion(state, value) {
        state.item.region = value
    },
    setSurfacearea(state, value) {
        state.item.surfacearea = value
    },
    setIndepyear(state, value) {
        state.item.indepyear = value
    },
    setPopulation(state, value) {
        state.item.population = value
    },
    setLifeexpectancy(state, value) {
        state.item.lifeexpectancy = value
    },
    setGnp(state, value) {
        state.item.gnp = value
    },
    setGnpold(state, value) {
        state.item.gnpold = value
    },
    setLocalname(state, value) {
        state.item.localname = value
    },
    setGovernmentform(state, value) {
        state.item.governmentform = value
    },
    setHeadofstate(state, value) {
        state.item.headofstate = value
    },
    setCapital(state, value) {
        state.item.capital = value
    },
    setCode2(state, value) {
        state.item.code2 = value
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
