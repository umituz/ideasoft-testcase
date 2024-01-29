import {Button, Card, Col} from "react-bootstrap";
import {Calendar, Facebook, Folder, Globe, Linkedin, Person, Twitter} from "react-bootstrap-icons";
import {FacebookShareButton, LinkedinShareButton, TwitterShareButton} from "react-share";
import Link from "next/link";
import React from "react";
import {ProductItemInterface} from "@/interfaces/ProductItemInterface";

const ProductItemMolecule = ({product, hasLink}: ProductItemInterface) => {
    if (product) {
        return (
            <Col lg={12} key={product.id}>
                <Card className="mb-4">
                    <Card.Img src={product.thumbnail} alt={product.name}/>
                    <Card.Body>
                        <h2 className="card-title h4">{product.name}</h2>
                        <p className="card-text">
                            {!hasLink ? product.description : product.short_description}
                        </p>
                        {!hasLink && (
                            <div className="mt-3">
                                <p>
                                    <Folder size={16} className="mr-1"/>
                                    <strong> Category:</strong> {product.category}
                                </p>

                                <div>
                                    <p>Share on Social Media Platforms</p>
                                    <FacebookShareButton title={product.name} url={`https://yourdomain.com/products/${product.slug}`}>
                                        <Facebook size={30} className="mr-1" />
                                    </FacebookShareButton>
                                    <LinkedinShareButton title={product.name} url={`https://yourdomain.com/products/${product.slug}`}>
                                        <Linkedin size={30} className="mr-1" />
                                    </LinkedinShareButton>
                                    <TwitterShareButton title={product.name} url={`https://yourdomain.com/products/${product.slug}`}>
                                        <Twitter size={30} className="mr-1" />
                                    </TwitterShareButton>
                                </div>
                            </div>
                        )}
                        {hasLink && (
                            <Link href={`/products/${product.slug}`}>
                                <Button variant="primary">Read more →</Button>
                            </Link>
                        )}
                    </Card.Body>
                </Card>
            </Col>
        );
    } else {
        return (
            <Col lg={6}>
                <Card className="mb-4">
                    <Card.Img src={`https://dummyimage.com/700x350/dee2e6/6c757d.jpg`} alt="No Data"/>
                    <Card.Body>
                        <p className="card-text">No Data Yet!</p>
                    </Card.Body>
                </Card>
            </Col>
        );
    }
}

export default ProductItemMolecule;