import axios from "axios";

let headers = {};

const apiService = {

    headerContent: {
        'Content-Type': 'application/json; charset=utf-8',
    },

    mediaHeaderContent: {
        "Content-Type": "multipart/form-data",
    },

    POST: (url, param, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.post(url, param, { headers: headers }).then((response) => {
            callback(response.data);
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 401) {
                console.log('Unauthorized Error');
            }
            if (errorCode === 403) {
                console.log('Forbidden Error');
            }
        });
    },

    GET: (url, params, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        }
        axios.get(url, {params: params}, {headers: headers}).then((response) => {
            callback(response.data);
        }).catch(err => {
            callback(err?.response?.data)
        })
    },

    PUT: (url, param, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.put(url, param, { headers: headers }).then((response) => {
            callback(response.data);
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 401) {
                console.log('Unauthorized Error');
            }
            if (errorCode === 403) {
                console.log('Forbidden Error');
            }
        });
    },

    PATCH: (url, param, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.patch(url, param, { headers: headers }).then((response) => {
            callback(response.data);
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 401) {
                console.log('Unauthorized Error');
            }
            if (errorCode === 403) {
                console.log('Forbidden Error');
            }
        });
    },

    DELETE: (url, params, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        }
        axios.delete(url, {params: params}, {headers: headers}).then((response) => {
            callback(response.data);
        }).catch(err => {
            callback(err.response.data)
        })
    },

    UPLOAD: (url, media, callback) => {
        const mediaHeaders = {
            "Content-Type": "multipart/form-data",
        };
        axios.post(url, media, { headers: mediaHeaders }).then((response) => {
            callback(response.data);
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 401) {
                console.log('Unauthorized Error');
            }
        });
    },

    clearErrorHandler() {
        let group = document.querySelectorAll('.form-group');
        group.forEach((e) => {
            let error = e.querySelector('.error-report')
            if(error != null) {
                error.classList.remove('error-report');
                error.textContent = '';
            }
        })
    }

};

export default apiService;
