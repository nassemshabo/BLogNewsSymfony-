import React from "react";
import {Button} from "@material-ui/core";
import SaveIcon from '@material-ui/icons/Save';

export default  function ({editForm}) {
    return (
        <div style={{display : editForm? 'block' : 'none'}}>
            <h1>title</h1>
            <Button
                variant="contained"
                color="primary"
                size="large"

                startIcon={<SaveIcon />}
            >
                Save
            </Button>
        </div>
    )
}