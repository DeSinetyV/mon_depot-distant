import React, { useState, useEffect } from 'react';
// by default useEffect runs after every re-render
// cleanup function
// second parameter


const UseEffectBasics = () => {
  const [value,setValue]= useState(0)


useEffect(()=>{  
  console.log('call useEffect');
  if(value>1){
  document.title = `New Message(${value})`;
};
}, [value]);

useEffect(() => {
  console.log('hello world')

}, [])   // sans les crochets => s'applique a chaque tour // [value] => s'applique à chaque modification de la valeur de value

console.log('render component');
  return <>
  <h1>{value}</h1>
  <button className="btn" onClick={()=>setValue(value + 1)}>click me</button>
  </>;
};

export default UseEffectBasics;
  