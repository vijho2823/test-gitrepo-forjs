let love={
    name:"Jhones",
    age:22,
    Job:"IT"
    };

    let j="name";
    let k="age";
    
    // console.log(love);
    // console.log(love["name"]);
    // console.log(love["age"]);
    // console.log(love[x]);
    // document.getElementById("jho").innerHTML="Welcome to Object Calling";
    document.getElementById("jho").innerHTML="My name is  "+love[j]+" and i am "+love[k]+" years old";

    //Adding New Properties


    love.work="Graphic Designer";
    console.log(love);

    // redeclaring properties

    love.work="UI/UX Designer";
    console.log(love);
    
    //delete properties

    delete love.job;
    console.log(love.job);

    