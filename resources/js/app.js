import './bootstrap';

import {
    Sidenav,
    Ripple,
    Tab,
    Modal,
    Dropdown,
    Input, 
    initTE,
} from "tw-elements";

initTE({ Sidenav, Dropdown, Modal,Ripple, Tab, Input });

const clickEvent = new Event('click');
const databaseButton = document.getElementById('database_file');

document.getElementById('restore_database').addEventListener('click', function() {
    databaseButton.click();
});

databaseButton.addEventListener('change', function() {
    document.getElementById('uploadForm').submit();
});