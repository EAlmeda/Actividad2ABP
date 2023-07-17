import { createAction, props } from '@ngrx/store';
import { Product } from 'src/models/product';

export const loadProducts = createAction('[Product] Load product list');
export const deleteProduct = createAction(
  '[Product] Delete product',
  props<{ productId: string }>()
);
export const updateProduct = createAction(
  '[Product] Update product',
  props<{ product: Product }>()
); //TODO: change to type
export const saveProduct = createAction(
  '[Product] Save product',
  props<{ product: Product }>()
); //TODO: change to type
export const addProductToTheCart = createAction(
  '[Product] Add to the cart',
  props<{ product: Product }>()
); //TODO: change to type

export const addProductToTheFavouriteList = createAction(
  '[Favourite Product List] Add product',
  props<{ product: Product }>()
); //TODO:change to type
export const saveProductsToTheFavouriteList = createAction(
  '[Favourite Product List] Add product',
  props<{ products: Product[] }>()
); //TODO:change to type
export const deleteProductFromTheFavouriteList = createAction(
  '[Favourite Product List] Delete product',
  props<{ productId: string }>()
);
export const deleteAllProductsFromTheFavouriteList = createAction(
  '[Favourite Product List] Delete all'
);
