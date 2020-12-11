import  React , {createContext , useState , useEffect} from 'react';
import axios from "axios";

export const myContext = createContext();

export const  DataProvider = (props) => {
    const [ data , setData ] = useState([]);

    useEffect(()=> {
        axios.get(`http://localhost:8000/api/users`)
            .then(allData =>setData(allData.data.data));
    },[])

    return(
       <myContext.Provider value={[data,setData]}>
           {props.children}
       </myContext.Provider>
    )
}