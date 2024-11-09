<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
    @keyframes move{
        0%, 49.99%{
            opacity: 0;
            z-index: 1;
        }
        50%, 100%{
            opacity: 1;
            z-index: 5;
        }
    }
    .container-register{
        /* top: 150px; */
        /* left: 600px; */
        margin-top: 150px;
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
        justify-self: center;
        p{
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }
        span{
            font-size: 12px;
        }
        a{
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
        }
        button{
            background-color: #FF794C;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }
        button.hidden{
            background-color: transparent;
            border-color: #fff;
        }
        form{
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
            input{
                background: #eee;
                border: none;
                margin: 8px 0;
                padding: 10px 15px;
                font-size: 13px;
                border-radius: 8px;
                width: 100%;
                outline: none;
            }
            input[type='submit']{
                background-color: #FF794C;
                color: #fff;
                font-size: 12px;
                padding: 10px 45px;
                border: 1px solid transparent;
                border-radius: 8px;
                font-weight: 600;
                letter-spacing: 0.5px;
                text-transform: uppercase;
                margin-top: 10px;
                cursor: pointer;
            }
        }
        .form-container{
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }
        .sign-in{
            left: 0;
            width: 50%;
            z-index: 2;
        }
        .sign-up{
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }
    }
    .container-register.active{
        .sign-in{
            transform: translateX(100%);
        }
        .sign-up{
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }
        .toggle-container{
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }
        .toggle{
            transform: translateX(50%);
        }
    }
    .toggle-container{
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: all 0.6s ease-in-out;
        border-radius: 150px 0 0 100px;
        z-index: 100;
        .toggle{
            background-color: #FF794C;
            height: 100%;
            background: linear-gradient(to right, #e5af9d, #FF794C);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
            .toggle-panel{
                position: absolute;
                width: 50%;
                overflow: hidden;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                flex-direction:column;
                top: 0;
                transition: all 0.6s ease-in-out;
            }
        }
    }
    .toggle-left{
        transform: translateX(-100%);
    }
    .toggle-right{
        right: 0;
    }
    .blur{
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        position: fixed;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        display: none;
        background-color: rgba(255, 255, 255, 0.5);
        .notification{
            height: 20vh;
            width: 20vw;
            background-color: white;
            flex-direction: column;
            border-radius: 4vh;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 5px black;
            button{
                background-color: #FF794C;
                color: #fff;
                font-size: 12px;
                padding: 10px 45px;
                border: 1px solid transparent;
                border-radius: 8px;
                font-weight: 600;
                letter-spacing: 0.5px;
                text-transform: uppercase;
                margin-top: 10px;
                cursor: pointer;
            }
        }
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    ul {
        list-style: none;
    }

    a {
        text-decoration: none;
        color: black;
    }
        .register {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
                background-color: #fff;
        }
        .register h2 {
        font-size: 18px;
        margin-top: 20px;
    }

    .register ul {
        display: flex;
    }

    .register ul li {
        padding: 6px 12px;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin: 0 5px;
    }

    .register ul li a:hover {
        color: #F51212;
    }

    .register ul li a {
        transition: all 0.3s ease;
    } 

</style>
<?php
  include_once('views/conponant_navbar.php');
?>

<div class="container-register">
    <div class="form-container sign-up">

        <form method="post">
            <h1>Create account</h1>
            <span>or use your email for registeration</span>

            <input type="text"     name="rename"       placeholder="Name"  required>
            <input type="email"    name="reemail"      placeholder="Email"  required>
            <input type="password" name="repassword"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải ít nhất 8 ký tự (bao gồm: In thường, In Hoa, Số)" placeholder="Password"  required>
            <input type="submit"   name="register"     value="Sign Up">
        </form>
    </div>
    <div class="form-container sign-in">
    
        <form method="post">
            <h1>Log-In</h1>
            <span>or use your email password</span>
            <input type="text"         name="login_mail"     placeholder="Email hoặc mã tài khoản">
            <input type="password"     name="login_password" placeholder="Password">
            <div class="" style="display:flex; width:fit-content;align-items:center;" >
                <input type="checkbox" name="remem">
                <span style="text-wrap: nowrap;margin-left:10px;"> Remember me</span>
            </div>
            <a href="">Forget Your Password?</a>
            <input type="submit"       name="login" value="Log In">
        </form>
        
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>You have an account</h1>
                <p>Enter your personal details to use all of site features</p>
                <button class="hidden" id="login">Log In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Create your own account</h1>
                <p>Register with your personal details to use all of site features</p>
                <button class="hidden" id="register">Sign In</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('nav').classList.add('active')
    const login = document.getElementById('login');
    const register = document.getElementById('register');
    const container = document.querySelector('.container-register');
    register.onclick= ()=>{
        container.classList.add("active")
        register.parentElement.style.transform='translateX(100%)';
        login.parentElement.style.transform='translateX(0)';
        }
    login.onclick= ()=>{
        login.parentElement.style.transform='translateX(-100%)';
        container.classList.remove("active");
        register.parentElement.style.transform='translateX(0)';
        }
</script>