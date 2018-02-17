<header id="header">
  <div class="container">
    <div class="pull-left">
      <div id="logo">
        <a href="<?php echo URLROOT; ?>/home"><img src="/img/Instant.jpg" alt="" title="" /></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <h1><a href="<?php echo URLROOT; ?>/home">logo</a></h1>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo URLROOT; ?>/home">Home</a></li>
          <li><a href="<?php echo URLROOT; ?>/most_popular">Most popular</a></li>
          <li><a href="<?php echo URLROOT; ?>/latest">latest</a></li>
        </ul>
      </nav>
    </div>
    <nav id="nav-menu-container"> 
      <ul class="nav-menu ml-auto">
          <?php if(isset($_SESSION['user_id'])): ?>
              <li><a href="<?php echo URLROOT; ?>/home">logout</a></li>
          <?php else: ?>
        <li><a href="<?php echo URLROOT; ?>/user/login">login</a></li>
        <li><a href="<?php echo URLROOT; ?>/user/register">register</a></li>
          <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>
