document.documentElement.className = "light";
const root = document.documentElement;
const toggle = document.querySelector(".theme-toggle");

document.addEventListener("DOMContentLoaded", () => {
  root.className == "dark"
    ? (toggle.src = "/up-student-toolkit-2.0/images/sun.png")
    : (toggle.src = "/up-student-toolkit-2.0/images/moon.png");

  // if (root.className == "dark") {
  //   toggle.src = "/up-student-toolkit-2.0/images/sun.png";
  // } else {
  //   toggle.src = "/up-student-toolkit-2.0/images/moon.png";
  // }
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

function setTheme() {
  const newTheme = root.className === "dark" ? "light" : "dark";
  if (newTheme == "dark") {
    toggle.src = "/up-student-toolkit-2.0/images/sun.png";
  } else {
    toggle.src = "/up-student-toolkit-2.0/images/moon.png";
  }
  root.className = newTheme;
}

toggle.addEventListener("click", () => {
  setTheme();
});
