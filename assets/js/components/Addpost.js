import React, {useEffect, useState} from 'react';
import { Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import  axios from "axios";
import {Redirect} from "react-router-dom";


const Addpost = ({data}) => {

    const [title , setTitle ] = useState('');
    const [subTitle , setSubTitle ] = useState('');
    const [desc , setDesc ] = useState('');
    const [imgData , setImgData ] = useState('');
    const [blog , setBlog ] = useState('')

    const addTitle = (e) => setTitle(e.target.value);
    const addSubTitle = (e) => setSubTitle(e.target.value);
    const addDesc = (e) => setDesc(e.target.value);
    const addImgUrl = (e) => setImgData(e.target.value);

    const addData  = (e) => {
        setBlog(
            {
                title : title ,
                subtitle : subTitle,
                img_url : imgData,
                main_desc : desc
            })

        return  <Redirect to="/" />
    }

    useEffect(() =>{

        if (blog !== '') {

            axios.post('api/blogs/create', blog).then( response => {

            }).catch(error => {
                console.error(error)
            })
        }

    },[blog])



    return (
        <Form onSubmit={addData}>
            <FormGroup>
                <Label for="exampleEmail">Title</Label>
                <Input onChange={addTitle} type="text"  name="title"  placeholder="title" />
            </FormGroup>
            <FormGroup>
                <Label >Sub Title</Label>
                <Input onChange={addSubTitle} type="text" name="subTitle"  placeholder="sub title" />
            </FormGroup>
            <FormGroup>
                <Label for="exampleText">Text Area</Label>
                <Input onChange={addDesc} type="textarea" name="description" id="exampleText" placeholder="description" />
            </FormGroup>
            <FormGroup>
                <Label for="exampleFile">File</Label>
                <Input onChange={addImgUrl}  type="file" name="file" id="exampleFile" />
                <FormText color="muted">
                    This is some placeholder block-level help text for the above input.
                    It's a bit lighter and easily wraps to a new line.
                </FormText>
            </FormGroup>
            <Button>Submit</Button>
        </Form>
    );
}

export default Addpost;