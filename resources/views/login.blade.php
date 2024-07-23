<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Budget Tracker</title>
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}" >
  <style>
    .error-message {
      color: red;
      font-size: 0.9em;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="{{ asset('images/login.jpg') }}" alt="" /></div>
        <div class="formBx">
          <form id="sign-in-form" action="{{ url('/dashboard') }}" method="POST">
              @csrf
            <h2>Sign In</h2>
            <div class="input-group">
              <input type="text" id="username" name="username" placeholder="User Email" />
              <div id="username-error" class="error-message"></div>
            </div>
            <div class="input-group">
              <input type="password" id="password" name="password" placeholder="Password" />
              <div id="password-error" class="error-message"></div>
            </div>
            <input type="submit" value="Login" />
            <p class="signup">
              Don't have an account?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
          @error('name')
          <div style="color: red">{{ $message }}</div>
          @enderror

        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">
          <form id="sign-up-form" action="{{ url('registration') }}" method="post">
              @csrf
            <h2>Create an account</h2>
            <div class="input-group">
              <input type="text" id="signup-username" name="username" placeholder="User name" />
              <div id="signup-username-error" class="error-message"></div>
               @error('username')
              <span class="error" style="color: red;">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-group">
              <input type="email" id="signup-email" name="email" placeholder="Email Address" />
              <div id="signup-email-error" class="error-message"></div>
              @error('email')
              <span class="error" style="color: red;">{{ $message }}</span>
              @enderror
              
            </div>
            <div class="input-group">
              <input type="password" id="signup-password" name="password" placeholder="Create Password" />
              <div id="signup-password-error" class="error-message"></div>
              @error('password')
              <span class="error" style="color: red;">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-group">
              <input type="password" id="signup-confirm-password" name="cnf-password"
                placeholder="Confirm Password" />
              <div id="signup-confirm-password-error" class="error-message"></div>
               @error('cnf-password')
              <span class="error" style="color: red;">{{ $message }}</span>
              @enderror
            </div>
            <input type="submit" value="Sign Up" />
            <p class="signup">
              Already have an account?
              <a href="#" onclick="toggleForm();">Sign in.</a>
            </p>
          </form>
          <!-- @error('email')
          <div style="color: red">{{ $message }}</div>
          @enderror -->
        </div>
        <div class="imgBx"><img src="{{ asset('images/register.jpeg') }}" alt="" /></div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const signInForm = document.getElementById('sign-in-form');
      const signUpForm = document.getElementById('sign-up-form');

      // Utility function to validate email
      function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
      }

      // Sign In Form Validation
      signInForm.addEventListener('submit', function (event) {
        let valid = true;

        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        if (username === '') {
          document.getElementById('username-error').textContent = 'Username is required';
          valid = false;
        } else {
          document.getElementById('username-error').textContent = '';
        }

        if (password === '') {
          document.getElementById('password-error').textContent = 'Password is required';
          valid = false;
        } else {
          document.getElementById('password-error').textContent = '';
        }

        if (!valid) {
          event.preventDefault();
        }
      });

      // Clear errors on input
      function clearError(inputElement, errorElementId) {
        inputElement.addEventListener('input', function () {
          document.getElementById(errorElementId).textContent = '';
        });
      }

      // Add input event listeners for sign-in form
      clearError(document.getElementById('username'), 'username-error');
      clearError(document.getElementById('password'), 'password-error');

      // Add input event listeners for sign-up form
      clearError(signUpForm.querySelector('input[name="username"]'), 'signup-username-error');
      clearError(signUpForm.querySelector('input[name="email"]'), 'signup-email-error');
      clearError(signUpForm.querySelector('input[name="create-password"]'), 'signup-password-error');
      clearError(signUpForm.querySelector('input[name="confirm-password"]'), 'signup-confirm-password-error');
    });





    const toggleForm = () => {
      const container = document.querySelector('.container');
      container.classList.toggle('active');
    };
  </script>
</body>

</html>