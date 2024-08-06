import { createRouter, createWebHistory } from "vue-router";
import ProductsPage from "../components/ProductsPage.vue";
import NotFoundPage from "../components/NotFoundPage.vue";
import ProductPage from "../components/ProductPage.vue";
import LoadPage from "../components/LoadPage.vue";

const routes = [
    { path: "/", component: ProductsPage },
    { path: "/product/:id", component: ProductPage },
    // {
    //     path: "/:catchAll(.*)",
    //     component: NotFoundPage,
    // },
    {
        path: "/load",
        component: LoadPage,
    },
];

const router = createRouter({ history: createWebHistory(), routes });

export default router;
