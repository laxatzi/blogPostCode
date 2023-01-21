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

// Both the Object.assign() method  and the spread syntax operator are sufficient for creating shallow copies of an object.
// but not deep copies.
// With multi-dimensional object, any change in a nested object would also affect the original object.

// example
{
    const car = {
        type: "SUV",
        manufacturer: "Renault",
        model: "Captur",
        fuel: {
             standard: "oil",
             hybrid: "lng/oil",
           }
    };
    const copy_car = Object.assign({}, car);
    copy_car.fuel.standard = 'gasoline';
    console.log(car);
    console.log(copy_car);

}

// original array is affected. The same would have happened if we used the spread syntax operator d


// How to create a deep copy of an obj with JS
// The best way to create a deep copy is by using the structuredClone() native method..
// In this method we pass the  object we want to clone in as an argument.
// Then it returns a value that is a deep copy of the original value.
// In order to achieve this it uses the structured clone algorithm [link]
// https://developer.mozilla.org/en-US/docs/Web/API/Web_Workers_API/Structured_clone_algorithm


const marine_biology = {
  fish: ["sea-bass", "sardine"],
  jellyfish: ["Cotylorhiza tuberculata", "Pelagia noctiluca"],
};

const med_marine_biology = structuredClone(marine_biology);
//After cloning, changes to each object do not affect the other object.
med_marine_biology.jellyfish.push("Moon jelly");
marine_biology.jellyfish.pop();

console.log(med_marine_biology); //
console.log(marine_biology); //
