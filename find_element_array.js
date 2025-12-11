let Vegetables=[
    {id:1,name:"veg",quantity:6},
    {id:2,name:"Non-Veg",quantity:2},
    {id:3,name:"Milk",quantity:9},
]

let result=Vegetables.find(function(Groceries){
 return Groceries.Vegetables==="veg";
});
console.log(result);