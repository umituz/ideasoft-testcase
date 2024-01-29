import {Container} from "react-bootstrap";
import React from "react";
import MainLayout from "@/layouts/MainLayout";
import ProductItemMolecule from "@/atomic-design/molecules/ProductItemMolecule";

const ProductDetailTemplate = ({product}) => {
    return (
        <MainLayout title={product.title} description={product.description}>
            <Container className="mt-2 minHeight pb-5">
                <ProductItemMolecule key={product.id} product={product} hasLink={false}/>
            </Container>
        </MainLayout>
    );
}

export default ProductDetailTemplate;