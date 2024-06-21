import Therapist from "./components/Therapist/Therapist.vue";
import TestTherapist from "./components/TestTherapist/TestTherapist.vue";
import Blog from "./components/Blog/Blog.vue";
import MentalHealthView from "./components/MentalHealCategorys/MentalHealthView.vue";

export const routes = [
    { path: '/testTherapist', name: 'test therapist', component: TestTherapist, meta: { middleware: ['check.token'] } },
    { path: '/therapist', name: 'therapist', component: Therapist, meta: { middleware: ['check.token'] } },
    { path: '/blogs', name: 'blog', component: Blog, meta: { middleware: ['check.token'] } },
    { path: '/health-categorys', name: 'Mental Health Conditions', component: MentalHealthView, meta: { middleware: ['check.token'] } },
];
