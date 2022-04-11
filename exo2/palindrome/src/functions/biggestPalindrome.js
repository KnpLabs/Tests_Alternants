const BiggestPalindrome=()=>{
    let biggest = 0;
    
    for (let i = 999; i >= 100; i --) {
        for (let j = 999; j >= 100; j --) {
            let product = i * j
            let s = String(product)
            let rs = s.split('').reverse().join('')
            if (s === rs) {
               biggest=Math.max(biggest,product)

            }
        }
    }
    return biggest
   
}
module.exports=BiggestPalindrome