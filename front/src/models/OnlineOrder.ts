export interface OnlineOrder {
  id: string;
  amount: number;
  date: Date;
  expecteDate: Date;
  address: string;
  type: OrderType;
  status: OrderStatus;
}

export enum OrderStatus {
  'ORDERED'=0,
  'COOKING'=1,
  'DELIVERING'=2,
  'DELIVERED'=3,
}

export enum OrderType {
  'DELIVERY'=0,
  'PICK_UP'=1,
}
