import { onAuthStateChanged, signOut} from "https://www.gstatic.com/firebasejs/9.1.1/firebase-auth.js";
import {auth} from "./firebase.js";



window.addEventListener('DOMContentLoaded', () => {
    onAuthStateChanged(auth,(user) => {
        if(user){
            console.log('Registered!!');
            console.log(user);
        }else{
            console.log('Not registered');
            window.location.href = "./signUp.html";
        }
    })
})

const signout = document.getElementById('signout');

signout.addEventListener('click', async () => {
    try {
        const res = await signOut(auth);
        console.log("logout successfully", res);
    } catch (error) {
        console.log("something was wrong: ", error);
    }
})