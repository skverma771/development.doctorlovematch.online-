var uploadfile=async function (col_name,id,file,booking_id) {
// console.log(itinerary_places_time);
    window.axios = require('axios');
    const config = {
        headers: {
            'content-type': 'multipart/form-data',
        }
    }
    let d;
    let params = new FormData();


        var col=col_name?col_name:"doc";
        params.append("file",file);
        params.set("ref_id", booking_id);
        params.set("collection_name", col);
        params.set("ref_key",id );

        return    axios.post('/api/v1/upload', params,config)


}

export default uploadfile


