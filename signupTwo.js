
import { onAuthStateChanged} from "https://www.gstatic.com/firebasejs/9.1.1/firebase-auth.js";
import {auth} from "./firebase.js";



window.addEventListener('DOMContentLoaded', () => {
    onAuthStateChanged(auth,(user) => {
        if(user){
            console.log('Registered!!');
            //if the email is verified we get the input from the document
            // and add it as value the email of the google account
            const email = document.getElementById('email');
            email.value = user.email;
            console.log(user);
        }else{
            console.log('Not registered');
            window.location.href = "./signUp.html";
        }
    })
})


  