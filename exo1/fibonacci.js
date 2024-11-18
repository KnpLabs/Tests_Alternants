
// create a fibonacci array that stop when a value is greater than 4 millions
function fibonacciRank(rank) {
    let fibonacciArray = [0, 1]

    for (let i = 0; i <= rank - 2 ; i++) {
        if (fibonacciArray[i] + fibonacciArray[i + 1] > 4000000) {
            console.log("Array stop at rank "+ i + " because the next value is greater than 4 millions : " + fibonacciArray)
            return fibonacciArray
        

    }else {
        fibonacciArray.push(fibonacciArray[i] + fibonacciArray[i + 1])

    }
    }
    console.log(fibonacciArray)
    return fibonacciArray
}

// sum the values of fibonacciAray

function sumFibonacciArray(rank){
let sum = 0
array = fibonacciRank(rank)
array.forEach(number => {

    sum += number
    
});

console.log( "Sum of fibonacciArray is " + sum )
return sum
}