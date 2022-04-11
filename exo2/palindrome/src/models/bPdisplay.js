import BiggestPalindrome from '../functions/biggestPalindrome.js'

function BPDisplay(){
    const bP= BiggestPalindrome()
 
      return (

        <>
             <h2>Le plus grand palindrome etant le produit de nombre à 3 chiffres :</h2>
             <h1>{bP}</h1>
        </>
      )
 }
export default BPDisplay

