import React from "react";
import {Container} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import ProductListOrganism from "@/atomic-design/organisms/ProductListOrganism";

const ProductListTemplate = () => {
    return (
        <MainLayout title={"Product List"} description={"Product List Description"}>
            <Container className="mt-2 minHeight pb-5">
                <ProductListOrganism/>
            </Container>
        </MainLayout>
    )
}

export default ProductListTemplate;
