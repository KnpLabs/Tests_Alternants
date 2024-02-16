// create a array to store the fibonacci sequence
let fibonacci = [1, 2, 3];

// get the value of last index of the array
let lastIndex = fibonacci[fibonacci.length - 1];

// create a loop to get the fibonacci sequence until the last number is less than 4000000
while (lastIndex < 4000000) {
  let nextIndex =
    fibonacci[fibonacci.length - 1] + fibonacci[fibonacci.length - 2];
  // if the next number is greater than 4000000, we stop the loop
  if (nextIndex > 4000000) {
    break;
  }
  fibonacci.push(nextIndex);
  lastIndex = fibonacci[fibonacci.length - 1];
}

function numIsPair(n) {
  return n & 1 ? false : true;
}

// create a new array to store the even numbers
const evenNumbers = [];
for (const nombre of fibonacci) {
  if (numIsPair(nombre)) {
    evenNumbers.push(nombre);
  }
}

console.log(evenNumbers.reduce((a, b) => a + b, 0));
