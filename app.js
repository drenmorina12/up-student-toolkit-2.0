const root = document.documentElement;
const toggle = document.querySelector(".theme-toggle");

document.addEventListener("DOMContentLoaded", () => {
  // Check if there is prefefrence in cookies, if not, set them
  let colorPreference = getColorPreference();
  if (colorPreference == "") {
    document.documentElement.className = "light";
    sendColorPreference("light");
  } else {
    document.documentElement.className = colorPreference;
  }

  root.className == "dark"
    ? (toggle.src = "/up-student-toolkit-2.0/images/sun.png")
    : (toggle.src = "/up-student-toolkit-2.0/images/moon.png");

  let theme;
  function setTheme() {
    const newTheme = root.className === "dark" ? "light" : "dark";
    if (newTheme == "dark") {
      toggle.src = "/up-student-toolkit-2.0/images/sun.png";
    } else {
      toggle.src = "/up-student-toolkit-2.0/images/moon.png";
    }
    root.className = newTheme;
    theme = newTheme;
  }

  toggle.addEventListener("click", () => {
    setTheme();
    sendColorPreference(theme);
  });

  function sendColorPreference(color) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/up-student-toolkit-2.0/cookies.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(xhr.responseText);
      }
    };

    xhr.send("color=" + color);
  }

  function getColorPreference() {
    var name = "colorPreference=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(";");

    for (var i = 0; i < cookieArray.length; i++) {
      var cookie = cookieArray[i];
      while (cookie.charAt(0) == " ") {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) == 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }
    return "";
  }
});

function scrollToSection(sectionId) {
  const targetSection = document.getElementById(sectionId);

  if (targetSection) {
    window.scrollTo({
      top: targetSection.offsetTop,
      behavior: "smooth",
    });
  }
}
