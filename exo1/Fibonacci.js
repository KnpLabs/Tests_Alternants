function fibonacciEvenSum() {
  // Create an array to store the fibonacci sequence
  const fibonacci = [1, 2, 3];

  // Get the value of last index of the array
  const lastIndex = fibonacci[fibonacci.length - 1];

  // Create a loop to get the fibonacci sequence until the last number is less than 4000000
  while (lastIndex < 4000000) {
    let nextIndex =
      fibonacci[fibonacci.length - 1] + fibonacci[fibonacci.length - 2];
    // If the next number is greater than 4000000, we stop the loop
    if (nextIndex > 4000000) {
      break;
    }
    fibonacci.push(nextIndex);
  }

  function numIsPair(n) {
    return n & 1 ? false : true;
  }

  // New array to store the even numbers
  const evenNumbers = [];
  for (const nombre of fibonacci) {
    if (numIsPair(nombre)) {
      evenNumbers.push(nombre);
    }
  }

  // Add all the even numbers and return it
  return evenNumbers.reduce((a, b) => a + b, 0);
}

console.log(fibonacciEvenSum());
