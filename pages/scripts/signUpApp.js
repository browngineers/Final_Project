(function complete() {
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

      const emailText = document.getElementById('email')
      const passwordText = document.getElementById('password')
      const btnSignUp = document.getElementById('signUp')

      btnSignUp.addEventListener('click', e=> {
          const email = emailText.value
          const password = passwordText.value
          const auth = firebase.auth()
          // Sign up
          const promise = auth.createUserWithEmailAndPassword(email, password)
          promise.catch(e => res.render('signUpPage.html'))

      })
}());