function multiply(a,b){
    if(isNaN(a)||isNaN(b)){
       alert("enter valid numbers");
        return;
    };
let finalValue=a*b/100;
alert(b+"% of "+a +" is : "+ finalValue);
}

let a=prompt("Enter the base value");
let b=prompt("Enter the percentage value");

a=parseFloat(a);
b=parseFloat(b)

multiply(a,b);