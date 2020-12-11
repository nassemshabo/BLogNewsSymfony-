import  React from 'react';
import RecipeReviewCard from "../../components/Card";
import  Table from  "../../components/Table";

export default  function Blogs ({data}) {
    return (
        <div>
            <Table data={data}/>
        </div>
    )
}