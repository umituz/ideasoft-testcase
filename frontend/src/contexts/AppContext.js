import React from 'react';
import {ProductProvider} from "./ProductContext";

const AppProvider = ({children}) => {
        return (
            <ProductProvider>
                    {children}
            </ProductProvider>
        )
};

export default AppProvider;
