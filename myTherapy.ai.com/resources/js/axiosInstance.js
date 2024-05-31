import axios from 'axios';
import { useUserStore } from './pinia/userStore.js'; // Adjust the path to your store

// Create an Axios instance
const axiosInstance = axios.create({
  baseURL: import.meta.env.VITE_API_URL // Set the base URL for your API
});

// Request interceptor to add the Authorization header
axiosInstance.interceptors.request.use(config => {
  const userStore = useUserStore();
  const token = userStore.token;

  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  
  return config;
}, error => {
  return Promise.reject(error);
});

export default axiosInstance;
