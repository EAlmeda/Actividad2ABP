import { createAction, props } from '@ngrx/store';


export const loadOrderList = createAction('[Order] Load order list');
export const loadOrderById = createAction('[Order] Load order by id', props<{ orderId: string }>());
export const updateOrder = createAction('[Order] Update order', props<{ order: any }>());
export const addOrder = createAction('[Order] Add order', props<{ order: any }>());