import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

// Konfigurasi URL Backend
window.VITE_BACKEND_URL = import.meta.env.VITE_BACKEND_URL || 'http://127.0.0.1:8000';
window.axios.defaults.baseURL = import.meta.env.VITE_BACKEND_API_URL || 'http://127.0.0.1:8000/api';

// Interceptor untuk menyertakan Bearer Token di setiap request
window.axios.interceptors.request.use(config => {
    // Cek apakah kita di portal admin atau user
    const isAdminPath = window.location.pathname.startsWith('/admin');
    const token = isAdminPath 
        ? localStorage.getItem('admin_token') 
        : localStorage.getItem('ppdb_token');
        
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
}, error => {
    return Promise.reject(error);
});
