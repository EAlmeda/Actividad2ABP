import { Board } from "./Board";
import { Employee } from "./Employee";
import { Product } from "./Product";

export interface KitchenOrder{
  begin_date: Date;
  end_date: Date;
  status: Date;
  products?: Product[];
  employee?: Employee;
  board?: Board;
}
