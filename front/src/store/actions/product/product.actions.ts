import { createAction, props } from '@ngrx/store';

export const loadProducts = createAction('[Product] Load product list');
export const addProductToTheCart = createAction('[Product] Add to the cart', props<{ product: any }>()); //TODO: change to type
export const addProductToTheFavouriteList = createAction('[Product] Add to the favourite list', props<{ product: any }>()); //TODO:change to type
