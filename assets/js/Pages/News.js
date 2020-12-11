import React, {useContext} from 'react';
import { makeStyles } from '@material-ui/core/styles';
import {CircularProgress} from '@material-ui/core';

//components
import RecipeReviewCard from "../components/Card";
import {DataProvider, myContext} from "../components/DataContext";


const useStyles = makeStyles((theme) => ({
    root: {
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        height:"100vh",
        '& > * + *': {
            marginLeft: theme.spacing(2),
        },
    },
}));
export default function News () {

    const [data , setData ] = useContext(myContext);

    const classes = useStyles();
    if (!data[0]) {
        return (
            <div className={classes.root}>
                <CircularProgress color="secondary" />
            </div>
        )
    }
    return (
        <DataProvider>
            <h1>news</h1>
            <div className="container" >
                <div className="row">
                    {
                        data.filter(data => data.activated  == 1).map(blog =>(
                            <RecipeReviewCard blog={blog}/>
                        ))
                    }
                </div>
            </div>
        </DataProvider>
    )
}