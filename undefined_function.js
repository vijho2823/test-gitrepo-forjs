function sum(a, b) {
    return a + b;

}

// parameter missing so nan return

let tes2 = sum();
document.getElementById('test2').innerHTML = tes2;

//function parantheses missing so return the hole function 

let test3 = sum;
document.getElementById("test3").innerHTML = test3;
