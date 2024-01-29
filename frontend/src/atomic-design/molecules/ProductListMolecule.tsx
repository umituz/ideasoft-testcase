import React from "react";
import {Row} from "react-bootstrap";
import ProductItemMolecule from "@/atomic-design/molecules/ProductItemMolecule";

const ProductListMolecule = ({ products }) => {
    return (
        <Row>
            {products?.map((product) => (
                <ProductItemMolecule key={product.id} product={product} hasLink={true}/>
            ))}
        </Row>
    )
}

export default ProductListMolecule;