//this function is automatically call that is called imediately invoked function


// (function add(a,b){
//     let result=a+b;
//     console.log("a +b is : "+result);
// }(10,20));

((a,b)=>{
    let result=a+b;
    console.log("a +b is : "+result);
})(10,20);
