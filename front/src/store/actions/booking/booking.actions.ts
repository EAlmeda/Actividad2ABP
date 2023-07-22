import { createAction, props } from '@ngrx/store';
import { Booking } from 'src/models/Booking';

export const loadBookingList = createAction('[Booking] Load booking list');
export const deleteBooking = createAction(
  '[Booking] Delete Booking',
  props<{ bookingId: string }>()
);
export const updateBooking = createAction(
  '[Booking] Update Booking',
  props<{ booking: Booking }>()
); //TODO: change to type
export const saveBooking = createAction(
  '[Booking] Save Booking',
  props<{ booking: Booking }>()
); //TODO: change to type
