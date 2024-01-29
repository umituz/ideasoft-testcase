import React, {createContext, useContext, useEffect, useState} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {GetMethodService} from '@/services/GetMethodService';
import {setProducts} from "@/stores/actions/ProductActions";
import {setCategories} from "@/stores/actions/CategoryActions";

const ProductContext = createContext();

export const useProductContext = () => {
    return useContext(ProductContext);
};

export const ProductProvider = ({children}) => {
    const dispatch = useDispatch();
    const products = useSelector((state) => state.productReducer.products);
    const categories = useSelector((state) => state.categoryReducer.categories);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [toastMessage, setToastMessage] = useState(null);

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetMethodService(`products?page=${currentPage}`);
                const categoryResponse = await GetMethodService(`categories`);

                dispatch(setProducts(response?.data.data));
                dispatch(setCategories(categoryResponse?.data));
                setLastPage(response?.data.last_page);
            } catch (error) {
                setToastMessage({message: 'Data Loading Issue', type: 'error'});
            }
        }

        fetchData();
    }, [currentPage, dispatch]);

    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    const handleItemFilterChange = async (itemId, filterType) => {
        try {
            let url = `products?page=${currentPage}`;

            if (filterType === 'categories') {
                url += `&categoryId=${itemId}`;
            }

            const response = await GetMethodService(url);
            dispatch(setProducts(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({ message: 'Data Loading Issue', type: 'error' });
        }
    };

    const handleSearch = async (searchTerm) => {
        try {
            const response = await GetMethodService(
                `products?page=${currentPage}&searchTerm=${searchTerm}`
            );
            dispatch(setProducts(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({message: 'Data Loading Issue', type: 'error'});
        }
    };

    return (
        <ProductContext.Provider
            value={{
                products,
                categories,
                currentPage,
                lastPage,
                toastMessage,
                handlePageChange,
                handleItemFilterChange,
                handleSearch,
            }}
        >
            {children}
        </ProductContext.Provider>
    );
};
