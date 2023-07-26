import { Employee } from './Employee';
import { KitchenOrder } from './KitchenOrder';

export interface Board {
  id: string;
  capacity: number;
  available: boolean;
  kitchenOrders?: KitchenOrder[];
  employee?: Employee;
}
