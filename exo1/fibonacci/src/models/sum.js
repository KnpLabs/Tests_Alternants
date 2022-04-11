import { useState,useEffect } from 'react';
import FibonacciOdd from '../function/fibonacciOdd.js'

function Sum(){
    const fibonacciPairSum= FibonacciOdd()
    const [counter, setCounter] = useState(0);

   useEffect(() => {
        counter < fibonacciPairSum && setTimeout(() => setCounter(counter + 1), 100);
      }, [counter]);
  useEffect(() => {
    setCounter(0)
  } ,[])
      return (

        <>
            <h2>Somme des chiffre paires <br></br> des 10 premiers nombres de la suite de Fibonacci: </h2>
            <h1>{counter}</h1>
        </>
      )
 }
export default Sum