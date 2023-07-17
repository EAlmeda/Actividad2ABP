import { EntityAdapter, EntityState, createEntityAdapter } from '@ngrx/entity';
import { Action, createReducer, on } from '@ngrx/store';
import { Product } from 'src/models/product';
import * as fromActions from '../../actions';

export interface ProductState extends EntityState<Product> {}

export interface FavouriteProductListState extends EntityState<Product> {}

export const productAdapter: EntityAdapter<Product> =
  createEntityAdapter<Product>({
    selectId: (product: Product) => product.id,
  });

export const favouriteProductListAdapter: EntityAdapter<Product> =
  createEntityAdapter<Product>({
    selectId: (product: Product) => product.id,
  });

export const defaultProductState: ProductState = {
  ids: [],
  entities: {},
};

export const defaultFavouriteProductListState: ProductState = {
  ids: [],
  entities: {},
};

export const productInitialState: ProductState =
  productAdapter.getInitialState(defaultProductState);

export const favouriteProductListInitialState: ProductState =
  productAdapter.getInitialState(defaultFavouriteProductListState);

export const productReducer = createReducer(
  productInitialState,
  on(fromActions.loadProducts, (state: ProductState) => ({
    ...state,
  })),
  on(fromActions.saveProduct, (state: ProductState, product: Product ) =>
    productAdapter.upsertOne(product, state)
  ),
  on(fromActions.updateProduct, (state: ProductState, product: Product) =>
    productAdapter.updateOne({ id: product.id, changes: { ...product } }, state)
  ),
  on(fromActions.deleteProduct, (state: ProductState, productId: string) =>
    productAdapter.removeOne(productId, state)
  )
);

export const favouriteProductListReducer = createReducer(
  favouriteProductListInitialState,
  on(
    fromActions.addProductToTheFavouriteList,
    (state: FavouriteProductListState, product: Product)=>
      favouriteProductListAdapter.upsertOne(product, state)
  ),
  on(
    fromActions.saveProductsToTheFavouriteList,
    (state: FavouriteProductListState, products: Product[])=>
      favouriteProductListAdapter.upsertMany(products, state)
  ),
  on(
    fromActions.deleteProductFromTheFavouriteList,
    (state: FavouriteProductListState, productId: string)=>
      favouriteProductListAdapter.removeOne(productId, state)
  ),
  on(
    fromActions.deleteAllProductsFromTheFavouriteList,
    (state: FavouriteProductListState)=>
      favouriteProductListAdapter.removeAll(state)
  )
);

export function reducer(state: ProductState, action: Action) {
  return productReducer(state, action);
}

export function favouriteProductsReducer(
  state: FavouriteProductListState,
  action: Action
) {
  return favouriteProductListReducer(state, action);
}

export const selectProductList = (state: ProductState): Product[] =>
  productAdapter.getSelectors().selectAll(state) ?? [];

export const selectFavouriteProductList = (
  state: FavouriteProductListState
): Product[] =>
  favouriteProductListAdapter.getSelectors().selectAll(state) ?? [];
