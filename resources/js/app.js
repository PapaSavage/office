import { createApp } from "vue";
import "./bootstrap";
import App from "./App.vue";
import router from "./router/index.js";
import.meta.glob(["../img/**", "../fonts/**"]);

createApp(App).use(router).mount("#app");
