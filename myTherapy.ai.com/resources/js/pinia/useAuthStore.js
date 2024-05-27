import { defineStore } from 'pinia';
import axios from 'axios';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        token: localStorage.getItem('token') || '',
        user: {}
    }),
    actions: {
        setToken(token) {
            this.token = token;
            localStorage.setItem('token', token);
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        },
        clearToken() {
            this.token = '';
            localStorage.removeItem('token');
            delete axios.defaults.headers.common['Authorization'];
        },
        async login(credentials) {
            const { data } = await axios.post('/login', credentials);
            if (data.token) {
                this.setToken(data.token);
                await this.fetchUser();
            }
        },
        async logout() {
            await axios.post('/logout');
            this.clearToken();
            this.user = {};
        }
    }
});
