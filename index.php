<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="images/logo1.png">
  <title>Sign Up - UP Student Toolkit</title>
  <link rel="stylesheet" href="sign-up/sign-up.css">
</head>

<body>
  <!-- Main text -->
  <main class="main-container">
    <!-- Second text -->
    <section class="info-section">
      <img src="images/logo1.png" alt="UP Student Toolkit Logo" class="sign-up-logo">
      <h1> UP Student Toolkit</h1>
      <p>  Faqja zyrtare e krijuar nga student&#235t e Fakultetit t&#235 Inxhinieris&euml Elektrike dhe Kompjuterike - FIEK.</p>
    </section>
    <section class="form-section">
      <!-- Forma -->
      <form class="main-form">
        <!-- Emri-->
        <div class="input-field">

          <input class="first-name" id="first-name" type="text" placeholder="Emri">
          <label for="first-name" class="name-label"></label>
        </div>
        <!-- Mbiemri -->
        <div class="input-field">
          <input class="last-name" type="text" placeholder="Mbiemri">
          <label for="last-name" class="lastname-label"></label>
        </div>
        <!-- Email -->
        <div class="input-field">
          <input class="user-email" type="email" placeholder="Email" value="@student.uni-pr.edu">
          <label for="user-email" class="email-label"></label>
        </div>
        <!-- Passwordi -->
        <div class="input-field">
          <input class="user-pass" type="password" placeholder="Passwordi" >
          <label for="user-pass" class="pass-label"></label>
        </div>
        <!-- Kyquni -->
        <a href="ballina.php" class="submit-info" id="submit-info">Kyquni</a>
        <!-- Kushtet dhe Sherbimet -->
        </div>
        <label class="tnc" for="submit-info"> Duke klikuar butonin ju pajtoheni <a href=""><i><u>me Kushtet dhe Shërbimet tona.</u></i></a></label>
      </form>
    </section>
  </main>

  <script src="sign-up/sign-up.js"></script>

</body>
</html>