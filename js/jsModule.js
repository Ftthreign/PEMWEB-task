function toggleResult(exampleNumber) {
  let resultBox = document.getElementById("result-" + exampleNumber);
  if (resultBox.style.display === "none" || resultBox.innerHTML === "") {
    showResult(exampleNumber);
    setTimeout(() => {
      resultBox.style.display = "block";
    }, 1000);
  } else {
    resultBox.style.display = "none";
  }
}

function showResult(exampleNumber) {
  let resultBox = document.getElementById("result-" + exampleNumber);
  let result = "";

  switch (exampleNumber) {
    case 1:
      result = `var x = 5;<br>let y = 10;<br>const z = 15;`;
      break;
    case 2:
      let name = "John";
      let age = 30;
      let isStudent = true;
      result = `Name: ${name}<br>Age: ${age}<br>Is Student: ${isStudent}`;
      break;
    case 3:
      function greet(name) {
        return "Hello, " + name + "!";
      }
      result = greet("World");
      break;
    case 4:
      let x = 5;
      if (x > 0) {
        result = "Positif";
      } else {
        result = "Negatif";
      }
      break;
    case 5:
      result = "";
      for (let i = 0; i < 5; i++) {
        result += i + "<br>";
      }
      break;
    case 6:
      let person = {
        name: "John",
        age: 30,
        isStudent: true,
      };
      result = `Name: ${person.name}<br>Age: ${person.age}<br>Is Student: ${person.isStudent}`;
      break;
    case 7:
      let numbers = [1, 2, 3, 4, 5];
      let fruits = ["Apple", "Banana", "Orange"];
      result = `Numbers: ${numbers}<br>Fruits: ${fruits}`;
      break;
    case 8:
      result = "Button clicked";
      break;
    case 9:
      result = "Response from AJAX request";
      break;
  }

  resultBox.innerHTML = result;
}
