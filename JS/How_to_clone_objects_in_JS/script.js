// How to copy objects in JS

// There are a few methods in javascript that enables us to create a clone of an object.

// Object.assign() method
// The Object.assign() method only copies enumerable and own properties from a source object to a target object (link to MDN)
{
const car = {
        type: "SUV",
        manufacturer: "Renault",
        model: "Captur",
        fuel: "oil",
    };
    const copy_car = Object.assign({}, car);
    console.log(copy_car.manufacturer); // "Renault"
}


// Another way to create an object shallow copy  is with the spread syntax operator.
// This is by far the  most concise way to clone an object.
{
    const employee = {
        name: "Marian Rhodes",
        age: 26,
        department: "Marketing",
    }
    const employee_clone = { ...employee }
    employee.age = 40;
    console.log(employee);
    console.log(employee_clone);
}
// As we can see, the change in age in the original obj doesn't reflect to the copy obj.