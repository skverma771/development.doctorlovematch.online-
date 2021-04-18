function built_remark(remark) {
    return {"remark":remark,"agent":document.querySelector("meta[name='user-name']").getAttribute('content'),"time":Math.round(+new Date()/1000)}

}
// function built_interaction(remark) {
//     return {"remark":remark,"agent":document.querySelector("meta[name='user-name']").getAttribute('content'),"time":Math.round(+new Date()/1000)}
//
// }



export default built_remark


