import './bootstrap';
import axios from "axios";

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

window.axios = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/',
});
