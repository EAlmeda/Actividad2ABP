import { createAction, props } from '@ngrx/store';
import { Order } from 'src/models/order';

export const loadOnlineOrderList = createAction(
  '[Online Order] Load order list'
);
export const loadKitchenOrderList = createAction(
  '[Kitchen Order] Load order list'
);
export const loadOnlineOrderById = createAction(
  '[Online Order] Load order by id',
  props<{ orderId: string }>()
);
export const loadKitchenOrderById = createAction(
  '[Kitchen Order] Load order by id',
  props<{ orderId: string }>()
);
export const updateOnlineOrder = createAction(
  '[Online Order] Update order',
  props<{ order: Order }>()
);
export const updateKitchenOrder = createAction(
  '[Kitchen Order] Update order',
  props<{ order: Order }>()
);
export const addOnlineOrder = createAction(
  '[Online Order] Add order',
  props<{ order: Order }>()
);
export const addKitchenOrder = createAction(
  '[Kitchen Order] Add order',
  props<{ order: Order }>()
);
export const deleteOnlineOrder = createAction(
  '[Online Order] Delete order',
  props<{ orderId: string }>()
);
export const deleteKitchenOrder = createAction(
  '[Kitchen Order] Delete order',
  props<{ orderId: string }>()
);
