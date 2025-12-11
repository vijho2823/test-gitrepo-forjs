let amazon=[
    {id:1,ename:"laptop",price:56000},
    {id:3,ename:"Fridge",price:10000},
    {id:2,ename:"mobile",price:25000},
    {id:4,ename:"washing machine",price:8000}
];


// let priceFilter=amazon.filter((value)=>
// value.price<12000
// );

// console.log(priceFilter);




let findElement=amazon.find((value)=>
    value.price>25000
    )

    console.log(findElement);


    let findIndex = amazon.findIndex((value)=>
        value.price<15000);
        
        console.log(findIndex);  