import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.addEventListener('load',function(){
    const load = this.document.getElementById('preloader');

    this.setTimeout(() =>{
        load.classList.add('opacity-0');

        this.setTimeout(() =>{
            load.style.display = 'none';
        },700)
    },900)
})