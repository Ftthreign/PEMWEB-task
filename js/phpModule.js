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
      result = `$x = 5;<br>$y = "Hello";<br>$z = true;`;
      break;
    case 2:
      let name = "John";
      result = `Hello, ${name}!`;
      break;
    case 3:
      let x = 5;
      result = x > 0 ? "Positif" : "Negatif";
      break;
    case 4:
      result = "";
      for (let i = 0; i < 5; i++) {
        result += i + "<br>";
      }
      break;
    case 5:
      function greet(name) {
        return "Hello, " + name + "!";
      }
      result = greet("World");
      break;
    case 6:
      let numbers = [1, 2, 3, 4, 5];
      let fruits = ["Apple", "Banana", "Orange"];
      result = `Numbers: ${numbers.join(", ")}<br>Fruits: ${fruits.join(", ")}`;
      break;
    case 7:
      result = "Form submitted successfully!";
      break;
    case 8:
      result = "Connected successfully";
      break;
    case 9:
      sessionStorage.setItem("user", "John");
      result = `Welcome, ${sessionStorage.getItem("user")}`;
      break;
  }

  resultBox.innerHTML = result;
}
