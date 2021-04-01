 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         @import url(https://fonts.googleapis.com/css?family=Roboto:300);

         .login-page {
             width: 360px;
             padding: 8% 0 0;
             margin: auto;
         }

         .form {
             position: relative;
             z-index: 1;
             background: #FFFFFF;
             max-width: 360px;
             margin: 0 auto 100px;
             padding: 45px;
             box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
             border-radius: 3px;
         }

         .form input {
             font-family: "Roboto", sans-serif;
             outline: 0;
             background: #f2f2f2;
             width: 100%;
             border: 0;
             margin: 0 0 15px;
             padding: 15px;
             box-sizing: border-box;
             font-size: 14px;
         }

         .form button {
             font-family: "Roboto", sans-serif;
             text-transform: uppercase;
             outline: 0;
             background: #4a7dda;
             width: 100%;
             border: 0;
             padding: 15px;
             color: #FFFFFF;
             font-size: 14px;
             -webkit-transition: all 0.3 ease;
             transition: all 0.3 ease;
             cursor: pointer;
         }

         .form button:hover,
         .form button:active,
         .form button:focus {
             background: #4074d2;
         }

         .form .message {
             margin: 15px 0 0;
             color: #b3b3b3;
             font-size: 12px;
         }

         .form .message a {
             color: #4CAF50;
             text-decoration: none;
         }

         .form .register-form {
             display: none;
         }

         .container {
             position: relative;
             z-index: 1;
             max-width: 300px;
             margin: 0 auto;
         }

         .container:before,
         .container:after {
             content: "";
             display: block;
             clear: both;
         }

         .container .info {
             margin: 50px auto;
             text-align: center;
         }

         .container .info h1 {
             margin: 0 0 15px;
             padding: 0;
             font-size: 36px;
             font-weight: 300;
             color: #1a1a1a;
         }

         .container .info span {
             color: #4d4d4d;
             font-size: 12px;
         }

         .container .info span a {
             color: #000000;
             text-decoration: none;
         }

         .container .info span .fa {
             color: #EF3B3A;
         }

         body {
             font-family: "Roboto", sans-serif;
             -webkit-font-smoothing: antialiased;
             -moz-osx-font-smoothing: grayscale;
             background: #4074d2;

         }

         .form-heading {
             text-align: center;
         }
     </style>
 </head>

 <body>
     <div class="login-page">
         <div class="form">
             <h3 class="form-heading">Sign Up</h3>

             <?php
                if (!empty($_GET['error'])) {
                    $error = unserialize(urldecode($_GET['error']));
                    foreach ($error as $key => $value) {
                        echo '<p style="color:#ca5353;font-weight:bold;margin-bottom: 20px;background: #ff000036; border-radius: 10px; padding: 10px 30px">' . $value . '</p>';
                    }
                }
                if (!empty($_GET['success'])) {
                    $success = unserialize(urldecode($_GET['success']));
                    foreach ($success as $key => $value) {
                        echo '<p style="color:#3bb864;font-weight:bold;margin-bottom: 20px;background: #87f5ab; border-radius: 10px; padding: 10px 30px">' . $value . '</p>';
                    }
                }
                ?>

             <form method="POST" autocomplete="off" action="<?php echo BASE_URL ?>/khachhang/insert_dangky">

                 <div class="form-group">
                     <label for="">Name</label>
                     <input type="text" placeholder="Name" name="name" id="name" required>
                 </div>
                 <div class="form-group">
                     <label for="sdt">SĐT</label>
                     <input type="text" placeholder="SĐT" name="sodienthoai" id="sdt" required>
                 </div>
                 <div class="form-group">
                     <label for="diachi">Địa chỉ</label>

                     <input type="text" placeholder="Địa chỉ" name="diachi" id="diachi" required>
                 </div>
                 <div class="form-group">
                     <label for="email">Email</label>

                     <input type="email" placeholder="Email" name="email" id="email" required>
                 </div>
                 <div class="form-group">
                     <label for="password">Password</label>

                     <input type="password" placeholder="Password" name="password" id="password" required>
                 </div>
                 <button type="submit" name="dangnhap" id="frmSubmit">Register</button>
                 <p class="message">Already have an account? <a href="<?php echo BASE_URL ?>/khachhang/dangnhap">Login</a></p>
             </form>
         </div>
     </div>
 </body>
 <script>
     $('.message a').click(function() {
         $('form').animate({
             height: "toggle",
             opacity: "toggle"
         }, "slow");
     });
 </script>

 </html>