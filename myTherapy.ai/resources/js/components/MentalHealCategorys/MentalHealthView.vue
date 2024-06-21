<template>
    <div class="container">
        <div class="content">
            <Card>
                <template #header>
                    <h2>Mental Health Categories</h2>
                </template>
                <template #content>
                    <div v-for="(condition, index) in mentalHealthCategories" :key="index" class="mb-4">
                        <InputGroup class="flex flex-wrap gap-2">
                            <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                                <label for="type-{{ index }}">Type</label>
                                <InputText :id="'type-' + index" v-model="condition.type" required />
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                                <label for="description-{{ index }}">Description</label>
                                <InputTextarea :id="'description-' + index" v-model="condition.description" />
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                                <label for="symptoms-{{ index }}">Symptoms</label>
                                <InputTextarea :id="'symptoms-' + index" v-model="condition.symptoms" />
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                                <label for="prevalence-{{ index }}">Prevalence</label>
                                <InputTextarea :id="'prevalence-' + index" v-model="condition.prevalence" />
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                                <label for="treatmentOptions-{{ index }}">Treatment Options</label>
                                <InputTextarea :id="'treatmentOptions-' + index" v-model="condition.treatmentOptions" />
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col gap-2 my-3">
                                <label for="resources-{{ index }}">Resources</label>
                                <InputTextarea :id="'resources-' + index" v-model="condition.resources" />
                            </div>
                            <Button label="Delete" icon="pi pi-trash" class="p-button-danger mt-2" @click="deleteCondition(index)" />
                        </InputGroup>
                    </div>
                    <Button label="Add New Category" icon="pi pi-plus" class="p-button-success mt-2" @click="addCondition" />
                </template>
                <template #footer>
                    <Button label="Save Changes" icon="pi pi-check" class="p-button-primary mt-2" @click="saveChanges" />
                </template>
            </Card>
        </div>
    </div>
</template>
<script setup>
</script>
<style scoped>
</style>