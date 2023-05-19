import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-auth.js";

const firebaseConfig = {
	apiKey: "AIzaSyDzPguW0tXxYkmBdlpPwtz0SO1OZqpK2Xc",
	authDomain: "mywebpage-39813.firebaseapp.com",
	projectId: "mywebpage-39813",
	storageBucket: "mywebpage-39813.appspot.com",
	messagingSenderId: "845932539549",
	appId: "1:845932539549:web:d0883c3b95197be5b2ae74"
};


const app = initializeApp(firebaseConfig);
const auth = getAuth(app);


document.getElementById("lbtn").addEventListener('click', function () {
	const loginEmail = document.getElementById("lemail").value;
	const loginPassword = document.getElementById("lpw").value;

	const auth = getAuth();
	signInWithEmailAndPassword(auth, loginEmail, loginPassword)
		.then((userCredential) => {
			const user = userCredential.user;
		})
		.catch((error) => {
			const errorCode = error.code;
			const errorMessage = error.message;
		});

});