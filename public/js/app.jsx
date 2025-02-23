import React from 'react';
import {createRoot} from 'react-dom/client';
import App from 'public/js/components/Hola.jsx';


const si = document.getElementById('app');
const root = createRoot(si);
root.render(
    <App/>
);