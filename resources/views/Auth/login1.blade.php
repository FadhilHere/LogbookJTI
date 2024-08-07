<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assetsLogin/style.css') }}" />
    <title>Elegant Form With HTML & CSS</title>
</head>

<body>
    <div class="container">
        <div class="sign-up-form">
            <!-- Left (Form Image) -->
            <div class="form-image">
                <img src="./assets/form-bg.png" alt="" />
            </div>
            <!-- Right (Form Content) -->
            <form class="form-content">
                <!-- Form Heading -->
                <div class="form-heading">
                    <img src="./assets/logo.png" alt="" />
                    <h1>Create Account</h1>
                    <p>Please fill out all the required fields to create your account!</p>
                </div>
                <!-- Input Wrap -->
                <div class="input-wrap">
                    <div class="input">
                        <input type="text" name="username" required>
                        <div class="label">
                            <label for="username">Username</label>
                        </div>
                    </div>

                    <div class="input">
                        <input type="password" name="password" required>
                        <div class="label">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>