// ./src/js/app.js

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import '../styles/app.css';

// components
import MainApp from './Pages/MainApp';



ReactDOM.render(

         <Router>
             <MainApp/>
         </Router>

    , document.getElementById('root'));