import axios from 'axios';
import { useAuthStore } from './pinia/useAuthStore';

const authStore = useAuthStore();

axios.defaults.baseURL = import.meta.env.VITE_API_URL;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.interceptors.request.use(config => {
    const token = authStore.token;
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default axios;
