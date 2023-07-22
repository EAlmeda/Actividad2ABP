import { EntityAdapter, EntityState, createEntityAdapter } from '@ngrx/entity';
import { Action, createReducer, on } from '@ngrx/store';
import { OnlineOrder } from 'src/models/OnlineOrder';
import * as fromActions from '../../actions';

export interface OnlineOrderState extends EntityState<OnlineOrder> {
  selectedOrder: OnlineOrder | null;
}

export interface KitchenOrderState extends EntityState<OnlineOrder> {
  selectedOrder: OnlineOrder | null;
}

export const onlineOrderAdapter: EntityAdapter<OnlineOrder> =
  createEntityAdapter<OnlineOrder>({
    selectId: (order: OnlineOrder) => order.id,
  });

export const kitchenOrderAdapter: EntityAdapter<OnlineOrder> =
  createEntityAdapter<OnlineOrder>({
    selectId: (order: OnlineOrder) => order.id,
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
    (state: OnlineOrderState, order: OnlineOrder) => ({
      ...state,
      selectedOrder: order,
    })
  ),
  on(fromActions.addOnlineOrder, (state: OnlineOrderState, order: OnlineOrder) =>
    onlineOrderAdapter.upsertOne(order, state)
  ),
  on(fromActions.updateOnlineOrder, (state: OnlineOrderState, order: OnlineOrder) =>
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
    (state: KitchenOrderState, order: OnlineOrder) => ({
      ...state,
      selectedOrder: order,
    })
  ),
  on(fromActions.addKitchenOrder, (state: KitchenOrderState, order: OnlineOrder) =>
    kitchenOrderAdapter.upsertOne(order, state)
  ),
  on(fromActions.updateKitchenOrder, (state: KitchenOrderState, order: OnlineOrder) =>
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

export const selectOnlineOrderList = (state: OnlineOrderState): OnlineOrder[] =>
  onlineOrderAdapter.getSelectors().selectAll(state) ?? [];

export const selectKitchenOrderList = (state: KitchenOrderState): OnlineOrder[] =>
  kitchenOrderAdapter.getSelectors().selectAll(state) ?? [];
