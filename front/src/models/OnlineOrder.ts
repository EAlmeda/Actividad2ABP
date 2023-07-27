import { ProductInCart } from './ProductInCart';

export interface OnlineOrder {
  id?: string;
  amount: number;
  date: Date;
  expectedDate: Date;
  address: string;
  type: string;
  status: string;
  products: ProductInCart[];
  customerId: string;
}

export enum OrderStatus {
  'ORDERED' = 0,
  'COOKING' = 1,
  'DELIVERING' = 2,
  'DELIVERED' = 3,
}

export enum OrderType {
  'DELIVERY' = 0,
  'PICK_UP' = 1,
}
