<?php
require_once 'header.php';
require_once '../PHP/UserLogin.php';
 require_once 'header.php'?>




    <div id="signin">
    <form action="#" method="post">
        <p><label for="name"></label><input type="text" id="name" class="login" name="usersn" placeholder="Username:140001"/></p>
        <p><label for="password"></label>
            <input type="password" id="password" class="login" name="password" placeholder="Password:******"/>
            <span id="tip"></span>
        </p>
        <p>
            <input type="submit" class="submit" id="submit"  value="登陆" />
            <span><?php global  $error; if($error == 1 ) echo"用户名或密码错误!"; ?>
            </span>
        </p>

    </form>
</div>
<?php require_once 'footer.php'?>