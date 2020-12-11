import React, {useState} from "react";
import Switch from "@material-ui/core/Switch";
import FormControlLabel from "@material-ui/core/FormControlLabel";
import axios from "axios";


export default  function Swich({article}) {

    const [aktiv , setAktiv ]  = useState(article.activated);


    const handelChange = () => {

        axios.post('api/blogs/aktivate',article.id).then(response => {
            console.log(response)
        }).catch(error => {
            console.error(error)
        })
        setAktiv(!aktiv)
    }
   return (
       <FormControlLabel
           control={<Switch onChange={handelChange} checked={aktiv} name="checkedA" />}
           label={!aktiv?"Inkativ":"Aktiv"}
       />
   )
}