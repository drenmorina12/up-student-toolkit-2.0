<?php
  define("ROOT", "/up-student-toolkit-2.0/");
?>

<style>
  .dropdown {
    position: relative;
    display: inline-block;
    text-align: center;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    min-width: 200px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
    top: calc(100% + 5px);
    left: 50%;
    transform: translateX(-50%);
    padding: 10px;
  }

  .dropdown-content:hover {
    cursor: default;
  }

  .dropdown-content #log-out {
    padding: 5px 10px;
    background-color: var(--primary-color);
    border: 1px solid var(--secondary-color);
    color: var(--secondary-color);
    border-radius: 5px;
  }

  .dropdown-content #log-out:hover {
    cursor: pointer;
    opacity: 0.8;
  }

  .dropdown-content p {
    padding: 10px;
    margin: 0px;
  }

  .dropdown:hover .dropdown-content,
  .dropdown-content:hover {
    display: block;
  }

</style>

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