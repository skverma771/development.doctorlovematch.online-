function initialState() {
    return {
        itemshow: {
            id: null,
            name: null,
            email: null,
            password: null,
            role: [],
            matchstatus: null,
            customer_id: null,
            status: null,
            cancelmembership: null,
            unsubscribeemail: null,
            usersubscribe: null,
            shareedit: null,
            sharetime: null,
            block: [],
            sendemail: null,
            lastvisitdate: null,
            activation: null,
            params: null,
            lastresettime: null,
            resetcount: null,
            otpkey: null,
            otep: null,
            requirereset: null,
            lookingfor: null,
            ethnicity: null,
            country: null,
            state: null,
            city: null,
            gender: null,
            personality: null,
            aboutme: null,
            dob: null,
            devicetype: null,
            devicetoken: null,
            facebookid: null,
            gmailid: null,
            ntcount: null,
            pictures:{'profile':'','gallery':[],'videos':[]},
            license:{'exp_date_from':'','exp_date_to':'','active_pack':''},
            block_arr:[]

        },
        item: {
            id: null,
            name: null,
            email: null,
            password: null,
            role: [],
            matchstatus: null,
            customer_id: null,
            status: null,
            cancelmembership: null,
            unsubscribeemail: null,
            usersubscribe: null,
            shareedit: null,
            sharetime: null,
            block: null,
            sendemail: null,
            lastvisitdate: null,
            activation: null,
            params: null,
            lastresettime: null,
            resetcount: null,
            otpkey: null,
            otep: null,
            requirereset: null,
            lookingfor: null,
            ethnicity: null,
            country: null,
            state: null,
            city: null,
            gender: null,
            personality: null,
            aboutme: null,
            dob: null,
            devicetype: null,
            devicetoken: null,
            facebookid: null,
            gmailid: null,
            ntcount: null,
            pictures:{'profile':'','gallery':[],'videos':[]},
            license:{'exp_date_from':'','exp_date_to':'','active_pack':''},
            block_arr:[]

        },
        rolesAll: [],
        countriesAll: [],
        statesAll: [],
        citiesAll: [],

        loading: false,
    }
}

const getters = {
    item: state => state.item,
    itemshow: state => state.itemshow,
    loading: state => state.loading,
    rolesAll: state => state.rolesAll,
    countriesAll: state => state.countriesAll,
    statesAll: state => state.statesAll,
    citiesAll: state => state.citiesAll,

}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if ( fieldName === 'pictures') {
                    params.set(fieldName, JSON.stringify(fieldValue));

            } else  if (typeof fieldValue !== 'object') {
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

            if (_.isEmpty(state.item.role)) {
                params.delete('role')
            } else {
                for (let index in state.item.role) {
                    params.set('role['+index+']', state.item.role[index].id)
                }
            }
            if (_.isEmpty(state.item.country)) {
                params.set('country_id', '')
            } else {
                params.set('country_id', state.item.country.id)
            }
            if (_.isEmpty(state.item.state)) {
                params.set('state_id', '')
            } else {
                params.set('state_id', state.item.state.id)
            }
            if (_.isEmpty(state.item.city)) {
                params.set('city_id', '')
            } else {
                params.set('city_id', state.item.city.id)
            }

            axios.post('/api/v1/users', params)
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

                if ( fieldName === 'pictures') {
                    params.set(fieldName, JSON.stringify(fieldValue));

                } else
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

            if (_.isEmpty(state.item.role)) {
                params.delete('role')
            } else {
                for (let index in state.item.role) {
                    params.set('role['+index+']', state.item.role[index].id)
                }
            }
            if (_.isEmpty(state.item.country)) {
                params.set('country_id', '')
            } else {
                params.set('country_id', state.item.country.id)
            }
            if (_.isEmpty(state.item.state)) {
                params.set('state_id', '')
            } else {
                params.set('state_id', state.item.state.id)
            }
            if (_.isEmpty(state.item.city)) {
                params.set('city_id', '')
            } else {
                params.set('city_id', state.item.city.id)
            }

            axios.post('/api/v1/users/' + state.item.id, params)
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
        axios.get('/api/v1/users/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchRolesAll')
    // dispatch('fetchCountriesAll')
    // dispatch('fetchStatesAll')
    // dispatch('fetchCitiesAll')
    },
    fetchRolesAll({ commit }) {
        axios.get('/api/v1/roles')
            .then(response => {
                commit('setRolesAll', response.data.data)
            })
    },
    fetchCountriesAll({ commit }) {
        axios.get('/api/v1/countries')
            .then(response => {
                commit('setCountriesAll', response.data.data)
            })
    },
    fetchStatesAll({ commit }) {
        axios.get('/api/v1/states')
            .then(response => {
                commit('setStatesAll', response.data.data)
            })
    },
    fetchCitiesAll({ commit }) {
        axios.get('/api/v1/cities')
            .then(response => {
                commit('setCitiesAll', response.data.data)
            })
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setPassword({ commit }, value) {
        commit('setPassword', value)
    },
    setRole({ commit }, value) {
        commit('setRole', value)
    },
    setMatchstatus({ commit }, value) {
        commit('setMatchstatus', value)
    },
    setCustomer_id({ commit }, value) {
        commit('setCustomer_id', value)
    },
    setStatus({ commit }, value) {
        commit('setStatus', value)
    },
    setCancelmembership({ commit }, value) {
        commit('setCancelmembership', value)
    },
    setUnsubscribeemail({ commit }, value) {
        commit('setUnsubscribeemail', value)
    },
    setUsersubscribe({ commit }, value) {
        commit('setUsersubscribe', value)
    },
    setShareedit({ commit }, value) {
        commit('setShareedit', value)
    },
    setSharetime({ commit }, value) {
        commit('setSharetime', value)
    },
    setBlock({ commit }, value) {
        commit('setBlock', value)
    },
    setSendemail({ commit }, value) {
        commit('setSendemail', value)
    },
    setLastvisitdate({ commit }, value) {
        commit('setLastvisitdate', value)
    },
    setActivation({ commit }, value) {
        commit('setActivation', value)
    },
    setParams({ commit }, value) {
        commit('setParams', value)
    },
    setLastresettime({ commit }, value) {
        commit('setLastresettime', value)
    },
    setResetcount({ commit }, value) {
        commit('setResetcount', value)
    },
    setOtpkey({ commit }, value) {
        commit('setOtpkey', value)
    },
    setOtep({ commit }, value) {
        commit('setOtep', value)
    },
    setRequirereset({ commit }, value) {
        commit('setRequirereset', value)
    },
    setLookingfor({ commit }, value) {
        commit('setLookingfor', value)
    },
    setEthnicity({ commit }, value) {
        commit('setEthnicity', value)
    },
    setCountry({ commit }, value) {
        commit('setCountry', value)
    },
    setState({ commit }, value) {
        commit('setState', value)
    },
    setCity({ commit }, value) {
        commit('setCity', value)
    },
    setGender({ commit }, value) {
        commit('setGender', value)
    },
    setPersonality({ commit }, value) {
        commit('setPersonality', value)
    },
    setAboutme({ commit }, value) {
        commit('setAboutme', value)
    },
    setDob({ commit }, value) {
        commit('setDob', value)
    },
    setDevicetype({ commit }, value) {
        commit('setDevicetype', value)
    },
    setDevicetoken({ commit }, value) {
        commit('setDevicetoken', value)
    },
    setFacebookid({ commit }, value) {
        commit('setFacebookid', value)
    },
    setGmailid({ commit }, value) {
        commit('setGmailid', value)
    },
    setNtcount({ commit }, value) {
        commit('setNtcount', value)
    },
    resetState({ commit }) {
        commit('resetState')
    },
    setItem({ commit }, value) {
        commit('setItem', value)
    },
    setItemshow({ commit }, value) {
        commit('setItemshow', value)
    },
}

const mutations = {
    setItemshow(state, item) {
        state.itemshow = item
        state.itemshow.pictures = JSON.parse(state.itemshow.pictures);

    },
    setItem(state, item) {
        state.item = item
        state.item.pictures = JSON.parse(state.item.pictures);

    },
    setName(state, value) {
        state.item.name = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setPassword(state, value) {
        state.item.password = value
    },
    setRole(state, value) {
        state.item.role = value
    },
    setMatchstatus(state, value) {
        state.item.matchstatus = value
    },
    setCustomer_id(state, value) {
        state.item.customer_id = value
    },
    setStatus(state, value) {
        state.item.status = value
    },
    setCancelmembership(state, value) {
        state.item.cancelmembership = value
    },
    setUnsubscribeemail(state, value) {
        state.item.unsubscribeemail = value
    },
    setUsersubscribe(state, value) {
        state.item.usersubscribe = value
    },
    setShareedit(state, value) {
        state.item.shareedit = value
    },
    setSharetime(state, value) {
        state.item.sharetime = value
    },
    setBlock(state, value) {
        state.item.block = value
    },
    setSendemail(state, value) {
        state.item.sendemail = value
    },
    setLastvisitdate(state, value) {
        state.item.lastvisitdate = value
    },
    setActivation(state, value) {
        state.item.activation = value
    },
    setParams(state, value) {
        state.item.params = value
    },
    setLastresettime(state, value) {
        state.item.lastresettime = value
    },
    setResetcount(state, value) {
        state.item.resetcount = value
    },
    setOtpkey(state, value) {
        state.item.otpkey = value
    },
    setOtep(state, value) {
        state.item.otep = value
    },
    setRequirereset(state, value) {
        state.item.requirereset = value
    },
    setLookingfor(state, value) {
        state.item.lookingfor = value
    },
    setEthnicity(state, value) {
        state.item.ethnicity = value
    },
    setCountry(state, value) {
        state.item.country = value
    },
    setState(state, value) {
        state.item.state = value
    },
    setCity(state, value) {
        state.item.city = value
    },
    setGender(state, value) {
        state.item.gender = value
    },
    setPersonality(state, value) {
        state.item.personality = value
    },
    setAboutme(state, value) {
        state.item.aboutme = value
    },
    setDob(state, value) {
        state.item.dob = value
    },
    setDevicetype(state, value) {
        state.item.devicetype = value
    },
    setDevicetoken(state, value) {
        state.item.devicetoken = value
    },
    setFacebookid(state, value) {
        state.item.facebookid = value
    },
    setGmailid(state, value) {
        state.item.gmailid = value
    },
    setNtcount(state, value) {
        state.item.ntcount = value
    },
    setRolesAll(state, value) {
        state.rolesAll = value
    },
    setCountriesAll(state, value) {
        state.countriesAll = value
    },
    setStatesAll(state, value) {
        state.statesAll = value
    },
    setCitiesAll(state, value) {
        state.citiesAll = value
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
