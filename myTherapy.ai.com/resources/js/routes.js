import Therapist from "./components/Therapist/Therapist.vue";
export const routes = [
    { path: '/therapist', name: 'therapist', component: Therapist, meta: { middleware: ['check.token'] } },
];
