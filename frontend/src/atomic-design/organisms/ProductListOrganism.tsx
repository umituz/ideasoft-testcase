import React from "react";
import {Col, Row} from "react-bootstrap";
import PaginationComponent from "@/components/PaginationComponent";
import {useProductContext} from "@/contexts/ProductContext";
import ProductListMolecule from "@/atomic-design/molecules/ProductListMolecule";
import FilterMolecule from "@/atomic-design/molecules/FilterMolecule";
import SearchMolecule from "@/atomic-design/molecules/SearchMolecule";

const ProductListOrganism = () => {
    const {
        products,
        categories,
        currentPage,
        lastPage,
        handlePageChange,
        handleItemFilterChange,
        handleSearch,
    } = useProductContext();

    return (
        <Row>
            <Col lg={8}>
                <Row>
                    <ProductListMolecule products={products} />
                    <Col md={12} className="text-center mt-3">
                        <PaginationComponent
                            currentPage={currentPage}
                            lastPage={lastPage}
                            onPageChange={handlePageChange}
                            total={products.length}
                        />
                    </Col>
                </Row>
            </Col>

            <Col lg={4}>
                <SearchMolecule handleSearch={handleSearch} />

                <FilterMolecule
                    title="Categories"
                    items={categories}
                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'categories')}
                />

            </Col>
        </Row>
    )
}

export default ProductListOrganism;