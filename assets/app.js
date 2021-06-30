/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import axios from "axios";
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
        let id = this.parentNode.querySelector('span.hidden')
        id = parseInt(id.innerText)
        const date = new Date()
        console.log(id)
        if (dot.classList.contains("bash")){
            const data = {
                "confirmationRetour": false,
                "dateRetour" : false
            }
            axios
                .put(`/admin/api/deplacements/${id}`,data)
                .then(function (respo) { respo.data.id = id })
                .catch(function (error) {console.log(error)})
            console.log('ok')
            dot.classList.remove("bash")

        }else {
            const data = {
                "confirmationRetour": true,
                "dateRetour" : `${date.getFullYear()}-${date.getMonth()}-${date.getDate()}`
            }
            axios.put(`/admin/api/deplacements/${id}`,data)
                .then(function (respo) { respo.data.id = id })
                .catch(function (error) {console.log(error)})
            console.log('ok')
            dot.classList.add("bash")
        }
    }
    function toggleConfirmSortie(e){
        const dot = this.parentNode.querySelector('.dot')
        let id = this.parentNode.querySelector('span.hidden')
        id = parseInt(id.innerText)
        console.log(id)
        if (dot.classList.contains("bash")){
            const data = {
                "confirmationSortie": false
            }
            axios
                .put(`/admin/api/deplacements/${id}`,data)
                .then(function (respo) { respo.data.id = id })
                .catch(function (error) {console.log(error)})
            console.log('ok')
            dot.classList.remove("bash")

        }else {
            const data = {
                "confirmationSortie": true
            }
            axios.put(`/admin/api/deplacements/${id}`,data)
                .then(function (respo) { respo.data.id = id })
                .catch(function (error) {console.log(error)})
            console.log('ok')
            dot.classList.add("bash")
        }


    }
    function toggleDemandeRetour(e){
        const dot = this.parentNode.querySelector('.dot')
        let id = this.parentNode.querySelector('span.hidden')
        id = parseInt(id.innerText)

        if (dot.classList.contains("bash")){
            const data = {
                "demandeRetour": false
            }
            axios
                .put(`/admin/api/deplacements/${id}`,data)
                .then(function (respo) { respo.data.id = id })
                .catch(function (error) {console.log(error)})
            console.log('ok')
            dot.classList.remove("bash")

        }else {
            const data = {
                "demandeRetour": true
            }
            axios.put(`/admin/api/deplacements/${id}`,data)
                .then(function (respo) { respo.data.id = id })
                .catch(function (error) {console.log(error)})
            console.log('ok')
            dot.classList.add("bash")
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

