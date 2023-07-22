import { EntityAdapter, EntityState, createEntityAdapter } from '@ngrx/entity';
import { Action, createReducer, on } from '@ngrx/store';
import { Booking } from 'src/models/Booking';
import * as fromActions from '../../actions';

export interface BookingState extends EntityState<Booking> {}

export const bookingAdapter: EntityAdapter<Booking> =
  createEntityAdapter<Booking>({
    selectId: (booking: Booking) => booking.id,
  });

export const defaultBookingState: BookingState = {
  ids: [],
  entities: {},
};

export const bookingInitialState: BookingState =
  bookingAdapter.getInitialState(defaultBookingState);

export const BookingReducer = createReducer(
  bookingInitialState,
  on(fromActions.loadBookingList, (state: BookingState) => ({
    ...state,
  })),
  on(
    fromActions.saveBooking,
    (state: BookingState, booking: Booking): BookingState =>
      bookingAdapter.upsertOne(booking, state)
  ),
  on(
    fromActions.updateBooking,
    (state: BookingState, booking: Booking): BookingState =>
      bookingAdapter.updateOne(
        { id: booking.id, changes: { ...booking } },
        state
      )
  ),
  on(
    fromActions.deleteBooking,
    (state: BookingState, bookingId: string): BookingState =>
      bookingAdapter.removeOne(bookingId, state)
  )
);

export function bookingReducer(state: BookingState, action: Action) {
  return bookingAdapter(state, action);
}

export const selectBookingList = (state: BookingState): Booking[] =>
  bookingAdapter.getSelectors().selectAll(state) ?? [];
