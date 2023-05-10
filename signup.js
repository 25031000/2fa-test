import {auth} from "./firebase.js";
import {signInWithPopup, GoogleAuthProvider, onAuthStateChanged, sendEmailVerification} from "https://www.gstatic.com/firebasejs/9.1.1/firebase-auth.js";
const btn = document.querySelector('#sign-in');


// user verification

 window.addEventListener('DOMContentLoaded', () => {
    onAuthStateChanged(auth,(user) => {
        if(user){
            console.log('Registered!!');
            //if the email is verified we pass to the dataSignup page
            location.href = "./dataSignup.html";
        }else{
            console.log('Not registered');
        }
    })
})

// sign-in with Google provider

let signIn = async () => {
    let provider = new GoogleAuthProvider();

    let signInWithGoogle = async (provider) => {
        let res = await signInWithPopup(auth, provider);
        console.log("Done!!");
    }
    await signInWithGoogle(provider)
}

// called to method
btn.addEventListener('click', signIn);