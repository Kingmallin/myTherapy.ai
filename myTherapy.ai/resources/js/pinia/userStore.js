import { defineStore } from 'pinia';
import axios from 'axios';

const baseUrl = `${import.meta.env.VITE_API_URL}/admin`;

export const useUserStore = defineStore('userStore', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || '',
    }),
    actions: {
        fetchUser() {
            if (!this.token) return;

            axios.get(baseUrl, {
                headers: { Authorization: `Bearer ${this.token}` }
            })
            .then(response => {
                this.user = response.data;
            })
            .catch(error => {
                console.error(error);
                this.user = null;
                disconnect();
                localStorage.removeItem('token');
                window.location = '/';
            });
        },
        setToken(token) {
            this.token = token;
            localStorage.setItem('token', token);
        },
        logout() {
            this.user = null;
            this.token = '';
            localStorage.removeItem('token');
            window.location = '/';
        }
    },
    getters: {
        isAuthenticated(state) {
            return !!state.user;
        },
        getUser(state) {
            return state.user;
        },
    }
});
