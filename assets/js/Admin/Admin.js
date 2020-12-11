import React, {useContext, useState} from 'react';
import Addpost from "../components/Addpost";
import {myContext} from "../components/DataContext";
import {Redirect, Route, Switch} from "react-router-dom";
import Blogs from "./Pages/Blogs";
import BadgeMax from "../components/Mail";
import SimpleTooltips from "../components/AddBottom";





export default function Admin() {
    const [data , setData ] = useContext(myContext);

    return (
       <div className="container">
           <h1>hello from admin12 {<BadgeMax/>}</h1>
           <div style={{display:"none"}}>
               <Addpost />
           </div>
           <div>
               <Blogs data={data}/>
               <SimpleTooltips/>
           </div>

       </div>
    );
}
