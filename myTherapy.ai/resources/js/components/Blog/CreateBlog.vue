<template>
    <div class="container">
      <Card>
        <template #header>
          <h1 style="text-align: center;">Create Your New Blog</h1>
        </template>
  
        <template #content>
          <form>
            <InputGroup class="flex flex-wrap gap-2">
              <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                <label for="name">Give your blog a name</label>
                <InputText id="name" v-model="blog.name" required />
              </div>
              <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                <label for="author">Author</label>
                <InputText id="author" v-model="blog.author" required />
              </div>
            </InputGroup>
  
            <InputGroup class="flex flex-wrap gap-2">
              <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                <label for="subject">Subject</label>
                <InputText id="subject" v-model="blog.subject" required />
              </div>
            </InputGroup>
  
            <InputGroup class="flex flex-wrap gap-2">
              <div class="w-full md flex flex-col gap-2 my-3">
                <label for="keywords">Keywords (optional)</label>
                <InputText id="keywords" v-model="blog.keywords" />
              </div>
            </InputGroup>
  
            <div class="my-3">
              <label for="content">Content</label>
              <Editor id="content" v-model="blog.content" editorStyle="height: 320px" required />
            </div>
  
            <Button label="Submit" icon="pi pi-check" @click.prevent="save"/>
          </form>
        </template>
      </Card>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import Editor from 'primevue/editor';
  import InputText from 'primevue/inputtext';
  import InputGroup from 'primevue/inputgroup';
  import Button from 'primevue/button';
  import Card from 'primevue/card';
  import { useBlogPost } from '../../composables/Blog/UseBlog.js';
  const {
    saveBlog,
  } = useBlogPost();

  const blog = ref({
    name: '',
    author: '',
    subject: '',
    content: '',
    keywords: ''
  });

  const save = () => {
    saveBlog(blog.value);
  }
  </script>
  
  <style scoped>
  /* Add any scoped styles here */
  </style>
  