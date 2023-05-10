import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.1/firebase-app.js";
// https://firebase.google.com/docs/web/setup#available-libraries
import { getAuth } from "https://www.gstatic.com/firebasejs/9.1.1/firebase-auth.js";


// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDB1Rs0skCU4oWGsFuupTuloL27adPJiLM",
  authDomain: "faauth-904da.firebaseapp.com",
  projectId: "faauth-904da",
  storageBucket: "faauth-904da.appspot.com",
  messagingSenderId: "219305855569",
  appId: "1:219305855569:web:709c0a11424730b3b68670"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
