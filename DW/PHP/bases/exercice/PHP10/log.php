<?php
session_start();
?>
<form action="login.php" method="POST" >
    <div class="form-group">
    <label for="login">Email address</label>
    <input type="text" name="login" class="form-control" id="login" placeholder="login">
    </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
    </div>
    <div class="form-group">
    <div class="form-check">

    </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>


<form action="login.php" method="GET" >
    <div class="form-group">
    <label for="login">LOGON</label>
    <input type="text" class="form-control" id="login" placeholder="login" value="">
    </div>


    </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>

    </form>