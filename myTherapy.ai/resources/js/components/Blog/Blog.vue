<template>
    <div class="absolute top-7 right-1">
        <Button @click.prevent="toggleNewBlog">Add New Blog Post</Button>
    </div>

    <div class="clear"></div>

    <div class="container">
        <div class="content">
            <CreateBlog v-show="newBlog" @close="toggleNewBlog"/>
        </div>

        <div class="content">
            <Card class="container my-8 mx-20 p-4 white shadow-lg rounded-lg">
                <template #content>
                    <div>
                        <DataView :value="blogposts" paginator :rows="10" style="height: 100%;">
                            <template #list="slotProps">
                                <div class="grid grid-cols-1 gap-4">
                                    <div v-for="(post, index) in slotProps.items" :key="index" class="col-span-1 border-b border-gray-300 p-4">
                                        <div v-show="!post.editMode" class="flex flex-col md:flex-row md:items-center gap-4">
                                            <div class="flex flex-col md:flex-row justify-between md:items-center flex-1 gap-4">
                                                <div class="flex flex-col gap-2">
                                                    <div>
                                                        <div class="text-xl font-bold text-gray-900 mt-2">{{ post.name }}</div>
                                                        <div class="font-medium text-gray-600 text-sm">Subject: {{ post.subject }}</div>
                                                        <div class="font-medium text-gray-600 text-sm">Author: {{ post.author }}</div>
                                                        <div class="font-medium text-gray-600 text-sm">Keywords: {{ post.keywords }}</div>
                                                    </div>
                                                </div>
                                                <div style="margin-right:3rem; margin-top:1rem;">
                                                    <Button label="View & Edit" @click="toggleEditMode(post)" severity="info" style="margin-left: 2rem;"/>
                                                    <Button label="Delete" @click="deletePost(post)" severity="danger"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-show="post.editMode">
                                            <UpdateBlog :blog="post" @close="toggleEditMode(post)" />
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </DataView>
                    </div>
                </template>
            </Card>
        </div>
    </div>
</template>

<script setup>
import UpdateBlog from './UpdateBlog.vue';
import { useBlogPost } from '../../composables/Blog/UseBlog.js';
import DataView from 'primevue/dataview';
import Button from 'primevue/button';
import { ref, onMounted } from 'vue';
import CreateBlog from './CreateBlog.vue';
import Card from 'primevue/card';

const newBlog = ref(false);

const {
    loading,
    error,
    fetchBlogs,
    blogposts,
    removeBlog,
} = useBlogPost();

const toggleNewBlog = () => {
    newBlog.value = !newBlog.value;
};

const toggleEditMode = (post) => {
    post.editMode = !post.editMode;
};

const view = (post) => {
    // Implement view functionality
};

const deletePost = (post) => {
    removeBlog(post.id);
};

onMounted(() => {
    fetchBlogs();
});
</script>

<style scoped>
button {
    margin-right: 3px;
}

.button.outlined {
    background-color: transparent;
    border: 1px solid #ccc;
    color: green;
}

.button.outlined:hover {
    background-color: #f0f0f0;
}

.white {
    background-color: #ffffff;
}

.mt-3 {
    margin-top: 3rem;
}

.container {
    width: 94% !important;
    margin-left: 2.5rem !important;
}

.content {
    margin-top: 0;
}
</style>
