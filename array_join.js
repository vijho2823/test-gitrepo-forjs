let dailyActivities=["wake up","bath","eat"];
console.log(dailyActivities);

let connect=dailyActivities.join();
console.log(connect);
let spliting=connect.split(",");
console.log(spliting);

let username="Jhones Reegan";
let split2=username.split(" ");
console.log(split2);

let test=`my name is ${split2[0]} my friends call ${split2[1]}`;
console.log(test);


let test1="This is my own Space";
console.log(test1);
let test2=test1.split(" ");
console.log(test2);

let test3=test2.join("_");
console.log(test3.toUpperCase());

let test4=dailyActivities.concat(test2);
console.log(test4);

let test5=dailyActivities.push("testing1");
console.log(dailyActivities);

let test6=test4.pop();
console.log(test4);

let test7=test6.unshift("")
