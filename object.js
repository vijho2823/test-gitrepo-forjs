let IDcard = {
    ename: "Vithya",
    e_id: 198,
    d_o_b: "02-04-2002",
    blood_group: "0+",
    address: {
        v_name: "Oriyur"
    }
};
IDcard.e_id = 124;  //OVERRIDING 
// console.log(IDcard);

//Dot Notation

console.log(IDcard.d_o_b);
console.log(IDcard.address.v_name);

//bracket Notation
IDcard["blood_group"] = "B+";
console.log(IDcard["blood_group"]);


let love={
name:"Jhones",
age:22,
Job:IT
}

console.log(love);




