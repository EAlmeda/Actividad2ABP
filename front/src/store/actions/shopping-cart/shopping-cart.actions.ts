import { createAction, props } from '@ngrx/store';

export const removeItemFromCart = createAction('[Shopping cart] Remove product from cart', props<{ productId: string }>());
export const removeAllItemsFromCart = createAction('[Shopping cart] Remove all products from cart');
export const loadCartItemList = createAction('[Shopping cart] Load cart item list');

export const loadCartItemListSuccess = createAction(
  '[Shopping cart] Load cart item list Success',
  props<{ cartItemList: any }>(),
);

export const loadCartItemListFailure = createAction(
  '[Shopping cart] Load cart item list Failure',
  props<{ errorMessage: string }>(),
);