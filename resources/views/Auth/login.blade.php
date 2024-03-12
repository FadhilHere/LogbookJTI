<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('CALTEX-RIAU-LOGO.png') }}">
    <!-- Perubahan pada jalur Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Perubahan pada jalur style.css -->
    <link rel="stylesheet" href="{{ asset('assetsLogin/style.css') }}" />

    <title>Login</title>
</head>

<body>
    <div class="container">
    @if ($errors->has('login'))
            <div class="alert alert-danger" style="margin-bottom: 10px;">
	                {{ $errors->first('login') }}
			        </div>
				        @endif
        <div class="sign-up-form">
            <!-- Left (Form Image) -->
            <div class="form-image">
                <!-- Perubahan pada jalur gambar form-bg.png -->
                <img src="{{ asset('assetsLogin/login-vector.jpg') }}" alt="" />
            </div>
            <!-- Right (Form Content) -->

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <!-- Form Heading -->
                <div class="form-heading">
                    <!-- Perubahan pada jalur gambar logo.png -->
                    <img src="{{ asset('assetsLogin/CALTEX-RIAU-LOGO.png') }}" alt="" />
                    <h1>LOGIN</h1>
                    <p>Silahkan masukkan username dan password anda</p>
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
