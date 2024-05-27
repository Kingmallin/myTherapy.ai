import { defineStore } from 'pinia';
import { useAuthStore } from './useAuthStore';

const baseUrl = `${import.meta.env.VITE_API_URL}/admin`;

export const userStore = defineStore('users', {
    state: () => ({
        users: [],
        authStore: useAuthStore(),
        token: useAuthStore().token
    }),
    actions: {
        async fetchUser() {
            const response = await axios.get(baseUrl, {
                headers: { Authorization: `Bearer ${this.token}` }
            });
            this.users = response.data;
            if (this.user === 'undefined' || this.user === null) {
                window.location = '/';
            }
        }
    }
});
