export interface Product {
  id?: string;
  name: string;
  type: string;
  available: boolean;
  price: number;
  description: string;
  recipe: string;
  image_path?: string;
}
