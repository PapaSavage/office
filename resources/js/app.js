import { createApp } from "vue";
import "./bootstrap";
import App from "./App.vue";
import router from "./router/index.js";
import.meta.glob(["../img/**", "../fonts/**"]);

import axios from "axios";
window.axios = axios;

createApp(App).use(router).mount("#app");
