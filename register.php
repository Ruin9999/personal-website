<?php
  include 'header.php';
 ?>
 <section>
   <div class="container col-lg-5">
       <div class="text-center text">
           <div class="title">Sign Up</div>
             <form class="form-horizontal" method="POST" action="include/register.php" autocomplete="off">
               <div class="form-group">
                 <input class="form-control" type="text" name="username" placeholder="Username*" required/>
                </div>
                <div class="form-group">
                 <input class="form-control" id="password" type="password" name="password" placeholder="Password *" required/>
                </div>
                <div class="form-group">
                 <input class="form-control"id="passwordconfirm" type="password" name="passwordconfirm" placeholder="Confirm Password *" required/>
                </div>
                 <button class="btn" type="submit" name="submit">Register</button>
             </form>
             <span id='message'></span>
       </div>
    </div>
</section>
 <?php
  include 'footer.php';
  ?>
