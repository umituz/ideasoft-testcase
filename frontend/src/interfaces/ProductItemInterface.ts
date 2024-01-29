export interface ProductItemInterface {
    product: {
        id: number;
        thumbnail: string;
        name: string;
        slug: string;
        short_description: string;
        description: string;
        category: string;
    } | null;
    hasLink: boolean
}