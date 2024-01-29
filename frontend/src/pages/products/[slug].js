import React from 'react';
import {GetMethodService} from '@/services/GetMethodService';
import ProductDetailTemplate from "@/atomic-design/templates/ProductDetailTemplate";

export default function ProductDetail({product}) {
    return (
        <ProductDetailTemplate product={product}/>
    )
}

export async function getServerSideProps(context) {
    const {slug} = context.query;

    try {
        const response = await GetMethodService(`products/${slug}`);
        const product = response.data;

        if (!product) {
            throw new Error("Product not found");
        }

        return {
            props: {
                product
            },
        };
    } catch (error) {
        console.error(error);

        return {
            notFound: true,
        };
    }
}
