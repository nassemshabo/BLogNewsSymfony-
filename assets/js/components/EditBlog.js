import React, {useState} from "react";
import {Button , TextField } from "@material-ui/core";
import SaveIcon from '@material-ui/icons/Save';
import { makeStyles } from '@material-ui/core/styles';
import {PhotoCamera} from "@material-ui/icons";
import CancelIcon from '@material-ui/icons/Cancel';

//style
import '../Admin/admin.style.scss';
import axios from "axios";



export default  function ({show , articleData}) {

    const data = articleData[0];
    const close = show[0];

    const changeTitle =  (e) =>  {
        data.setArticle(
            {
                ...data.article,
                title : e.target.value
            }
        );
    }

    const changeSubTitle  = (e) =>  {
        data.setArticle(
            {
                ...data.article,
                subtitle : e.target.value

            }
        );
    }
    const saveData = () => {
        axios.post('api/admin/edit/save', data.article.id).then(response => {
               console.log(response)
        }).catch(error => {
            console.log(error)
        })
        close.setEditForm(!close.editForm)
    }
    return (
        <div className="edit_form" style={{display: close.editForm? "block":"none"}} >
            <CancelIcon onClick={() => close.setEditForm(!close.editForm)}   className="close_icon"/>
            <h1 className="title">Edit Article </h1>
            <form  noValidate autoComplete="off">
                <TextField className="inputs" id="standard-basic"  value={data.article.title} onChange={changeTitle} />
                <TextField className="inputs" id="standard-basic"  value={data.article.subtitle} onChange={changeSubTitle} />
                <TextField className="inputs" id="outlined-full-width" label="Label" style={{ margin: 8 }} placeholder="main description"  fullWidth margin="normal" InputLabelProps={{shrink: true,}} variant="outlined"/>
                <input
                    accept="image/*"
                    id="contained-button-file"
                    multiple
                    type="file" style={{display:"none"}}
                />

                <label htmlFor="contained-button-file">
                    <Button variant="contained" color="primary" component="span" >
                        Upload<PhotoCamera />
                    </Button>
                </label>

                <Button
                    variant="contained"
                    color="primary"
                    size="large"
                    onClick={saveData}
                    startIcon={<SaveIcon />}
                >
                    Save
                </Button>
            </form>
        </div>
    )
}