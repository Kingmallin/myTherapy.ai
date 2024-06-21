<template>
  <div>
      <Card>
          <template #header>
              <h1 style="text-align: center;">Update Blog Post</h1>
          </template>

          <template #content>
              <form @submit.prevent="editBlog(blog)">
                  <InputGroup class="flex flex-wrap gap-2">
                      <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                          <label for="name">Blog Name</label>
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

                  <Button label="Update" icon="pi pi-check" type="submit" style="margin-right:1rem;" />
                  <Button label="Close" icon="pi pi-times" @click="close" severity="danger" />
              </form>
          </template>
      </Card>
  </div>
</template>

<script setup>
import Card from 'primevue/card';
import Button from 'primevue/button';
import Editor from 'primevue/editor';
import InputGroup from 'primevue/inputgroup';
import InputText from 'primevue/inputtext';
import { defineProps, defineEmits } from 'vue';
import { useBlogPost } from '../../composables/Blog/UseBlog.js';

const props = defineProps({
  blog: {
      type: Object,
      required: true
  }
});

const emit = defineEmits(['close']);

const { editBlog } = useBlogPost();

const close = () => {
  emit('close');
};
</script>

<style scoped>
/* Add necessary styles here */
</style>
