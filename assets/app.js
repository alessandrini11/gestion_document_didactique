/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
window.addEventListener("load",function () {
    const btn = document.querySelector('#menu-btn')
    const mobileMenu = document.querySelector('#mobile-menu')
    const retour = document.querySelectorAll('.retour')
    const sortie = document.querySelectorAll('.sortie')
    const demandeRetour = document.querySelectorAll('.demande')
    function toggleMenu() {

        mobileMenu.classList.toggle('-left-full')
        
    }
    function toggleConfirmRetour(e){
        const dot = this.parentNode.querySelector('.dot')
        console.log("retour")
        if ( this.value == 1){
            this.value = 2
            dot.classList.add("bash")
            
            console.log(this.value)
        }else if(this.value == 2) {
            this.value = 1
            console.log(this.value)
            dot.classList.remove("bash")
        }
        
        
    }
    function toggleConfirmSortie(e){
        const dot = this.parentNode.querySelector('.dot')
        console.log("sortie")
        if ( this.value == 1){
            this.value = 2
            dot.classList.add("bash")

            console.log(this.value)
        }else if(this.value == 2) {
            this.value = 1
            console.log(this.value)
            dot.classList.remove("bash")
        }


    }
    function toggleDemandeRetour(e){
        const dot = this.parentNode.querySelector('.dot')
        console.log("demande")
        if ( this.value == 1){
            this.value = 2
            dot.classList.add("bash")

            console.log(this.value)
        }else if(this.value == 2) {
            this.value = 1
            console.log(this.value)
            dot.classList.remove("bash")
        }


    }
    demandeRetour.forEach(function(link){
        link.addEventListener('click',toggleDemandeRetour)
    })
    retour.forEach(function(link){
        link.addEventListener('click',toggleConfirmRetour)
    })
    sortie.forEach(function(link){
        link.addEventListener('click',toggleConfirmSortie)
    })
    btn.addEventListener("click",toggleMenu)
})

