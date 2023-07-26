import {
  ActionReducerMap,
  createFeatureSelector,
  createSelector,
} from '@ngrx/store';
import * as fromBooking from './booking/booking.reducer';
import * as fromOrder from './order/order.reducer';
import * as fromProduct from './product/product.reducer';
// import * as fromEmployee from './employee/employee.reducer';

export interface GlobalState {
  bookings: fromBooking.BookingState;
  onlineOrders: fromOrder.OnlineOrderState;
  kitchenOrders: fromOrder.KitchenOrderState;
  products: fromProduct.ProductState;
}

export const reducers: ActionReducerMap<GlobalState> = {
  bookings: fromBooking.bookingReducer,
  onlineOrders: fromOrder.onlineOrderReducer,
  kitchenOrders: fromOrder.kitchenReducer,
  products: fromProduct.productReducer,
};

const selectGlobalState = createFeatureSelector<GlobalState>('state');

const selectBookingState = createSelector(
  selectGlobalState,
  (state: GlobalState) => state.bookings
);

const selectOnlineOrerState = createSelector(
  selectGlobalState,
  (state: GlobalState) => state.onlineOrders
);

const selectKitchenOrderState = createSelector(
  selectGlobalState,
  (state: GlobalState) => state.kitchenOrders
);

const selectProductState = createSelector(
  selectGlobalState,
  (state: GlobalState) => state.products
);

export const selectBookingList = createSelector(
  selectBookingState,
  fromBooking.selectBookingList
);

export const selectOnlineOrderList = createSelector(
  selectOnlineOrerState,
  fromOrder.selectOnlineOrderList
);

export const selectKitchenOrderList = createSelector(
  selectKitchenOrderState,
  fromOrder.selectKitchenOrderList
);

export const selectProductListState = createSelector(
  selectProductState,
  fromProduct.selectProductList
);

export const selectFavouriteProductListState = createSelector(
  selectProductState,
  fromProduct.selectFavouriteProductList
);
