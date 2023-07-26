import { createAction, props } from '@ngrx/store';
import { Product } from 'src/models/Product';

export const loadProducts = createAction('[Product] Load product list');
export const loadProductsSuccess = createAction(
  '[Product] Load product list success',
  props<{ products: Product[] }>()
);
export const loadProductsFailure = createAction(
  '[Product] Load product list failure'
);
export const deleteProduct = createAction(
  '[Product] Delete product',
  props<{ productId: string }>()
);
export const deleteProductSuccess = createAction(
  '[Product] Delete product success'
);
export const deleteProductFailure = createAction(
  '[Product] Delete product failure'
);
export const updateProduct = createAction(
  '[Product] Update product',
  props<{ product: Product }>()
);
export const updateProductSuccess = createAction(
  '[Product] Update product success'
);
export const updateProductFailure = createAction(
  '[Product] Update product failure'
);
export const saveProduct = createAction(
  '[Product] Save product',
  props<{ product: Product }>()
);
export const saveProductSuccess = createAction(
  '[Product] Save product success'
);
export const saveProductFailure = createAction(
  '[Product] Save product failure'
);
export const addProductToTheCart = createAction(
  '[Product] Add to the cart',
  props<{ product: Product }>()
);

export const addProductToTheFavouriteList = createAction(
  '[Favourite Product List] Add product',
  props<{ product: Product }>()
);
export const saveProductsToTheFavouriteList = createAction(
  '[Favourite Product List] Add product',
  props<{ products: Product[] }>()
);
export const deleteProductFromTheFavouriteList = createAction(
  '[Favourite Product List] Delete product',
  props<{ productId: string }>()
);
export const deleteAllProductsFromTheFavouriteList = createAction(
  '[Favourite Product List] Delete all'
);

export const findProductsByName = createAction(
  '[Product] Find product list by name',
  props<{ name: string }>()
);
export const findProductsByNameSuccess = createAction(
  '[Product] Find product list by name success',
  props<{ products: Product[] }>()
);
export const findProductsByNameFailure = createAction(
  '[Product] Find product list by name failure'
);

export const findProductsByPrice = createAction(
  '[Product] Find product list by price',
  props<{ price: number }>()
);
export const findProductsByPriceSuccess = createAction(
  '[Product] Find product list by price success',
  props<{ products: Product[] }>()
);
export const findProductsByPriceFailure = createAction(
  '[Product] Find product list by price failure'
);

export const findProductsByAvailable = createAction(
  '[Product] Find product list by available',
  props<{ available: boolean }>()
);
export const findProductsByAvailableSuccess = createAction(
  '[Product] Find product list by available success',
  props<{ products: Product[] }>()
);
export const findProductsByAvailableFailure = createAction(
  '[Product] Find product list by available failure'
);
