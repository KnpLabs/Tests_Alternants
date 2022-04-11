const FibonacciOdd=()=>{
   
var tenFirst =[1, 2, 3, 5, 8, 13, 21, 34, 55, 89]
var evens = [];
var sum = 0;

    for (var i = 0; i < tenFirst.length; i++) {
        if (tenFirst[i] % 2 === 0) {
            evens.push(tenFirst[i]);
            console.table(evens)
            for (var j = 0; j < evens.length; j++) {
                sum += evens[j];
            }
        }
    }
   
 return sum;
}
module.exports = FibonacciOdd;
    



