import React from "react";
import { makeStyles , Tooltip , Fab } from "@material-ui/core";
import AddIcon from "@material-ui/icons/Add";

const useStyles = makeStyles((theme) => ({
    absolute: {
        position: "absolute",
        bottom: theme.spacing(2),
        right: theme.spacing(3)
    }
}));

export default function SimpleTooltips() {
    const classes = useStyles();
    return (
        <div>
            <Tooltip title="Add" aria-label="add">
                <Fab color="secondary" className={classes.absolute}>
                    <AddIcon />
                </Fab>
            </Tooltip>
        </div>
    );
}
