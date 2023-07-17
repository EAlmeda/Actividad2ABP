export interface Order {
  id: string;
  amount: number;
  datetime: string;
  expected_datetime: string;
  address: string;
  type: orderType;
  status: orderStatus;
}

export type orderType = 'DELIVERY';
export type orderStatus = 'COOKING';
