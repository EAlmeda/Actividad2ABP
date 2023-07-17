import { EntityAdapter, EntityState, createEntityAdapter } from '@ngrx/entity';
import { Action, createReducer, on } from '@ngrx/store';
import { Order } from 'src/models/order';
import * as fromActions from '../../actions';

export interface OnlineOrderState extends EntityState<Order> {
  selectedOrder: Order | null;
}

export interface KitchenOrderState extends EntityState<Order> {
  selectedOrder: Order | null;
}

export const onlineOrderAdapter: EntityAdapter<Order> =
  createEntityAdapter<Order>({
    selectId: (order: Order) => order.id,
  });

export const kitchenOrderAdapter: EntityAdapter<Order> =
  createEntityAdapter<Order>({
    selectId: (order: Order) => order.id,
  });

export const defaultOnlineOrderState: OnlineOrderState = {
  ids: [],
  entities: {},
  selectedOrder: null,
};

export const defaultKitchenOrderState: OnlineOrderState = {
  ids: [],
  entities: {},
  selectedOrder: null,
};

export const onlineOrderInitialState: OnlineOrderState =
  onlineOrderAdapter.getInitialState(defaultOnlineOrderState);

export const kitchenOrderInitialState: OnlineOrderState =
  kitchenOrderAdapter.getInitialState(defaultKitchenOrderState);

export const onlineOrderReducer = createReducer(
  onlineOrderInitialState,
  on(fromActions.loadOnlineOrderList, (state: OnlineOrderState) => ({
    ...state,
  })),
  on(
    fromActions.loadOnlineOrderById,
    (state: OnlineOrderState, order: Order) => ({
      ...state,
      selectedOrder: order,
    })
  ),
  on(fromActions.addOnlineOrder, (state: OnlineOrderState, order: Order) =>
    onlineOrderAdapter.upsertOne(order, state)
  ),
  on(fromActions.updateOnlineOrder, (state: OnlineOrderState, order: Order) =>
    onlineOrderAdapter.updateOne({ id: order.id, changes: { ...order } }, state)
  ),
  on(
    fromActions.deleteOnlineOrder,
    (state: OnlineOrderState, orderId: string) =>
      onlineOrderAdapter.removeOne(orderId, state)
  )
);

export const kitchenOrderReducer = createReducer(
  kitchenOrderInitialState,
  on(fromActions.loadKitchenOrderList, (state: KitchenOrderState) => ({
    ...state,
  })),
  on(
    fromActions.loadKitchenOrderById,
    (state: KitchenOrderState, order: Order) => ({
      ...state,
      selectedOrder: order,
    })
  ),
  on(fromActions.addKitchenOrder, (state: KitchenOrderState, order: Order) =>
    kitchenOrderAdapter.upsertOne(order, state)
  ),
  on(fromActions.updateKitchenOrder, (state: KitchenOrderState, order: Order) =>
    kitchenOrderAdapter.updateOne(
      { id: order.id, changes: { ...order } },
      state
    )
  ),
  on(
    fromActions.deleteKitchenOrder,
    (state: KitchenOrderState, orderId: string) =>
      kitchenOrderAdapter.removeOne(orderId, state)
  )
);

export function orderReducer(state: OnlineOrderState, action: Action) {
  return onlineOrderAdapter(state, action);
}

export function kitchenReducer(state: OnlineOrderState, action: Action) {
  return kitchenOrderAdapter(state, action);
}

export const selectOnlineOrderList = (state: OnlineOrderState): Order[] =>
  onlineOrderAdapter.getSelectors().selectAll(state) ?? [];

export const selectKitchenOrderList = (state: KitchenOrderState): Order[] =>
  kitchenOrderAdapter.getSelectors().selectAll(state) ?? [];
