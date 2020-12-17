import React, {useState} from 'react';
import { withStyles, makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table';
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Paper from '@material-ui/core/Paper';
import Swich from "./Swich";
import BackspaceIcon from '@material-ui/icons/Backspace';
import EditIcon from '@material-ui/icons/Edit';
import  axios from "axios";
import Alert from '@material-ui/lab/Alert';
import EditBlog from "./EditBlog";



const StyledTableCell = withStyles((theme) => ({
    head: {
        backgroundColor: theme.palette.common.black,
        color: theme.palette.common.white,
    },
    body: {
        fontSize: 14,
    },
}))(TableCell);

const StyledTableRow = withStyles((theme) => ({
    root: {
        '&:nth-of-type(odd)': {
            backgroundColor: theme.palette.action.hover,
        },
    },
}))(TableRow);

const useStyles = makeStyles({
    table: {
        minWidth: 700,
    },
});

export default function CustomizedTables({data}) {
    const classes = useStyles();

    const [ massage , setMessage ] = useState('');
    const [editForm , setEditForm ] = useState(false);
    const [article , setArticle ] = useState('')


    const deleteItem = (id) => {
        axios.post('api/admin/delete', id).then(respnse => {
            console.log(respnse.data)
            setTimeout(()=> {
                location.reload()
            } , 600 )
        }).catch(error => {
            console.log(error)
        })
    }

    const editItem = (id) => {
        axios.post('api/admin/edit', id).then(respnse => {
            setArticle(respnse.data)
            setEditForm(!editForm)
        }).catch(error => {
            console.log(error)
        })
    }

    return (
       <div>
           <EditBlog show={[{editForm , setEditForm}]} articleData={[{article , setArticle}]}/>
           {massage?<Alert severity="success">{massage}</Alert>:null}
           <TableContainer component={Paper}>
               <Table className={classes.table} aria-label="customized table">
                   <TableHead>
                       <TableRow>
                           <StyledTableCell>Blogs Title</StyledTableCell>
                           <StyledTableCell align="right">DeleteItem</StyledTableCell>
                           <StyledTableCell align="right">EditItem</StyledTableCell>
                           <StyledTableCell align="right">DisableItem</StyledTableCell>
                       </TableRow>
                   </TableHead>
                   <TableBody>
                       {
                         data.map(data => (
                              <StyledTableRow key={data.id}>
                                  <StyledTableCell component="th" scope="row">
                                      {data.title}
                                  </StyledTableCell>
                                  <StyledTableCell align="right">{<EditIcon color="secondary" onClick={()=> editItem(data.id)}  />}</StyledTableCell>
                                  <StyledTableCell align="right">{<BackspaceIcon onClick={()=> deleteItem(data.id)} color="secondary"/>}</StyledTableCell>
                                  <StyledTableCell align="right">{<Swich article={data} />}</StyledTableCell>
                              </StyledTableRow>
                          ))
                       }
                   </TableBody>
               </Table>
           </TableContainer>
       </div>
    );
}
