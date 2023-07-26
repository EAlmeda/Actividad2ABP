export interface Product {
  id: string;
  name: string;
  type: string;
  available: boolean;
  price: number;
  image_path: string;
  description: string;
  route?: string;
}
