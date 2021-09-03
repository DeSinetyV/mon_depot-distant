import React, { useState, useEffect } from 'react';
import { findRenderedDOMComponentWithTag } from 'react-dom/test-utils';
const url = 'https://api.github.com/users/QuincyLarson';


const MultipleReturns = () => {
  const[isLoading,setIsLoading] = useState(true); 
  const[isError,setIsError] = useState(false); 
  const[user,setUser] = useState('default user');


  useEffect(()=>{
      fetch(url).then((resp)=> resp.json()).catch(error => console.log(error))

  },[])


if(isLoading){
  return <h2>Loading...</h2>
}
if(isError){
  return <h2>error...</h2>;
}
return <h2>{user}</h2>;

};

export default MultipleReturns;
