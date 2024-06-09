import { ref } from 'vue';
import axios from '../../axiosInstance.js';

export default function useTherapist() {
  // Define reactive state variables
  const therapists = ref([]);
  const loading = ref(false);
  const error = ref(null);

  // Function to fetch therapist data from an API
  const fetchTherapists = () => {
    loading.value = true;
    axios.get('/therapist')
      .then(response => {
        therapists.value = response.data;
      })
      .catch(err => {
        console.error('Error fetching therapists:', err);
        error.value = 'Error fetching therapists';
      })
      .finally(() => {
        loading.value = false;
      });
  };

  const editTherapists = (data) => {
    loading.value = true;
    axios.put('/therapist', data)
      .then(response => {
        therapists.value = response.data;
      })
      .catch(err => {
        console.error('Error editing therapists:', err);
        error.value = 'Error editing therapists';
      })
      .finally(() => {
        loading.value = false;
      });
  };

  const createTherapists = (data) => {
    axios.post('/therapist', data.value)
      .then((response) => {
        therapists.value = response.data
      })
      .catch(error => {
        console.error('Error creating therapist:', error);
      });
  };

  const removeTherapist = (id) => {
    loading.value = true;
    axios.delete(`/therapist/${id}`)
      .then((response) => {
        console.log(response.data);
        therapists.value = response.data
      })
      .catch(err => {
        console.error('Error removing therapist:', err);
        error.value = 'Error removing therapist';
      })
      .finally(() => {
        loading.value = false;
      });
  };

  return {
    therapists,
    loading,
    error,
    fetchTherapists,
    editTherapists,
    createTherapists,
    removeTherapist,
  };
}
