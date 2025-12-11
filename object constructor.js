//factory function


function createCompany(cname){
    return {
name:cname;
welcome(){
console.log(`welcome to ${this.name}`);

}
}
};

let call= createCompany("Innovano");
call.welcome();