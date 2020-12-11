import React from 'react';
import {Link, Redirect, Route, Switch} from "react-router-dom";
import FavNews from "../Pages/FavNews";
import Contact from "../Pages/Contact";
import Admin from "../Admin/Admin";
import News from "../Pages/News";
import Home from "../Pages/Home";
import {DataProvider} from "./DataContext";

export default function Navbar() {
    return (
       <DataProvider>
           <div>
               <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                   <Link className={"navbar-brand"} to={"/"}> NewsBLog </Link>
                   <div className="collapse navbar-collapse" id="navbarText">
                       <ul className="navbar-nav mr-auto">
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/contact"}> Contact </Link>
                           </li>
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/favorite"}> favorite Blogs </Link>
                           </li>
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/news"}> news </Link>
                           </li>
                       </ul>
                   </div>
               </nav>
               <Switch>
                   <Redirect exact from="/" to="/mainpage" />
                   <Route path="/contact" component={Contact} />
                   <Route path="/favorite" component={FavNews} />
                   <Route path="/admin" component={Admin}/>
                   <Route path="/news" component={News}/>
                   <Route path="/" component={Home}/>
               </Switch>
           </div>
       </DataProvider>
    )
}