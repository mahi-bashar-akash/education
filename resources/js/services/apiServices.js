import axios from "axios";

let headers = {};

const apiService = {
    POST: (url, param, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.post(url, param, { headers: headers }).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
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

    GET: (url, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.get(url, { headers: headers }).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 403) {
                console.log('Forbidden Error');
            }
            if (errorCode === 401) {
                console.log('Unauthorized Error');
            }
        });
    },

    PUT: (url, param, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.put(url, param, { headers: headers }).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
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
            if (response.status === 200) {
                callback(response.data);
            }
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

    DELETE: (url, callback) => {
        headers = {
            'Content-Type': 'application/json; charset=utf-8',
        };
        axios.delete(url, { headers: headers }).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
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

    UPLOAD: (url, media, callback) => {
        const mediaHeaders = {
            "Content-Type": "multipart/form-data",
        };
        axios.post(url, media, { headers: mediaHeaders }).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 401) {
                console.log('Unauthorized Error');
            }
        });
    },

    clearErrorHandler() {
        document.querySelector('.error-report').textContent = '';
    }
};

export default apiService;
