<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="signup-container">
        <section class="signup-card">

            <header class="signup-header">
                <h2>Create Account</h2>
                <p>Please enter your details to create an account.</p>
            </header>

            <form action="/signup-endpoint" method="POST" id="signupForm" class="signup-form" novalidate>

                <!-- Full Name -->
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required autocomplete="name">
                    <span class="error-message" id="nameError" aria-live="polite"></span>
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="e.g., name@gmail.com" required autocomplete="email">
                    <span class="error-message" id="emailError" aria-live="polite"></span>
                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required autocomplete="new-password">
                    <span class="error-message" id="passwordError" aria-live="polite"></span>
                </div>

                <!-- Terms -->
                <label class="terms-label" for="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <span>I agree to the <a href="">terms and conditions.</a></span>
                </label>

                <!-- Submit -->
                <button type="submit" class="btn-submit">
                    Create Account
                </button>

            </form>

            <!-- Login Footer -->
            <footer class="signup-footer">
                <p>
                    Already have an account?
                    <a href="index.html">Sign in</a>
                </p>
            </footer>

        </section>
    </main>

</body>
</html>