import Therapist from "./components/Therapist/Therapist.vue";
import TestTherapist from "./components/TestTherapist/TestTherapist.vue";

export const routes = [
    { path: '/testTherapist', name: 'test therapist', component: TestTherapist, meta: { middleware: ['check.token'] } },
    { path: '/therapist', name: 'therapist', component: Therapist, meta: { middleware: ['check.token'] } },
];
