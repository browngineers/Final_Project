(function login() {
      // Initialize Firebase
      var config = {
		apiKey: "AIzaSyB9nxogGD8Q25_1ZNyX2H8CFIF2Mc_PWIA",
		authDomain: "swefinalproject-f7be3.firebaseapp.com",
		databaseURL: "https://swefinalproject-f7be3.firebaseio.com",
		projectId: "swefinalproject-f7be3",
		storageBucket: "swefinalproject-f7be3.appspot.com",
		messagingSenderId: "99689007637"
	  };
	  firebase.initializeApp(config);

      // Get the elements

      const emailText = document.getElementById('user')
      const passwordText = document.getElementById('password')
      const btnLogin = document.getElementById('loginButton')

      btnLogin.addEventListener('click', e=> {
          const email = emailText.value
          const password = passwordText.value
          const auth = firebase.auth()
          // Sign in
          const promise = auth.signInWithEmailAndPassword(email, password)
		  console.log(promise);
		  
		  if (promise === undefined || promise === null || promise === 0) {
		  	  window.open("index.html")
		  }  
		  window.open("loginPage.html")
      })
}());