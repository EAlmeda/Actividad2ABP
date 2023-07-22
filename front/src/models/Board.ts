import { Employee } from "./Employee";
import { KitchenOrder } from "./KitchenOrder";

export interface Board{
  capacity: number;
  available: boolean;
  kitchenOrders?: KitchenOrder[];
  employee?: Employee;
}
