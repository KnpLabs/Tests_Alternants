const fibonacciNumbers = [0, 1];

let stop = false;
const fibonacciLimit = 4000000;

const fibonacciCalculator = () => {
    while (stop === false) {
        const newNumber = sumOfTwoLastElement(fibonacciNumbers)
        if (newNumber < fibonacciLimit) {
            fibonacciNumbers.push(sumOfTwoLastElement(fibonacciNumbers))
        } else {
            stop = true;
        }
    }
}

const sumOfTwoLastElement = (array) => {
    return (array[array.length - 1] + array[array.length - 2])
}

fibonacciCalculator()
console.log(`The sum of numbers of the fibonacci sequence is ${fibonacciNumbers.reduce((a, b) => a + b)} with a fixed limite at 4 000 000.`)