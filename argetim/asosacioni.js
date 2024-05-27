document.addEventListener("DOMContentLoaded", () => {
  // const specialButtonContainer = document.querySelector(
  //   ".special-button-container"
  // );
  // const dropdownContent = document.querySelector(".dropdown-content");

  // specialButtonContainer.addEventListener("mouseenter", () => {
  //   dropdownContent.style.display = "block";
  // });

  // specialButtonContainer.addEventListener("mouseleave", () => {
  //   // Use a timeout to delay hiding the dropdown, allowing for smoother transitions
  //   setTimeout(() => {
  //     dropdownContent.style.display = "none";
  //   }, 10000); // Adjust the delay as needed
  // });

  console.log("LOADED");
  fetchAsosaciones();
});

const asosacioni = document.querySelector("#asosacioni-table");
const asosacioniButtons = document.querySelectorAll(".asosacioni-button");
const resetBtn = document.querySelector(".reset-button");
const asosacioniHeaderText = document.querySelector(
  "#asosacioni .heading-text h3"
);
const createBtn = document.querySelector(".create-asosacion");
const saveBtn = document.querySelector(".save-asosacion");
const buttonsContainer = document.querySelector(".asosacioni-buttons");

let currentAsosacion;
let currentAsosacionText = '"Përgjithshëm"';

// Templates -----------------------------
const columns = ["A", "B", "C", "D"];

// Create template with object constructor0
function TopicTemplate(A, B, C, D) {
  this.A = [A[0], A[1], A[2], A[3], A[4], A[5]];
  this.B = [B[0], B[1], B[2], B[3], B[4]];
  this.C = [C[0], C[1], C[2], C[3], C[4]];
  this.D = [D[0], D[1], D[2], D[3], D[4]];
}

// Usage
const template = new TopicTemplate(
  ["A1", "A2", "A3", "A4", "Zgjidhja A", "ZGJIDHJA PËRFUNDIMTARE"],
  ["B1", "B2", "B3", "B4", "Zgjidhja B"],
  ["C1", "C2", "C3", "C4", "Zgjidhja C"],
  ["D1", "D2", "D3", "D4", "Zgjidhja D"]
);

const finalResulTemplate = "Zgjidhja Perfundimtare";
// ---------------------------------------

const fizikaSolutions = {
  A: "BOMBA",
  B: "BËRTHAM/ORE",
  C: "GRIMCË",
  D: "CHERNOBYL",
};

const finalResultFizika = "Atomi";

const fizika = {
  A: [
    "Shpërthim",
    "Hiroshima - 1945",
    "Lufta",
    "Montimi",
    fizikaSolutions.A,
    finalResultFizika,
  ],
  B: ["Toka", "Avokado", "Armët", "Energji-", fizikaSolutions.B],
  C: ["Orizi", "Molekula", "E imët", "bit", fizikaSolutions.C],
  D: ["Ukraina", "Katastrofa", "Rrezatimi", "I Pa banuar", fizikaSolutions.D],
};

const matematikaSolution = {
  A: "HEXADECIMAL",
  B: "INT",
  C: "VITI",
  D: "IMAGJINARË",
};

const finalResultMatematika = "Numrat";

const matematika = {
  A: [
    "Sistem",
    "16",
    "Shkronja",
    "0-F",
    matematikaSolution.A,
    finalResultMatematika,
  ],
  B: ["4-byte", "Shifra", "Programim", "Deklarim", matematikaSolution.B],
  C: ["I brishtë", "Akademik", "Qytet", "I Ri", matematikaSolution.C],
  D: ["Ëndërra", "Jo reale", "Dëshira", "Truri", matematikaSolution.D],
};

const pergjithshemSolution = {
  A: "GJURI",
  B: "KUPA",
  C: "SYRI",
  D: "TENXHERE",
};

const finalResultPergjithshem = "Kapaku";

const pergjithshem = {
  A: [
    "Këmba",
    "Femuri",
    "Meniskusi",
    "Patella",
    pergjithshemSolution.A,
    finalResultPergjithshem,
  ],
  B: ["Ari", "Qielli", "Finale", "Trofe", pergjithshemSolution.B],
  C: ["Londra", "Shqisa", "Shqiponj", "Syzet", pergjithshemSolution.C],
  D: ["Gjella", "Zierja", "Ceka", "E metalit", pergjithshemSolution.D],
};

const webSolutions = {
  A: "KUQE",
  B: "GAZETA",
  C: "NUMRI",
  D: "WEB-",
};

const finalResulWeb = "Faqe";

const web = {
  A: ["RGB", "Zemra", "Vera", "Molla", webSolutions.A, finalResulWeb],
  B: ["Lajme", "Ditore", "Leximi", "Letra", webSolutions.B],
  C: ["Romak", "Monedh", "Binar", "Fanella", webSolutions.C],
  D: ["www", "Interneti", "URL", "Domeni", webSolutions.D],
};

const subjects = {
  matematika: matematika,
  fizika: fizika,
  pergjithshem: pergjithshem,
  web: web,
};

//--------------------------------------------------

function createTable() {
  for (let i = 0; i < 5; i++) {
    const row = document.createElement("div");
    row.className = "row";

    columns.forEach((column) => {
      const cell = document.createElement("div");
      cell.className = "cell";
      cell.textContent = template[column][i].toLocaleUpperCase();
      cell.setAttribute("data-column", column);
      if (i == 4) {
        cell.classList.add("final-column-cell");
      }
      row.appendChild(cell);
    });

    asosacioni.appendChild(row);
  }

  const row = document.createElement("div");
  row.className = "row";

  const cell = document.createElement("div");
  cell.className = "cell";
  cell.setAttribute("id", "final-cell");
  cell.setAttribute("data-column", "A");
  cell.classList.add("final-column-cell");
  cell.textContent = template["A"][5].toLocaleUpperCase();
  row.appendChild(cell);
  asosacioni.appendChild(row);
}

function updateCellContent(e, wordList) {
  const column = e.currentTarget.getAttribute("data-column");

  const row = Array.from(
    e.currentTarget.parentElement.parentElement.children
  ).indexOf(e.currentTarget.parentElement);

  e.currentTarget.textContent = wordList[column][row];
  e.currentTarget.style.cssText =
    "background-color: white; color: #002244; border: 2px solid #002244";
}

// Dynamic part

function createEditableTable() {
  const titulli = document.createElement("input");
  titulli.type = "text";
  titulli.className = "input-cell";
  titulli.setAttribute("id", "title");
  titulli.placeholder = "Titulli";
  asosacioni.append(titulli);
  for (let i = 0; i < 5; i++) {
    const row = document.createElement("div");
    row.className = "row";

    columns.forEach((column) => {
      const cell = document.createElement("div");
      cell.className = "cell";
      const input = document.createElement("input");
      input.type = "text";
      input.className = "input-cell";
      input.setAttribute("data-column", column);
      input.placeholder = `${column}${i + 1}`;
      input.setAttribute("id", `${column}${i + 1}`);
      if (i == 4) {
        input.classList.add("final-column-input");
        input.placeholder = `ZGJIDHJA ${column}`;
        input.setAttribute("id", `zgjidhja${column}`);
      }
      cell.appendChild(input);
      row.appendChild(cell);
    });

    asosacioni.appendChild(row);
  }

  const row = document.createElement("div");
  row.className = "row";

  const cell = document.createElement("div");
  cell.className = "cell";
  cell.setAttribute("id", "final-cell");
  const input = document.createElement("input");
  input.type = "text";
  input.className = "input-cell";
  input.placeholder = "ZGJIDHJA PËRFUNDIMTARE";
  input.setAttribute("id", "zgjidhja-perfundimtare");
  input.setAttribute("data-column", "A");
  input.classList.add("final-column-input");
  cell.appendChild(input);
  row.appendChild(cell);
  asosacioni.appendChild(row);
}

function addCellEventListeners(subject) {
  const cells = document.querySelectorAll(".cell");
  cells.forEach((cell) => {
    cell.addEventListener("click", (e) => {
      updateCellContent(e, subject);
      // if (cell.classList.contains("final-column-cell")) {
      //   cell.style = "font-weight: bold";
      // }
    });

    asosacioniHeaderText.textContent = `Jeni duke lujatur asoacionin me temen ${currentAsosacionText} !!`;
  });
}

function resetAsosacioni() {
  asosacioni.innerHTML = "";
}

function setActiveButton(button) {
  asosacioniButtons.forEach((btn) => btn.classList.remove("active"));
  button.classList.add("active");
}

function setAsosacioni(button) {
  setActiveButton(button);
  resetAsosacioni();
  createTable();
  const subject = button.getAttribute("data-name");

  if (subjects.hasOwnProperty(subject)) {
    currentAsosacionText = `"${
      subject.charAt(0).toUpperCase() + subject.slice(1)
    }"`;
    addCellEventListeners(subjects[subject]); // Get the corresponding object
    currentAsosacion = subjects[subject]; // Assign the corresponding object
  } else {
    alert("Ky asosacion nuk ekziston! ");
  }
}

function sendAsosacioni(asosacioni) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/up-student-toolkit-2.0/asosacioni.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
    }
  };

  xhr.send(JSON.stringify({ asosacioni: asosacioni }));
}

function fetchAsosaciones() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "/up-student-toolkit-2.0/getAsosacione.php");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      try {
        var responseData = JSON.parse(xhr.responseText);
        var str1 = JSON.stringify(subjects, null, 4); // (Optional) beautiful indented output.
        console.log("First time: " + str1);
        updateSubjects(responseData);
        str1 = JSON.stringify(subjects, null, 4); // (Optional) beautiful indented output.
        console.log("Second time: " + str1);
      } catch (e) {
        console.error("Failed to parse JSON response:", e);
      }
    }
  };
  xhr.send();
}

function updateSubjects(asosaciones) {
  for (let title in asosaciones) {
    if (asosaciones.hasOwnProperty(title)) {
      subjects[title] = asosaciones[title];
    }
  }

  updateAsosacioniButtons();
}

function updateAsosacioniButtons() {
  // Clear existing dynamic buttons
  const dropdownContent = document.querySelector(".dropdown-content");
  dropdownContent.innerHTML = "";

  let count = 0;
  for (let title in subjects) {
    if (subjects.hasOwnProperty(title)) {
      count++;

      if (count <= 3) {
        // Skip the first three subjects as they are default
        continue;
      }
      console.log("Inside change button!");
      // Create a new button for additional asosaciones
      let newDropdownBtn = document.createElement("button");
      newDropdownBtn.className = "asosacioni-button dropdown-item";
      newDropdownBtn.setAttribute("data-name", title);
      newDropdownBtn.textContent = title;
      dropdownContent.append(newDropdownBtn);

      // Add click event to dynamically change the special button text and trigger the setAsosacioni function
      newDropdownBtn.addEventListener("click", (event) => {
        event.stopPropagation();
        const specialButton = document.querySelector(".special-button");
        specialButton.textContent = title;
        setAsosacioni(newDropdownBtn);
        dropdownContent.style.display = "block";
      });
    }
  }

  // Show/hide dropdown on special button hover
  const specialButton = document.querySelector(".special-button");
  // const dropdownContent = document.querySelector(".dropdown-content");

  // Function to show the dropdown content
  function showDropdown() {
    dropdownContent.style.display = "block";
  }

  // Function to hide the dropdown content
  function hideDropdown() {
    dropdownContent.style.display = "none";
  }

  // Event listener for mouseenter on the special button
  specialButton.addEventListener("mouseenter", () => {
    showDropdown();
  });

  // Event listener for mouseleave on the special button
  specialButton.addEventListener("mouseleave", () => {
    // Check if the mouse has entered the dropdown content
    setTimeout(() => {
      if (!dropdownContent.matches(":hover")) {
        hideDropdown();
      }
    }, 100); // Small delay to allow moving to the dropdown content
  });

  // Event listener for mouseenter on the dropdown content
  dropdownContent.addEventListener("mouseenter", () => {
    showDropdown();
  });

  // Event listener for mouseleave on the dropdown content
  dropdownContent.addEventListener("mouseleave", () => {
    // Check if the mouse has entered the special button
    setTimeout(() => {
      if (!specialButton.matches(":hover")) {
        hideDropdown();
      }
    }, 100); // Small delay to allow moving to the special button
  });
}

function handleSave() {
  // Get values from create asosacioni table
  let a1 = document.querySelector("#A1").value;
  let a2 = document.querySelector("#A2").value;
  let a3 = document.querySelector("#A3").value;
  let a4 = document.querySelector("#A4").value;
  let zgjidhjaA = document.querySelector("#zgjidhjaA").value;

  let b1 = document.querySelector("#B1").value;
  let b2 = document.querySelector("#B2").value;
  let b3 = document.querySelector("#B3").value;
  let b4 = document.querySelector("#B4").value;
  let zgjidhjaB = document.querySelector("#zgjidhjaB").value;

  let c1 = document.querySelector("#C1").value;
  let c2 = document.querySelector("#C2").value;
  let c3 = document.querySelector("#C3").value;
  let c4 = document.querySelector("#C4").value;
  let zgjidhjaC = document.querySelector("#zgjidhjaC").value;

  let d1 = document.querySelector("#D1").value;
  let d2 = document.querySelector("#D2").value;
  let d3 = document.querySelector("#D3").value;
  let d4 = document.querySelector("#D4").value;
  let zgjidhjaD = document.querySelector("#zgjidhjaD").value;

  let zgjidhjaPerfundimtare = document.querySelector(
    "#zgjidhja-perfundimtare"
  ).value;

  let title = document.querySelector("#title").value;

  // Save all values on a temp object
  let tempAsosacion = {
    A: [a1, a2, a3, a4, zgjidhjaA, zgjidhjaPerfundimtare, title],
    B: [b1, b2, b3, b4, zgjidhjaB],
    C: [c1, c2, c3, c4, zgjidhjaC],
    D: [d1, d2, d3, d4, zgjidhjaD],
  };

  sendAsosacioni(tempAsosacion);

  // Add temp object to subjects object
  subjects[title] = tempAsosacion;

  // Create new button
  let newBtn = document.createElement("button");
  newBtn.className = "asosacioni-button";
  newBtn.setAttribute("data-name", title);
  newBtn.textContent = title;
  // Adds event listener to button

  buttonsContainer.append(newBtn);

  newBtn.addEventListener("click", () => setAsosacioni(newBtn));
  setAsosacioni(newBtn);
}

resetBtn.addEventListener("click", () => {
  // resetAsosacioni();
  // createTable();
  // addCellEventListeners(currentAsosacion);
});

createBtn.addEventListener("click", () => {
  resetAsosacioni();
  createEditableTable();
});

saveBtn.addEventListener("click", handleSave);

asosacioniButtons.forEach((button) => {
  button.addEventListener("click", () => setAsosacioni(button));
});

createTable();
addCellEventListeners(pergjithshem);
