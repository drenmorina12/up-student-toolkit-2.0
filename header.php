<?php
  define("ROOT", "/up-student-toolkit-2.0/");
?>


<div id="header">
  <div style="display: flex">
    <img class="logo" src="<?php echo ROOT; ?>/images/logo1.png" />
    <h3
      style="
        margin: 12px 0px 0px 5px;
        color: var(--secondary-color);
        /* text-shadow: 1px 1px 30px; */
        font-size: 23px;
        font-family: title-font, sans-serif;
      "
    >
      UP Student Toolkit
    </h3>
  </div>

  <nav class="nav-bar">
    <a href="<?php echo ROOT; ?>ballina.php">Ballina</a>
    <a href="<?php echo ROOT; ?>kalkulatore/kalkulatore.php">Vegla</a>
    <a href="<?php echo ROOT; ?>argetim/argetim.php">Argëtim</a>
    <a href="<?php echo ROOT; ?>literatura/literatura.php">Literatura</a>
    <a href="<?php echo ROOT; ?>info/info.php">Info</a>
    <a href="<?php echo ROOT; ?>rreth-nesh/rreth-nesh.php">Rreth nesh</a>
  </nav>
  <div id="username" class="dropdown">
    <?php echo $_SESSION["first-name"]; ?>

    <div class="dropdown-content">
      <p>Full Name: <?php echo $_SESSION["first-name"] ?> <?php echo $_SESSION["last-name"] ?> </p>
      <p>Email: <?php echo $_SESSION["email"] ?></p>
      <form action="logout.php">
        <button type="sumbit" id="log-out">Log Out</button>
      </form>
    </div>
  </div>
  <img class="theme-toggle" src="<?php echo ROOT; ?>/images/sun.png"/>
<style>
  .theme-toggle{
    width: 30px;
    height: 30px;
    cursor: pointer;
  }
  .nav-bar{
    margin-left: 400px;
    text-align: right;
  }
</style>
</div>

<script>
  
</script>