<template>
    <div class="mt-3 min-40" v-show="showNewTherapist" style="width:100%;">
        <Card>
            <template #title>Create a new therapist</template>
            <template #content>
                <form @submit.prevent="createNewTherapist">
                    <!-- First Row -->
                    <InputGroup class="flex flex-wrap gap-2">
                        <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                            <label for="name">Name</label>
                            <InputText id="name" v-model="newTherapist.name"/>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                            <label for="specialization">Specialization</label>
                            <InputText id="specialization" v-model="newTherapist.specialization"/>
                        </div>
                    </InputGroup>

                    <!-- Second Row -->
                    <InputGroup class="flex flex-wrap gap-4" style="max-width: 80%;">
                        <label for="persona">Persona</label>
                        <Textarea id="persona" v-model="newTherapist.persona" rows="5" cols="5" />
                     </InputGroup>

                    <!-- Third Row -->
                    <InputGroup class="flex flex-wrap gap-4">
                        <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                            <label for="api_endpoint">API Endpoint</label>
                            <InputText id="api_endpoint" v-model="newTherapist.apiEndpoint"/>
                        </div>

                        <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                            <label for="encrypted_api_key">Encrypted API Key</label>
                            <InputText id="encrypted_api_key" v-model="newTherapist.encryptedApiKey"/>
                        </div>

                        <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                            <label for="additional_settings">Additional Settings</label>
                            <InputText id="additional_settings" v-model="newTherapist.additionalSettings"/>
                        </div>
                    </InputGroup>

                    <Button type="submit" label="Save" />
                </form>
            </template>
        </Card>
    </div>
</template>

<script setup>
import { ref, inject } from 'vue';
import InputText from "primevue/inputtext";
import Card from "primevue/card";
import Button from "primevue/button";
import Textarea from 'primevue/textarea';
import InputGroup from "primevue/inputgroup";
// Use therapist composable

const showNewTherapist = inject('newTherapist');
const  createTherapists = inject('createTherapists');

const newTherapist = ref({
    name: "",
    persona: "",
    specialization: "",
    encryptedApiKey: "",
    apiEndpoint: "",
    additionalSettings: ""
});

const createNewTherapist = async () => {
    await createTherapists(newTherapist)
};
</script>
