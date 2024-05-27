// useTherapist.js
import { ref, reactive } from 'vue';
import axios from 'axios';

export default function useTherapist() {
    // Define reactive state variables
    const therapists = ref([]);
    const loading = ref(false);
    const error = ref(null);

    // Function to fetch therapist data from an API
    const fetchTherapists = async () => {
        try {
            loading.value = true;
            const response = await axios.get('/api/therapists');
            therapists.value = response.data;
            loading.value = false;
        } catch (err) {
            console.error('Error fetching therapists:', err);
            error.value = 'Error fetching therapists';
            loading.value = false;
        }
    };

    const editTherapists = async (data) => {
        try {
            loading.value = true;
            const response = await axios.put('/api/therapists',
                {

                });
            therapists.value = response.data;
            loading.value = false;
        } catch (err) {
            console.error('Error fetching therapists:', err);
            error.value = 'Error fetching therapists';
            loading.value = false;
        }
    };

    const createTherapists = async (data) => {
        try {
            loading.value = true;
            const response = await axios.post('/api/therapists',
                {

                });
            therapists.value = response.data;
            loading.value = false;
        } catch (err) {
            console.error('Error fetching therapists:', err);
            error.value = 'Error fetching therapists';
            loading.value = false;
        }
    };

    const removeTherapists = async (id) => {
        try {
            loading.value = true;
            const response = await axios.delete('/api/therapists/' + id);
            therapists.value = response.data;
            loading.value = false;
        } catch (err) {
            console.error('Error fetching therapists:', err);
            error.value = 'Error fetching therapists';
            loading.value = false;
        }
    };

    return {
        therapists,
        loading,
        error,
        fetchTherapists,
        editTherapists,
        createTherapists,
        removeTherapists
    };
}
