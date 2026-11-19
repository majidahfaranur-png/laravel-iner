import axios from 'axios';

// Sediakan Axios secara global agar permintaan AJAX mengikuti format yang diharapkan Laravel.
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
