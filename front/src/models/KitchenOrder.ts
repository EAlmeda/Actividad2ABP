import { Board } from './Board';
import { Employee } from './Employee';
import { Product } from './Product';

export interface KitchenOrder {
  id: string;
  begin_date: Date;
  end_date: Date;
  status: string;
  products?: Product[];
  employee?: Employee;
  board?: Board;
}
