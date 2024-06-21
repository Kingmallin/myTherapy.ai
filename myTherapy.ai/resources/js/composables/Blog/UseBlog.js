import { ref } from 'vue';
import axios from '../../axiosInstance.js';

export function useBlogPost() {
  // Define reactive state variables
  const blogposts = ref([]);
  const loading = ref(false);
  const error = ref(null);

  // Function to fetch blog posts from an API
  const fetchBlogs = () => {
    loading.value = true;
    axios.get('/blog')
      .then(response => {
        blogposts.value = response.data;
      })
      .catch(err => {
        console.error('Error fetching blog posts:', err);
        error.value = 'Error fetching blog posts';
      })
      .finally(() => {
        loading.value = false;
      });
  };

  // Function to edit a blog post
  const editBlog = (data) => {
    loading.value = true;
    axios.put(`/blog`, data)
      .then(response => {
        blogposts.value = response.data;
      })
      .catch(err => {
        console.error('Error editing blog post:', err);
        error.value = 'Error editing blog post';
      })
      .finally(() => {
        loading.value = false;
      });
  };

  // Function to create a new blog post
  const saveBlog = (data) => {
    axios.post('/blog', data)
      .then(response => {
        blogposts.value = response.data;
      })
      .catch(err => {
        console.error('Error creating blog post:', err);
        error.value = 'Error creating blog post';
      });
  };

  // Function to remove a blog post
  const removeBlog = (id) => {
    loading.value = true;
    axios.delete(`/blog/${id}`)
      .then(response => {
        blogposts.value = response.data;
      })
      .catch(err => {
        console.error('Error removing blog post:', err);
        error.value = 'Error removing blog post';
      })
      .finally(() => {
        loading.value = false;
      });
  };

  return {
    blogposts,
    loading,
    error,
    fetchBlogs,
    editBlog,
    saveBlog,
    removeBlog
  };
}
