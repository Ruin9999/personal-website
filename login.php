<?php
    include 'header.php';
?>
<section>
    <div class="container col-lg-5">
        <div class="text-center text">
            <div class="title">Login</div>
            <form class="form-horizontal" method="POST" action="include/login.php" autocomplete="off">
                <div class="form-group">
                  <input class="form-control" type="text" name="username" placeholder="Username *" required/>
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password" placeholder="Password *" required/>
                </div>
                <div class="form-group">
                  <button class="btn" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
