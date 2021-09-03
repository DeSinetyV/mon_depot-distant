import React, { useState } from 'react';

const UseStateObject = () => {
  const[person, setPerson]= useState({
    name:"Peter",
    age:24,
    message: "random message",
  });

const [name,setName]= useState('peter')
const [age,setAge]= useState(24)
const [message,setMessage]= useState('random message')



  const changeMessage =() =>{
   // setPerson({...person,message:"hello world"}) // meilleur option , ne necessite pas les 3 const precedentes  
   setMessage('hello world')
  }
  return <>
  <h3>{name}</h3>
  <h3>{age}</h3>
  <h3>{message}</h3>
  <button className="btn" onClick={changeMessage}>change message</button>
  
  </>;
    // return <>
    // <h3>{person.name}</h3>
    // <h3>{person.age}</h3>
    // <h3>{person.message}</h3>
    // <button className="btn" onClick={changeMessage}>change message</button>
    
    // </>;
};

export default UseStateObject;
